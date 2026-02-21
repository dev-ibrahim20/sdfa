<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Models\JobOrder;
class Project extends Model
{

    use LogsActivity;
    
    protected $guarded = [];
    protected $table = 'projects';

    protected $fillable = [
        'title_ar',
        'title_en',
        'user_id',
        'status',
        'order_list',
        'stage_id',
        'supervisor_name_en',
        'supervisor_name_ar',
        'supervisor_email',
        'supervisor_phone',
        'planned_start_date',
        'actual_start_date',
        'planned_finish_date',
        'actual_finish_date',
    ];

   

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }

    protected $appends = [
    'title',
    'supervisor_name',
    ];

    public function getTitleAttribute()
    {
        return $this['title_'.LangUser()] ??  $this['title_'.config('settings.DefaultLanguage')];
    }

    public function getSupervisorNameAttribute()
    {
        return $this['supervisor_name_'.LangUser()] ?? $this->supervisor_name_ar;
    }

    public function stage() {
        return $this->belongsTo(ProjectStages::class);
    }

    public function warehouses() {
        return $this->hasMany(Warehouse::class);
    }
    
    public function buildings() {
        return $this->hasMany(Building::class);
    }

    public function vendors_products() {
        return $this->hasMany(ProjectVendorProduct::class);
    }

    public function contractors_count() {
        $buildings_ids = $this->buildings->pluck('id');
        $contractors = JobOrder::whereIn('building_id',$buildings_ids)->whereNotNull('contractor_id')->groupBy('contractor_id')->get()->count();
        return $contractors;
    }

    public function job_orders_count() {
        $buildings_ids = $this->buildings->pluck('id');
        $job_orders = JobOrder::whereIn('building_id',$buildings_ids)->count();
        return $job_orders;
    }

    public function buildings_completed() {
        return $this->buildings->where('stage_id',4)->count() ;
    }

    public function buildings_completed_percentage() {
        return $this->buildings->count() ? $this->buildings_completed() / $this->buildings->count() * 100 : 0 ;
    }

    public function progressbar_color() {
        $color = '#3492C5'; //default color

        if( $this->planned_start_date < date('Y-m-d')  && $this->stage_id == 1 ){
            $color = '#ED314C';
        }

        //finished color
        if( $this->buildings_completed_percentage() >= 100 ){
            $color = '#68b25e';
        }


        return $color;
    }

    

}
