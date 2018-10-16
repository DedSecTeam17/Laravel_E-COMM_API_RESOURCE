<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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


            'id'=>$this->id,
            'Customer Name'=>$this->customer,
            'Review'=>$this->review,
            'Stars'=>$this->star,

        ];
    }
}

//$table->increments('id');
//$table->integer('product_id')->unsigned()->index();
//$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
//$table->string('customer');
//$table->text('review');
//$table->integer('star');
