<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Model_Client extends Model
{
    protected $table = 'clients';
    protected $fillable = ['name', 'email', 'cpf'];

    public function relIngressos(){
    	return $this->hasMany('App\Models\Model_Ingressos', 'client_id', 'id');
    }
}
