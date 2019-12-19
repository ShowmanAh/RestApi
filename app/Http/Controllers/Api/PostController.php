<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostResource;
//use App\Http\Resources\TaskResource;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    use ApiResponseTrait;
   public function index(){
       //post resource transformation data
       //$posts = PostResource::collection(Post::paginate($this->paginateNumber));

      $posts = PostResource::collection(auth()->user()->posts()->with('user')->paginate(4));


       return $this->apiResponse($posts);

   }
   public function show($id){
       $posts = Post::find($id);
       if($posts){
           // load method load user relation
           return $this->apiResponse(new PostResource($posts->load('user')),null,201);
       }
       else{
           return $this->notFoundResponse();
       }

   }
   public function store(Request $request){
       // api validation
       /*
       $validate = validator::make($request->all(),
           [
               'title' => 'required|min:3|max:191',
               'body' => 'required|min:10',

           ]);

       if($validate->fails()){
           return $this->apiResponse(null, $validate->errors(),422);
       }
       **/
     /**
       $validation = $this->validation($request);
       // check $validation instanceof response class
       if($validation instanceof Response){
           return $validation;
       }
        */
     $request->validate([
         'title' => 'required|min:3|max:191',
         'body' => 'required|min:10',

     ]);
     $input = $request->all();
       $post = auth()->user()->posts()->create($input);
       //$post = Post::create($request->all());


       if($post){
           //return response create
           return $this->createdResponse(new PostResource($post->load('user')));
       }else{
           return $this->unKnownError();
       }

   }
   public function update( Request $request, $id){
       /*
       $validate = validator::make($request->all(),
           [
               'title' => 'required|min:3|max:191',
               'body' => 'required|min:10',

           ]);

       if($validate->fails()){
           return $this->apiResponse(null, $validate->errors(),422);
       }
       **/
       /**
       $validation = $this->validation($request);
       if($validation instanceof Response){
           return $validation;
       }
        * */
       $request->validate([
           'title' => 'required|min:3|max:191',
           'body' => 'required|min:10',

       ]);
       $input = $request->all();
       $post = Post::find($id);
       //dd($post);
       if(!$post){
           return $this->notFoundResponse();
       }
       $post->update( $input);
       if($post){
           return $this->apiResponse(new PostResource($post->load('user')),null,201);
       }else{
           return $this->unKnownError();
       }


   }

   // delete function
    public function destroy($id){
       $post = Post::find($id);
       //dd($post);
       if($post){
           $post->delete();
           return $this->deleteResponse();
       }
       return $this->notFoundResponse();
    }

    public function successCode(){
        return [
            200, 201, 202,
        ];

    }
    // delete response function
    public function deleteResponse(){
       return $this->apiResponse(true, null, 200);
    }

// validation
    public function validation($request){
       return $this->apiValidation($request,
           [
               'title' => 'required|min:3|max:191',
               'body' => 'required|min:10',

           ]

           );

    }

}
