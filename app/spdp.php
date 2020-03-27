<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class spdp extends Model
{
    protected $table = 'spdp';

     public function tersangka()
    {
        return $this->belongsToMany(tersangka::class)->withTimeStamps();
    }
}
