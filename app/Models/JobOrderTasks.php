<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class JobOrderTasks extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }


    protected $guarded = [];
    protected $table = 'job_order_tasks';

    protected $fillable = [
        'job_order_id',
        'parent_id',
        'title_ar',
        'title_en',
        'user_id',
        'stage_id',
        'status',
        'order_list',
        'activity_description',
        'planned',
        'actual',
    ];

    protected $appends = [
    'title',
    ];

    public function getTitleAttribute()
    {
        return $this['title_'.LangUser()] ??  $this['title_'.config('settings.DefaultLanguage')];
    }

    public function stage() {
        return $this->belongsTo(ProjectStages::class);
    }

    public function products_completed_percentage() {
        return $this->products->count() ? $this->products_completed() / $this->products->count() * 100 : 0 ;
    }

    public function progressbar_color() {
        $color = '#3492C5'; //default color

        if( $this->planned_start_date < date('Y-m-d') && $this->stage_id == 1 ){
            $color = '#ED314C';
        }

        //finished color
        if( $this->products_completed_percentage() >= 100 ){
            $color = '#68b25e';
        }

        return $color;
    }

  
    public function tasks() {
        return $this->hasMany(JobOrderTasks::class , 'parent_id');
    }


}
