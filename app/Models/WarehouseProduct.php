<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class WarehouseProduct extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }


    protected $guarded = [];
    protected $table = 'warehouses_products';

    protected $fillable = [
        'warehouse_id',
        'product_id',
        'qty',
        'min_limit',
    ];


}
