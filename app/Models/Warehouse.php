<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Warehouse extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }
    
    protected $guarded = [];
    protected $table = 'warehouses';

    protected $fillable = [
        'project_id',
        'title_ar',
        'title_en',
        'user_id',
        'status',
        'order_list',
        'supervisor_name_en',
        'supervisor_name_ar',
        'supervisor_email',
        'supervisor_phone',
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
        return $this->hasMany(WarehouseTransactions::class)->where('type','in_qty')->groupBy('product_id');
    }
    
    public function transactions() {
        return $this->hasMany(WarehouseTransactions::class);
    }

}
