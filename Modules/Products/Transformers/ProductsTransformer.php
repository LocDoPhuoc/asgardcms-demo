<?php


namespace Modules\Products\Transformers;


use Illuminate\Http\Resources\Json\Resource;

class ProductsTransformer extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => url($this->image),
            'price' => $this->price,
            'created_at' => date( 'Y-m-d H:i' ,strtotime($this->created_at))
        ];
    }
}