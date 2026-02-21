<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Spatie\Activitylog\Models\Activity;
use App\Models\JobOrder;
use App\Models\Project;
use App\Models\ProjectStages;
use App\Models\Sampling;
use App\Models\SamplingItem;
use Codexshaper\WooCommerce\Facades\Order;
use Automattic\WooCommerce\Client;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;


class HomeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }
        public function indexw(Request $request)
    {
        // $projects = Cache::remember('projects', 600, function () {
        //     return Project::get();
        // });

        // $job_orders = Cache::remember('job_orders_today', 600, function () {
        //     return JobOrder::where('planned_start_date', date('Y-m-d'))
        //         ->get();
        // });

        // $all_job_orders = Cache::remember('all_job_orders', 600, function () {
        //     return JobOrder::select('id', 'name')->get();
        // });

        // $project_stages = Cache::remember('project_stages', 600, function () {
        //     return ProjectStages::where('status', 1)
        //         ->orderBy('order_list')
        //         ->select('id', 'name', 'order_list')
        //         ->get();
        // });

        $samplingCounts = Cache::remember('sampling_counts', 600, function () {
            return SamplingItem::selectRaw("
                SUM(CASE WHEN samplings.status = 'delivered' THEN 1 ELSE 0 END) as delivered,
                SUM(CASE WHEN samplings.status = 'not_delivered' THEN 1 ELSE 0 END) as not_delivered,
                SUM(CASE WHEN samplings.status = 'not_been_withdrawn' THEN 1 ELSE 0 END) as not_been_withdrawn,
                SUM(CASE WHEN samplings.status = 'rejected' THEN 1 ELSE 0 END) as rejected
            ")
            ->leftJoin('samplings', 'sampling_items.sampling_id', '=', 'samplings.id')
            ->first();
        });

        $statistics = Cache::remember('sector_statistics', 600, function () {
            return Sampling::select('sector_id')
                ->selectRaw('COUNT(sampling_items.id) as count')
                ->leftJoin('sampling_items', 'samplings.id', '=', 'sampling_items.sampling_id')
                ->whereNull('sampling_items.deleted_at')
                ->groupBy('samplings.sector_id')
                ->get();
        });

        $workplace_id = Cache::remember('workplace_statistics', 600, function () {
            return Sampling::select('workplace_id')
                ->selectRaw('COUNT(sampling_items.id) as count')
                ->leftJoin('sampling_items', 'samplings.id', '=', 'sampling_items.sampling_id')
                ->whereNull('sampling_items.deleted_at')
                ->groupBy('samplings.workplace_id')
                ->get();
        });

        $colors = ['#FF5733', '#26b738', '#336BFF', '#E033FF', '#33FF73'];

        return view('backend.pages.index', compact(
            'colors',
            'samplingCounts',
            'workplace_id',
            'statistics'
      
        ));
    }

public function index(Request $request)
{
    $startDate = $request->start_date ?? now()->startOfMonth()->toDateString();
    $endDate   = $request->end_date ?? now()->endOfMonth()->toDateString();

    $isSearchIn2024 = Carbon::parse($startDate)->year == 2024
        && Carbon::parse($endDate)->year == 2024;

    $exclude2024Range = ['2024-01-01', '2024-12-30'];

    // Counting all SamplingItems
    $totalSamples = SamplingItem::withTrashed()
        ->join('samplings', 'sampling_items.sampling_id', '=', 'samplings.id')
        ->whereBetween(\DB::raw('DATE(samplings.created_at)'), [$startDate, $endDate])
        ->when(!$isSearchIn2024, function ($q) use ($exclude2024Range) {
            $q->whereNotBetween(\DB::raw('DATE(samplings.collection_date)'), $exclude2024Range);
        })
        ->count();

    // Counting delivered
    $deliveredSamples = SamplingItem::withTrashed()
        ->join('samplings', 'sampling_items.sampling_id', '=', 'samplings.id')
        ->where('samplings.status', 'delivered')
        ->whereBetween(\DB::raw('DATE(samplings.created_at)'), [$startDate, $endDate])
        ->when(!$isSearchIn2024, function ($q) use ($exclude2024Range) {
            $q->whereNotBetween(\DB::raw('DATE(samplings.collection_date)'), $exclude2024Range);
        })
        ->count();

    // Counting rejected
    $rejectedSamples = SamplingItem::withTrashed()
        ->join('samplings', 'sampling_items.sampling_id', '=', 'samplings.id')
        ->where('samplings.status', 'rejected')
        ->whereBetween(\DB::raw('DATE(samplings.created_at)'), [$startDate, $endDate])
        ->when(!$isSearchIn2024, function ($q) use ($exclude2024Range) {
            $q->whereNotBetween(\DB::raw('DATE(samplings.collection_date)'), $exclude2024Range);
        })
        ->count();

    // Aggregated counts
    $samplingCounts = SamplingItem::withTrashed()->selectRaw("
        SUM(CASE WHEN samplings.status = 'delivered' THEN 1 ELSE 0 END) as delivered,
        SUM(CASE WHEN samplings.status = 'not_delivered' THEN 1 ELSE 0 END) as not_delivered,
        SUM(CASE WHEN samplings.status = 'not_been_withdrawn' THEN 1 ELSE 0 END) as not_been_withdrawn,
        SUM(CASE WHEN samplings.status = 'rejected' THEN 1 ELSE 0 END) as rejected,
        SUM(CASE WHEN samplings.status = 'photo_only' THEN 1 ELSE 0 END) as photo_only
    ")
        ->leftJoin('samplings', 'sampling_items.sampling_id', '=', 'samplings.id')
        ->whereBetween(\DB::raw('DATE(samplings.created_at)'), [$startDate, $endDate])
        ->when(!$isSearchIn2024, function ($q) use ($exclude2024Range) {
            $q->whereNotBetween(\DB::raw('DATE(samplings.collection_date)'), $exclude2024Range);
        })
        ->first();

    // Statistics by sector
    $statistics = Sampling::withTrashed()->select('sector_id')
        ->selectRaw('COUNT(sampling_items.id) as count')
        ->leftJoin('sampling_items', 'samplings.id', '=', 'sampling_items.sampling_id')
        ->whereBetween(\DB::raw('DATE(samplings.created_at)'), [$startDate, $endDate])
        ->when(!$isSearchIn2024, function ($q) use ($exclude2024Range) {
            $q->whereNotBetween(\DB::raw('DATE(samplings.collection_date)'), $exclude2024Range);
        })
        ->groupBy('samplings.sector_id')
        ->get();

    // Statistics by workplace
    $workplace_id = Sampling::withTrashed()->select('workplace_id')
        ->selectRaw('COUNT(sampling_items.id) as count')
        ->leftJoin('sampling_items', 'samplings.id', '=', 'sampling_items.sampling_id')
        ->whereBetween(\DB::raw('DATE(samplings.created_at)'), [$startDate, $endDate])
        ->when(!$isSearchIn2024, function ($q) use ($exclude2024Range) {
            $q->whereNotBetween(\DB::raw('DATE(samplings.collection_date)'), $exclude2024Range);
        })
        ->groupBy('samplings.workplace_id')
        ->get();

    $colors = ['#FF5733', '#26b738', '#336BFF', '#E033FF', '#33FF73'];

    return view('backend.pages.index', compact(
        'colors',
        'samplingCounts',
        'workplace_id',
        'statistics',
        'totalSamples',
        'deliveredSamples',
        'rejectedSamples',
    ));
}


    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
// public function index(Request $request)
// {

 
    
// $projects =  Project::get();
// $job_orders = JobOrder::where('planned_start_date',date('Y-m-d'))->get();
// $all_job_orders = JobOrder::get();
// $project_stages = ProjectStages::where('status',1)->orderBy('order_list')->get();
// // In your controller
//         $samplingCounts = [
//             'delivered' => SamplingItem::whereHas('sample', function ($query) {
//                 $query->where('status', 'delivered');
//             })->count(),
//             'not_delivered' => SamplingItem::whereHas('sample', function ($query) {
//                 $query->where('status', 'not_delivered');
//             })->count(),
//             'not_been_withdrawn' => SamplingItem::whereHas('sample', function ($query) {
//                 $query->where('status', 'not_been_withdrawn');
//             })->count(),
//             'rejected' => SamplingItem::whereHas('sample', function ($query) {
//                 $query->where('status', 'rejected');
//             })->count(),
//         ];



//         $statistics = Sampling::select('sector_id')
//         ->selectRaw('COUNT(sampling_items.id) as count')
//         ->leftJoin('sampling_items', 'samplings.id', '=', 'sampling_items.sampling_id')
//          ->whereNull('sampling_items.deleted_at')
//         ->groupBy('samplings.sector_id')
//         ->get();

// $colors = ['#FF5733', '#26b738', '#336BFF', '#E033FF', '#33FF73'];

// $workplace_id = Sampling::select('workplace_id')
//     ->selectRaw('COUNT(sampling_items.id) as count')
//     ->leftJoin('sampling_items', 'samplings.id', '=', 'sampling_items.sampling_id')
//     ->whereNull('sampling_items.deleted_at')
//     ->groupBy('samplings.workplace_id')
//     ->get();

    
// return view('backend.pages.index',compact('job_orders','colors','projects','samplingCounts','workplace_id','statistics','all_job_orders','project_stages'));
// }


public function activity_log(Request $request)
{
$info = $request->get('subject_type')::find($request->get('subject_id'));
$activity_log = Activity::where('subject_id',$request->get('subject_id'))->where('subject_type',$request->get('subject_type'))->get();
return view('backend.includes.activity_log_modal' , compact('activity_log','info'));
}


}
