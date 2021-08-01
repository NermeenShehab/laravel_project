@extends('layouts.app')
@section('pageName') Edit @endsection
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ route('posts.update',$post->id) }}" method="POST" class="mt-5">
    @csrf
    @method('PUT')
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <div class="form-group m-3">

        <label for="title">Title</label>
        <input name="title" type="text" class="form-control" value="{{ $post->title }}" id="title" aria-describedby="titleHelp">


    </div>

    <div class="form-group m-3">
        <label for="Desc">Description</label>
        <textarea name="description" class="form-control">{{$post->description}}</textarea>
    </div>

    <div class="form-group m-3">
        <label for="exampleInputPassword1">Post Creator</label>
        <select name="post_creator" class="form-control">

            @foreach ( $users as $user)
            <option value="{{ $user->id }}{{ $user->id == $post->user_id ? 'selected' : '' }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <input type="submit" class="btn btn-success m-4" value="Update">
</form>
@endsection
