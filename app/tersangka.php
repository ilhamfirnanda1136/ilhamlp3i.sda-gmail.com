<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tersangka extends Model
{
    protected $table = 'tersangka';

    public function spdp()
    {
    	return $this->belongsToMany(spdp::class)->withTimeStamps();
    }
}
