<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];
    public function sony(){
    	return $this->hasOne(Sony::class);
    }
}
