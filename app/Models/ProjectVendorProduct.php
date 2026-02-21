<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ProjectVendorProduct extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }

    protected $guarded = [];
    protected $table = 'projects_vendors_products';

    protected $fillable = [
        'project_id',
        'warehouse_id',
        'vendor_id',
        'product_id',
        'qty',
        'user_id',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function vendor() {
        return $this->belongsTo(Vendor::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function warehouse() {
        return $this->belongsTo(Warehouse::class);
    }
}
