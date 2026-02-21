<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Product extends Model
{
    use LogsActivity;
    protected $guarded = [];
    protected $table = 'products';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }

    protected $fillable = [
        'sku',
        'title_ar',
        'title_en',
        'user_id',
        'status',
        'category_id',
    ];

    protected $appends = [
    'title',
    ];

    public function getTitleAttribute()
    {
        return $this['title_'.LangUser()] ??  $this['title_'.config('settings.DefaultLanguage')];
    }


    public function warehouses() {
        return $this->hasMany(WarehouseProduct::class);
    }

    public function category() {
        return $this->belongsTo(Categories::class);
    }
    

}
