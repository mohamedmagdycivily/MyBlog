<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request; //NOt used here 

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // dd($posts);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show($post)
    {
        // dd($post);
        $post = Post::find($post);
        dd($post);
        // dd($post->get());  // ?????????????????????????????????? ليه بيرجع كله 
        // $post = ['id' => 1, 'title' => 'Laravel', 'description' => 'Show Post Description', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-13'];
      //dd($post);
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create',[
            'users' => User::all()
        ]);
    }

    public function store(Request $myRequestObject)
    {
        dd($myRequestObject);                //  ????????????????????????????? بترجع ايه 
        // dd($myRequestObject->all());
        $data = $myRequestObject->all();
        //$data = request()->all();
        // request()->title == $data['title']

        Post::create($data); // full the fillable only 

        // Post::create($myRequestObject->all());

        // Post::create([
        //     'title' => $data['title'],
        //     'description' => $data['description'],
        //     'id' => 1, //those will be ignore cause they aren't in fillable
        //     'ajsnhdoiqwjsd' => 'aikoshdiahsdui' //those will be ignore cause they aren't in fillable
        // ]);

        //with this syntax you don't need fillable
        // $post = new Post;
        // $post->title = $data['title'];
        // $post->description = $data['description'];
        // $post->save();

        return redirect()->route('posts.index');
    }

    public function edit($post) 
    {
        $post = ['id' => 1, 'title' => 'Laravel', 'description' => 'Show Post Description', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-13'];
        // dd($post);
        return view('posts.edit', [
            'post'=> $post
        ]);
    }

    public function update() 
    {
        return redirect()->route('posts.index');
    }
}
