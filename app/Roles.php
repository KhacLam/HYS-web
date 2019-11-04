<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $primaryKey = 'role_id';
    // public function user(){
    //     return $this->hasToMany('App\Users');    
    // }
}
