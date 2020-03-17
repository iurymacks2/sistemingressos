<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Model_Ingressos extends Model
{
    protected $table = 'ingressos';
    protected $fillable = ['event_id', 'client_id', 'descricao', 'price', 'paid', 'categoria'];

    public function relEvents(){
    	return $this->hasOne('App\Models\Model_Event', 'id', 'event_id');
    }

    public function relClients(){
    	return $this->hasOne('App\Models\Model_Client', 'id', 'client_id');
    }
}
