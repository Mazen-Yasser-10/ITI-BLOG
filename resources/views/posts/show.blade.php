@extends('layouts.app')
@section('title')
    View
@endsection
@section('content')
<div class ="container">
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{ $post['title'] }}</h5>
      <p class="card-text">{{ $post['description'] }}</p>
      <p class="card-text">Posted By: {{ $post['postedBy'] }}</p>
      <p class="card-text">Created At: {{ $post['created_at']->format('Y-m-d') }}</p>
      <a href="{{ route('posts.index') }}" class="btn btn-primary">back to home</a>
    </div>
  </div>
</div>
@endsection