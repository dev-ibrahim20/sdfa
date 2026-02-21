<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class RoleUser extends Model
{

   use LogsActivity;

   public function getActivitylogOptions(): LogOptions
    {
      return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }

   protected $table = 'role_user';
   protected $primaryKey = 'user_id';
   protected $guarded = ['_token'];

}
