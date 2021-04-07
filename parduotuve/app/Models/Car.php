<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Maker;

class Car extends Model
{
    use HasFactory;

        public function carMaker() //funkcijos vardas laisvai pasirenkamas
    {
        return $this->belongsTo('App\Models\Maker', 'maker_id', 'id'); // rysio aprasymas
    }

}

