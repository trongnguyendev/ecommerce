<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'title' => $this->title,
            'slug'  => $this->slug,
            'summary'   => $this->summary,
            'description'   => $this->description,
            'photo' => $this->photo,
            'condition' => $this->condition,
            'price' => $this->price,
            'discount'  => $this->discount,
            'is_featured'   => $this->is_featured,
            'category_id'   => $this->category_id,
            'child_category_id' => $this->child_category_id,
            'brand_id'  => $this->brand_id,
            'status'    => $this->status,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'brand'     => $this->brands,            
        ];
    }
}
