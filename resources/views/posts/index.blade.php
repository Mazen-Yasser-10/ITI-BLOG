@extends('layouts.app')
@section('title')
    Posts
@endsection
@section('content')
    <div class="text-center m-4">
        <a href="{{ route('posts.create') }}" class="btn btn-success ">Create Post</a>
    </div>
    <table class="table table-striped">
    <thead>
        <th scope="col">#</th>
        <th scope="col">Avatar</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>
                <img src="{{ 'storage/'.$post->image }}" style="width: 100px; height: 100px;">
            </td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->slug }}</td>
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->get_human_readable_date() }}</td>
            @if($post->trashed() == false)
            <td>
                <a href="{{ route('posts.show', $post->id ) }}" class="btn btn-primary">View</a>
                <a href="{{ route('posts.edit', $post->id ) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('posts.destroy', $post->id ) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?!')">Delete</button>
                </form>
            </td> 
            @else
            <td>
                <form action="{{ route('posts.restore', $post->id ) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure to restore ?!')">Restore</button>
                </form>
                <form action="{{ route('posts.forceDelete', $post->id ) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete permenant ?!')">Delete Forever</button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
    </table>
    <div >
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
@endsection