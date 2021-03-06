<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cardstock extends Model
{
    protected $fillable = array('id','id_users','date');
    public $timestamps = false;
    public function user(){
        return $this->belongsTo('App\User', 'id_users');
    }
    public function item(){
        return $this->belongsTo('App\Item','id_items');
    }
    
}
