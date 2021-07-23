@extends('layouts.app')
@section('pageName') Index @endsection
@section('content')

<div class="text-center">
    <a href="{{ route('posts.create') }}" class="mt-4 btn btn-success">Create Post</a>
</div>
<table class="table mt-4 ">
    <thead >

        <tr >
            <th class="col-2">pagnigation</th>
            <th class="col-2">Title</th>
            <th class="col-2">Slug</th>
            <th class="col-2">Posted By</th>
            <th class="col-2">Created At</th>
            <th class="col-2">Actions</th>
        </tr>
    </thead>
    @foreach ($postCollectionView as $post)
    <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->slug}}</td>
        <td>{{$post->user ? $post->user->name : 'not found'}}</td>
        <td>{{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }} </td>
        <td>
            <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-info">View</a>
            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">Edit</a>

                <form class="m-2" action="{{ route('posts.destroy',$post->id) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                </form>

        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center mb-5"> {!! $postCollectionView->links() !!} </div>
@endsection
