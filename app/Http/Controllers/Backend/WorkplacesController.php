<?php

namespace App\Http\Controllers\backend;

use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Workplace;
use App\Models\Sector;
use Session;
use Gate;

class WorkplacesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Gate::denies('list_workplaces')) {
            abort(403);
        }
        $data = Workplace::orderBy('id','asc')->paginate(20);
        return view('backend.pages.workplaces.index', compact('data'));
    }

    public function create()
    {
        if (Gate::denies('create_workplaces')) {
            abort(403);
        }
        $cities = City::pluck('name','id');
        return view('backend.pages.workplaces.create',compact('cities'));
    }

    public function store(Request $request)
    {
        if (Gate::denies('create_workplaces')) {
            abort(403);
        }
        Workplace::create($request->all());
        ResponseCache::clear();
        Session::flash('msg',  trans('lang.success_created'));
        Session::flash('alert', 'success');
        return Redirect(config('settings.BackendPath') . '/workplaces');
    }

    public function edit($id)
    {
        if (Gate::denies('edit_workplaces')) {
            abort(403);
        }
        $data  = Workplace::where('id', $id)->first();
        $cities = City::pluck('name','id');
        return view('backend.pages.workplaces.edit', compact('data','cities'));
    }

    public function update(Request $request, $id)
    {
        if (Gate::denies('edit_workplaces')) {
            abort(403);
        }
        Workplace::find($id)->update($request->all());
        ResponseCache::clear();
        Session::flash('msg',  trans('lang.success_updated'));
        Session::flash('alert', 'success');
        return Redirect(config('settings.BackendPath') . '/workplaces');
    }



    public function status($id, $status)
    {
        if (Gate::denies('publish_workplaces')) {
            abort(403);
        }
        $user = Workplace::find($id);
        $user->status = $status;
        $user->save();
        ResponseCache::clear();
        return back();
    }

    public function destroy($id)
    {
        if (Gate::denies('delete_workplaces')) {
            abort(403);
        }
        $user = Workplace::find($id);
        $user->delete();
        ResponseCache::clear();
        Session::flash('msg', ' Deleted! ');
        Session::flash('alert', 'danger');
        return back();
    }

    // public function order_list($id, $order)
    // {
    //     if (Gate::denies('order_workplaces')) {
    //         abort(403);
    //     }
    //     $data = Workplace::find($id);
    //     $data->order_list = $order;
    //     ResponseCache::clear();
    //     $data->save();
    //     return back();
    // }
}
