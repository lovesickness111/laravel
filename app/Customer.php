<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";

    public function bill(){
    	return $this->hasMany('App\Bill','id_customer','id');
    }
    public function billdetail(){
    	return $this->hasManyThrough('App\BillDetail','App\Bill','id_customer','id_bill','id');
    }

}
