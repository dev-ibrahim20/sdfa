<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ReportBuilding extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }


    protected $guarded = [];
    protected $table = 'report_buildings';

    protected $fillable = [
        'building_id',
        'data', 
        'row_num'
    ];



}
