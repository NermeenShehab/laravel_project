<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;


class PostController extends Controller
{
    public function index()
    {
       //$postCollection = Post::paginate(10);  //select * from posts
       $postCollection = Post::with('user')-> paginate(10);  //select * from posts
        return view('posts.index', ['postCollectionView' => $postCollection]);
    }

    public function show(Post $post)
    {

        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }
    public function store(StorePostRequest $requestObj)
    {

        //logic to store data in db
        $requestData = $requestObj->all();
        // $requestData = request()->all();
        //validation
        // $requestObj->validate(
        //     [

        //         'title' => ' Required|min:3',
        //         'description' => ' Required',
        //         'post_creator' => ' Required | exists:users,id',
        //     ]
        //     // ,[  //change error messg
        //     //     'title.required'=>'title is required',
        //     //     'title.min'=>'The title must be at least 3 characters.',
        //     // ]
        // );
        //equals insert into
        $post = Post::create([

            'title' => $requestObj->title,
            'description' => $requestObj->description,
            'user_id' => $requestObj->post_creator,
           // 'title' => $requestData['title'],
            //        'description' => $requestData['description'],
            //        'user_id' => $requestData['post_creator'],
        ]);

        return redirect()->route('posts.index');
    }


    public function edit(Post $post)
    {

        $users = User::all();

        return view('posts.edit', ['users' => $users, 'post' => $post]);
    }

    // public function update( StorePostRequest $requestObj,Post $post){
    //     $post->update($requestObj->all());
    //     return redirect()->route('posts.index')
    //     ->with('success' , 'Post Updated Successfully');
    // }
    public function update($post_id, StorePostRequest $requestObj)
    {

        // $requestObj->validate([
        //     'title' => 'required |min:3',

        // ]);

        $post =  Post::findOrFail($post_id);

        // $post->update($request->all());
        // $post->user_id = $request->post_creator;

        $post->update($requestObj->all());
        $post->user_id = $requestObj->post_creator;
        $post->save();

        return redirect()->route('posts.index')
            ->with('success', 'Post Updated Successfully');
    }



    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'post deleted successfully');
    }
}
