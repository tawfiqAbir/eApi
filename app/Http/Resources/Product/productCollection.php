<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class productCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'totalPrice'=>round((1-($this->discount/100))*$this->price),
            'rating'=>$this->review->count()>0?round($this->review->sum('star')/$this->review->count()):'no rating yet',
            'discount'=>$this->discount,
            'href'=>[
                'detail'=>route('products.show',$this->id),
            ]
        ];
    }
}
