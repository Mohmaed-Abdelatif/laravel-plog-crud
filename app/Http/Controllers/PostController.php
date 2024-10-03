<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\support\Facades\Auth;
class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $posts = Post::all();
        $current_user = Auth::id();
        return view('posts.index', ['posts' => $posts,'current_user'=>$current_user]);
    }
    public function show(Post $post){
        // $post =Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    public function create(){
        return view('posts.create');
    }
    public function store(PostRequest $request){
        // //validation
        // request()->validate([
        //     'title' => ['required','min:3','unique:posts,title'],
        //     'description' => ['required', 'min:10']
        // ]);
        // //get data
        // $data = request()->all();
        // // dd($data);
        // $title = request()->title;
        // $description = request()->description;
        // // dd($title,$description);
        // //store in DB
        // Post::create([
        //     'title' => $title,
        //     'description' => $description,
        //     'user_id'=>1,
        // ]);
        //after make PostRequest to make validation
        // Post::create($request->validated());
        //after make authenticated
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        Post::create($data);
        return to_route('posts.index');
    }
    public function edit(Post $post){
        // $post = Post::find($id); using Post $post instad of $is to avoid entering unvalid data in url
        return view('posts.edit',['post'=>$post]);
    }
    public function update(PostRequest $request,$id){
        // request()->validate([
        //     'title' => ['required','min:3','unique:posts,title'],
        //     'description' => ['required', 'min:10']
        // ]);

        // $title = request()->title;
        // $description = request()->description;

        // Post::find($id)->update([
        //     'title' => $title,
        //     'description' => $description,
        // ]);
        //after make PostRequest to make validation
        $post = Post::findOrFail($id);
        $post->update($request->validated());
        return to_route('posts.index');
    }
    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return to_route('posts.index');
    }

}

