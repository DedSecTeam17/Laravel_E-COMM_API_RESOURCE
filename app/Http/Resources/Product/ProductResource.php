<?php

namespace App\Http\Resources\Product;

use App\Model\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
            [
               'name'=>$this->name,
                'description'=>$this->detail,
                'price'=>$this->price,
                'stock'=>$this->stock >0 ? $this->stock : 'Out of Stock' ,
                'discount'=>$this->discount,
                'TotalPrice'=>round((1-($this->discount/100))*$this->price),
                'category_name'=>Category::find($this->category_id)->name,
                'rating'=> $this->reviews->count() >0 ?
                    round($this->reviews->sum('star')/$this->reviews->count()) : 'No rating Yet',
                'href'=>
                    [
                        'reviews'=>route('reviews.index',$this->id)
                    ]
            ];
    }
}

