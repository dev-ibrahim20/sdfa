<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ContractorFiles extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }

    protected $guarded = [];
    protected $table = 'contractor_files';

    protected $fillable = [
        'contractor_id',
        'title',
        'file_name',
        'user_id',
    ];

  
}
