<?php

namespace App\Http\Resources\Product;

use App\Model\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
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
            'price'=>$this->price,
            'discount'=>($this->discount).'%',
            'category_name'=>Category::find($this->category_id)->name,
            'rating'=> $this->reviews->count() >0 ?
                round($this->reviews->sum('star')/$this->reviews->count()) : 'No rating Yet',
            'href'=>
                [
                    'link'=>route('products.show',$this->id)
                ]
        ];
    }
}
