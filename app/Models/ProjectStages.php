<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ProjectStages extends Model
{
    protected $guarded = [];
    protected $table = 'project_stages';
    use LogsActivity;
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }

    protected $fillable = [
        'title_ar',
        'title_en',
        'user_id',
        'status',
        'order_list',
        'is_first',
        'is_last',
        'is_editable',
        'color',
        
    ];

    protected $appends = [
    'title',
    ];

    public function getTitleAttribute()
    {
        return $this['title_'.LangUser()] ??  $this['title_'.config('settings.DefaultLanguage')];
    }

}
