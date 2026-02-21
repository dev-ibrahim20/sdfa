<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class JobOrderProduct extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }

    protected $guarded = [];
    protected $table = 'job_order_products';

    protected $fillable = [
        'job_order_id',
        'product_id',
        'qty',
        'is_completed_out',
        'user_id',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function transactions() {
        return $this->hasMany(WarehouseTransactions::class,'product_id','product_id')->where('type','out_qty')->where('job_order_id',$this->job_order_id);
    }

  
}
