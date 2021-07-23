@extends('layouts.app')
@section('pageName') Show @endsection
@section('content')

<div class="card mt-2">
    <div class="card-header">
        Post Info
    </div>
    <div class="card-body">
        <h6 class="card-title"><b>Title:-</b> {{ $post->title }}</h6>
        <p class="card-text"><b>Description:-</b> <br>{{$post->description}}</p>
    </div>
</div>
<div class="card mt-5">
    <div class="card-header">
        Post Creator Info
    </div>
    <div class="card-body">
        <p class="card-title"><b>Name:-</b>{{$post->user ? $post->user->name : 'not found'}}</p>
        <p class="card-text"><b>Email:-</b> {{$post->user ? $post->user->email : 'not found'}} </p>
        <p class="card-text"><b>Created At:-</b>{{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }} </p>
    </div>
</div>

@endsection
