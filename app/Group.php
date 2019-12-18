<?php

namespace App;

use Auth;
use App\UserGroup;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function user_groups()
    {
    	 return $this->hasMany('App\UserGroup');
    }

    public function getMy_Group()
    {
        $id_user_groups = UserGroup::where('id_user', Auth::user()->id)->pluck('id_group');
        $groups = Group::whereIn('id', $id_user_groups)->get();

        return $groups;
    }
}
