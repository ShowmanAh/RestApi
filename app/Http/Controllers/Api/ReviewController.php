<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Product\ReviewResource;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    use ApiResponseTrait;
    public function index(Post $post){
        //reviews on product
        $reviews = ReviewResource::collection($post->reviews);
        return $this->apiResponse($reviews);
    }


    public function successCode(){
        return [
            200, 201, 202,
        ];

    }
}
