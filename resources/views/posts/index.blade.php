@extends('layouts.app')
@section('title')
    Posts
@endsection
@section('content')
    <div class="container text-end m-4">
        <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
    </div>
    <table class="container table table-striped table-bordered">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Avatar</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>
                    <img src="{{ asset('storage/'.$post->image) }}" style="width: 100px; height: 100px;">
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->get_human_readable_date() }}</td>
                <td class="text-center align-middle">
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        <a href="{{ route('posts.show', $post->id ) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"> </i>
                        </a>
                        @if($post->user_id == Auth::id())
                        <a href="{{ route('posts.edit', $post->id ) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('posts.destroy', $post->id ) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete ?!')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container" >
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
@endsection