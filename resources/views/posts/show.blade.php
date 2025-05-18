@extends('layouts.app')

@section('title', 'View Post')

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow-lg" style="width: 30rem;">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="m-0">{{ $post->title }}</h4>
        </div>
        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top">
        <div class="card-body">
            <p class="card-text text-muted">{{ $post->description }}</p>
            <hr>
            <p class="card-text">
                <strong>Posted By:</strong> {{ optional($post->user)->name ?? 'Unknown' }}
            </p>
            <p class="card-text">
                <strong>Created At:</strong> {{ $post->created_at->format('F j, Y - g:i A') }}
            </p>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('posts.index') }}" class="btn btn-outline-primary">Back to Home</a>
        </div>
    </div>
</div>
@endsection
