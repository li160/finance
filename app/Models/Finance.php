<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    //

    public function project_account()
    {
        return $this->belongsTo('App\Models\Dictionarie','project','id');
    }

    public function user_account()
    {
        return $this->belongsTo('App\User','users_id','id');
    }
}
