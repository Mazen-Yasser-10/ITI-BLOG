@extends('layouts.app')
@section('title')
    All Posts
@endsection
@section('content')
<div class="container">
    <div class="row">
        @foreach ($posts as $index => $post)
        @php
            $bgColor = $index % 2 == 0 ? 'bg-light' : 'bg-dark text-white';
        @endphp
        <div class="col-md-4 mb-3">
            <div class="card {{ $bgColor }}" style="width: 26rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $post['title'] }}</h5>
                    <p class="card-text">{{ $post['description'] }}</p>
                    <p class="card-text">Posted By: {{ $post->user->name }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
