@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Deleted Posts</h1>
    @if($posts->isEmpty())
        <p>No deleted posts found.</p>
    @else
        <table class="container table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Deleted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->deleted_at }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <form action="{{ route('posts.restore', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure to restore this post?')">
                                        <i class="fas fa-undo"></i> <!-- Restore Icon -->
                                    </button>
                                </form>
                                <form action="{{ route('posts.forceDelete', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this post permanently?')">
                                        <i class="fas fa-trash-alt"></i> <!-- Force Delete Icon -->
                                    </button>
                                </form>
                            </td>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
