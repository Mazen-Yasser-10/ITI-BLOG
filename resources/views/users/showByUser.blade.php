@extends('layouts.app')
@section('title')
    All Posts
@endsection
@section('content')
<div class="container">
    <h1 class="card-text">{{ $user->name }}</h1>
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
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div>
        <a href="{{ route('users.users') }}" class="link">Back to all creators >></a>
    </div>
</div>
@endsection
