<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function ph(){

        return $this->hasMany(Todo::class);

    }
}
