<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class BuildingFloors extends Model
{
    protected $guarded = [];
    protected $table = 'building_floors';
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

    public function building() {
        return $this->belongsTo(Building::class);
    }

    public function lcrs() {
        return $this->hasMany(BuildingFloorsLcr::class  , 'floor_id');
    }
    

}
