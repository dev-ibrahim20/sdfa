<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ContractorRatings extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }


    protected $guarded = [];
    protected $table = 'contractors_ratings';

    protected $fillable = [
        'contractor_id',
        'comment',
        'rating',
        'user_id',
    ];

    protected $appends = [

    ];


    public function contractor() {
        return $this->belongsTo(Contractor::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
