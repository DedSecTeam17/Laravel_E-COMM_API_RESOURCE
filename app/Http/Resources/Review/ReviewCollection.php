<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewCollection extends JsonResource
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
            'id'=>$this->id,
            'Customer Name'=>$this->customer,
            'Review'=>$this->review,
            'Stars'=>$this->star,
            'href'=>[
                'link'=>route('products.show',$this->product_id)
            ]
        ];
    }
}
