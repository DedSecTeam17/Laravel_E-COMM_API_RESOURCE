<?php

namespace App\Http\Resources\Category;

use App\Model\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
          'name'=>$this->name,
          'products'=>$this->Product

      ];
    }
}
