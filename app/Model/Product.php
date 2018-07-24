<?php

namespace App\Model;
use App\Model\Review;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $fillable=['name','detail','price','stock','discount'];
    public function review()
    {
    	return $this->hasMany(Review::class);
    }
}
