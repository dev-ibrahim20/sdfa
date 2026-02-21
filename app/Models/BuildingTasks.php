<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class BuildingTasks extends Model
{
    protected $guarded = [];
    protected $table = 'building_tasks';
    //use LogsActivity;
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }

    protected $fillable = [
        'title_ar',
        'title_en',
        'user_id',
        'status',
        'order_list',
        'building_id',
        'report_type',
        
    ];

    protected $appends = [
    'title',
    ];

    public function getTitleAttribute()
    {
        return $this['title_'.LangUser()] ??  $this['title_'.config('settings.DefaultLanguage')];
    }

    public function progress() {
        return $this->hasMany(BuildingTasksProgress::class  , 'task_id')->where('planned','>',0)->whereNotNull('planned');
    }
 
    

}
