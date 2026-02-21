<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Building extends Model
{
    //use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }


    protected $guarded = [];
    protected $table = 'buildings';

    protected $fillable = [
        'project_id',
        'title_ar',
        'title_en',
        'user_id',
        'status',
        'order_list',
        'supervisor_name_en',
        'supervisor_name_ar',
        'supervisor_email',
        'supervisor_phone',
        'planned_start_date',
        'actual_start_date',
        'planned_finish_date',
        'actual_finish_date',
        
    ];

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

    public function products() {
        return $this->hasMany(TaskProduct::class);
    }
    
    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function job_orders() {
        return $this->hasMany(JobOrder::class ,  'building_id' , 'id');
    }


    public function job_orders_completed() {
        return $this->job_orders->where('stage_id',4)->count() ;
    }

    public function job_orders_completed_percentage() {
        return $this->job_orders->count() ? $this->job_orders_completed() / $this->job_orders->count() * 100 : 0 ;
    }

    public function progressbar_color() {
        $color = '#3492C5'; //default color

        if( $this->planned_start_date < date('Y-m-d')  && $this->stage_id == 1 ){
            $color = '#ED314C';
        }

        //finished color
        if( $this->job_orders_completed_percentage() >= 100 ){
            $color = '#68b25e';
        }

        return $color;
    }


    public function floors() {
        return $this->hasMany(BuildingFloors::class ,  'building_id' , 'id');
    }

    public function get_progress($lcr_id,$task_id,$type,$report_type = 'pull') {
        if( $task_id == 'total' ){
            $progress = BuildingTasksProgress::where('report_type',$report_type)->where('building_id',$this->id)->where('lcr_id',$lcr_id)->sum($type);
            return $progress;
        }

        $progress = BuildingTasksProgress::where('report_type',$report_type)->where('building_id',$this->id)->where('task_id',$task_id)->where('lcr_id',$lcr_id)->first();
        if(isset($progress)){
            return $progress[$type];
        }else{
            return 0;
        }
         
    }

    public function get_b_progress($task_id,$type,$report_type = 'pull') {

        $progress = BuildingTasksProgress::where('report_type',$report_type)->where('building_id',$this->id)->where('task_id',$task_id)->sum($type);
        if(isset($progress)){
            return $progress;
        }else{
            return 0;
        }
         
    }

    public function get_project_progress($task_id,$type,$report_type = 'pull') {

        $project = Project::find($this->project_id);
        $task = BuildingTasks::find($task_id);
        $task_id= BuildingTasks::where('report_type',$report_type)->where('title_en',$task->title_en)->pluck('id');
        $progress = BuildingTasksProgress::where('report_type',$report_type)->whereIn('building_id',$project->buildings->pluck('id'))->whereIn('task_id',$task_id)->sum($type);
        if(isset($progress)){
            return $progress;
        }else{
            return 0;
        }
         
    }

    
    public function get_total_progress($type,$report_type = 'pull') {

        $progress = BuildingTasksProgress::where('report_type',$report_type)->where('building_id',$this->id)->sum($type);
        if(isset($progress)){
            return $progress;
        }else{
            return 0;
        }
         
    }



    public function get_count_lcr() {
        $lcrs = 0;

        foreach( $this->floors as $floor ){
            $lcrs = $lcrs + $floor->lcrs->where('report_type','pull')->count();
        }

        return $lcrs;
    }
    

}
