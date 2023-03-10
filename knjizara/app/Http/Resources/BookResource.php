<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

     public static $wrap = 'book';

     
    public function toArray($request)
    {
    
        return [
            'name' => $this->resource->name,
            'description'=>$this->resource->description,
            'price'=>$this->resource->price,
        ];
    }
}
