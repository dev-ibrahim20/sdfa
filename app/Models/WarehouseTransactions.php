<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class WarehouseTransactions extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }


    protected $guarded = [];
    protected $table = 'warehouses_transactions';

    protected $fillable = [
        'warehouse_id',
        'product_id',
        'qty',
        'type',
        'vendor_id',
        'job_order_id',
        'user_id',
        'inspection_qty',
        'inspection_file',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function vendor() {
        return $this->belongsTo(Vendor::class);
    }

    public function job_order() {
        return $this->belongsTo(JobOrder::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function warehouse() {
        return $this->belongsTo(Warehouse::class);
    }
    

}
