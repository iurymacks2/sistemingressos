<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Model_Event extends Model
{
    protected $table = 'events';
    protected $fillable = ['cidade', 'categoria', 'date_event', 'name'];

    public function relIngressos(){
    	return $this->hasMany('App\Models\Model_Ingressos', 'event_id', 'id');
    }
}
