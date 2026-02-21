<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class JobOrderFiles extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }

    protected $guarded = [];
    protected $table = 'job_order_files';

    protected $fillable = [
        'job_order_id',
        'title',
        'file_name',
        'user_id',
    ];

  
}
