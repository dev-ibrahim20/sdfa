<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class JobOrder extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }


    protected $guarded = [];
    protected $table = 'job_orders';

    protected $fillable = [
        'building_id',
        'floor_id',
        'lcr_id',
        'task_id',
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
        'contractor_id',
        'activity_description',
        'category_id',
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
        return $this->hasMany(JobOrderProduct::class);
    }
    
    public function building() {
        return $this->belongsTo(Building::class);
    }

    public function files() {
        return $this->hasMany(JobOrderFiles::class);
    }
    
    public function contractor() {
        return $this->belongsTo(Contractor::class);
    }

    public function products_completed() {
        return $this->products->where('is_completed_out',true)->count() ;
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
        return $this->hasMany(JobOrderTasks::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function floor() {
        return $this->belongsTo(BuildingFloors::class , 'floor_id');
    }

    public function lcr() {
        return $this->belongsTo(BuildingFloorsLcr::class , 'lcr_id');
    }

    public function task() {
        return $this->belongsTo(BuildingTasks::class , 'task_id');
    }

}
