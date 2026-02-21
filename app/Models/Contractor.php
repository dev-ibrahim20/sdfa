<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Contractor extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }
    
    protected $guarded = [];
  
    protected $fillable = [
        'title_ar',
        'title_en',
        'user_id',
        'status',
        'supervisor_name_en',
        'supervisor_name_ar',
        'supervisor_email',
        'supervisor_phone',
    ];

    protected $appends = [
    'title',
    ];

    public function getTitleAttribute()
    {
        return $this['title_'.LangUser()] ??  $this['title_'.config('settings.DefaultLanguage')];
    }

    public function job_orders() {
        return $this->hasMany(JobOrder::class);
    }

    public function files() {
        return $this->hasMany(ContractorFiles::class);
    }

    public function job_orders_completed() {
        return $this->job_orders->where('stage_id',4)->count() ;
    }

    public function job_orders_completed_percentage() {
        return $this->job_orders->count() ? $this->job_orders_completed() / $this->job_orders->count() * 100 : 0 ;
    }

    public function progressbar_color() {
        $color = '#3492C5'; //default color

        //finished color
        if( $this->job_orders_completed_percentage() >= 100 ){
            $color = '#68b25e';
        }

        return $color;
    }

    public function buildings() {
         return $this->job_orders->groupBy('building_id')->count();
    }

    public function buildings_completed() {
        $buildings_ids = $this->job_orders->pluck('building_id');
        return Building::whereIn('id',$buildings_ids)->where('stage_id',4)->count();
    }

    public function buildings_completed_percentage() {
        return $this->buildings() ? $this->buildings_completed() / $this->buildings() * 100 : 0 ;
    }

    public function buildings_progressbar_color() {
        $color = '#3492C5'; //default color

        //finished color
        if( $this->buildings_completed_percentage() >= 100 ){
            $color = '#68b25e';
        }

        return $color;
    }



    public function ratings() {
        return $this->hasMany(ContractorRatings::class);
    }



}
