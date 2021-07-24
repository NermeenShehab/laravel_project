<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    public function show($post)
    {
        $post = Post::findOrFail($post);
        return new  PostResource($post);
        // $arr=[
        //     'id' => $post->id,
        //     'title' => $post->title,
        //     'content' => $post->description,
        // ];
        // return $arr;
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create([

            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->post_creator,

        ]);
        return new  PostResource($post);
    }

































}
