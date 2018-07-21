<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class productResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'description'=>$this->detail,
            'price'=>$this->price,
            'stock'=>$this->stock==0?'out of stock':$this->stock,
            'discount'=>$this->discount,
            'rating'=>$this->review->count()>0?round($this->review->sum('star')/$this->review->count()):'no rating yet',
            'totalPrice'=>round((1-($this->discount/100))*$this->price),
            'href'=>[
                'reviews'=>route('reviews.index',$this->id)
            ],
        ];
    }
}
