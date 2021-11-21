<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CategoryResource extends JsonResource
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
            'id'        => $this->id,
            'title'     => $this->title,
            'slug'      => $this->slug,
            'summary'   => $this->summary,
            'photo'     => $this->photo,
            'is_parent' => $this->is_parent,
            'parent_id' => $this->parent_id,
            'status'    => $this->status,
            'children'  => $this->child_category,            
        ];
    }
}
