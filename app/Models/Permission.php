<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
  protected $guarded = ['_token'];


  public function roles() {

   return $this->belongsToMany(Role::class);

 }

 

}
