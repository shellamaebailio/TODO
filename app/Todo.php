<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeChecked($query){

        return $query->where('is_checked',1);

    }
    public function scopeUnchecked($query){

        return $query->where('is_checked',0);

    }
}
