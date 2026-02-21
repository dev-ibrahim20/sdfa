<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Role extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }
    
    protected $guarded = ['_token','permissions'];


    public function permissions() {

    	return $this->belongsToMany(Permission::class);

    }



    public function assign(Permission $permission) {

    	return $this->permission()->save($permission);

    }


	public function users() {

    return $this->belongsToMany('App\User', 'role_user',
      'role_id', 'user_id');


  }









}
