<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Vendor extends Model
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

}
