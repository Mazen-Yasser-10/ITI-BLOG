@extends('layouts.app')
@section('title')
    Create Post
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
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" aria-describedby="emailHelp" value = "{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" name="description" value = "{{ old('description') }}"></textarea>
        </div>
        <div class="form-group">
            <label for="user_id">Post Creator : </label>
            <select id="user_id" name="user_id">
                <option value="">Select User</option>
                @foreach ($users as $user)
                    <option value="{{ $user['id'] }}" {{ ($user['id'] == old('user_id'))? 'selected' : '' }} >{{ $user['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" value = "{{ old('image') }}">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection