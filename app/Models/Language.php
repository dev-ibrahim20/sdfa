<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Language extends Model
{
    use LogsActivity;
    protected $guarded = [];

    protected $fillable = [
        'title',
        'code',
        'is_default',
        'status',
        'is_rtl',
        'order_list',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }
    
}
