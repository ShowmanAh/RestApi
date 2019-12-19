<?php

namespace App\Http\Resources\Product;

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
       return [
           'name' => $this->name,
            'detail' => str_limit($this->detail,20),
            'price' => $this->price,
            'stock' => $this->stock == 0 ? 'out of the stock' : $this->stock,
            'discount' => $this->discount,
           'total_price' => round((1-($this->discount/100)) * $this->price,2),
           'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No rating here',
           'href' => [
               'reviews' => route('reviews.index', $this->id),
           ],


       ];
    }
}
