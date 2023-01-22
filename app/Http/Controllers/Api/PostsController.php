<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    use PostControllerTrait;
    public function index()
    {
        $posts = Posts::with('users')->get();
        return $this->ApiResponse($posts , 'ok' , 200);
        
    }
    public function store(Request $request)
    {
        $posts = new Posts();

        $posts->title = $request->title;
        $posts->text = $request->text;

        $image = $request->file('image');
        if($request->hasFile('image'))
        {
            $new_name= rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/images',$new_name));
            $posts->image = $new_name;
        }
        else{
            return response()->json('image null');
        }
        
        $posts->user_id = $request->user_id;

        $posts->save();
        return $this->ApiResponse($posts , 'ok' , 200);
    }
}
