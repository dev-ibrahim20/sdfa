<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sampling extends Model
{
    protected $guarded = ['created_at'];
    protected $table = 'samplings';
    use LogsActivity, SoftDeletes;

    public static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            // منع تعديل created_at نهائياً عند التحديث
            if ($model->isDirty('created_at')) {
                $model->created_at = $model->getOriginal('created_at');
            }
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }
    protected $fillable = [];

    protected $dates = ['deleted_at'];

    // Define the relationship with Workplace
    public function workplace()
    {
        return $this->belongsTo(Workplace::class, 'workplace_id');
    }

    // Define the relationship with Sector
    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }

    // Define the relationship with City
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    // Define the relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function samplingItems()
    {
        return $this->hasMany(SamplingItem::class, 'sampling_id', 'id');
    }
}
