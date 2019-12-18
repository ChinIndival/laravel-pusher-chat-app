<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    public function user()
    {
         return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function group()
    {
         return $this->belongsTo('App\Group', 'id_group', 'id');
    }
}
