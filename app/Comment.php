<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $fillable = ['name', 'dt_add', 'text', 'user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    
}
