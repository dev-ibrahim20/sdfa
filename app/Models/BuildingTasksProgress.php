<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class BuildingTasksProgress extends Model
{
    protected $guarded = [];
    protected $table = 'building_tasks_progress';
    //use LogsActivity;
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }

    protected $fillable = [
        'building_id',
        'floor_id',
        'task_id',
        'planned',
        'actual',
        'lcr_id',
        'report_type',
         
        
    ];


}
