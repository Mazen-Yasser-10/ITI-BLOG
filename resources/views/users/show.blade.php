@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">{{ $user->name }}</h4>
                </div>
                <div class="text-center mt-4">
                    <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/default-avatar.png') }}" 
                         class="rounded-circle border" 
                         style="width: 150px; height: 150px; object-fit: cover;">
                </div>
                <div class="card-body text-center">
                    <h5 class="text-muted">{{ $user->email }}</h5>
                    <p class="text-secondary">Joined: {{ $user->created_at->format('F d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
