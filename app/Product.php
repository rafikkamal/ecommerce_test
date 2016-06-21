<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [];

    public function category() {
        return $this->belongsTo('App\Category');
    }
    public function picture() {
        return $this->belongsTo('App\ProductPicture');
    }
}
