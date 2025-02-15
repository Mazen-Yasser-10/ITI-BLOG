@extends('layouts.app')
@section('title')
    Edit
@endsection
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form action="{{ route('posts.update', $post['id']) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title', $post['title']) }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" name="description">{{ old('description',$post['description']) }}</textarea>
        </div>
        <div class="form-group">
            <label for="user_id">Post Creator : </label>
            <select id="user_id" name="user_id">
                <option value="">Select User</option>
                @foreach ($users as $user)
                @if ($user['id'] == $post['user_id'])
                    <option value="{{ $user['id'] }}" selected>{{ $user['name'] }}</option>
                @else
                    <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image"  value="{{ $post['image'] }}">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection