@extends('layouts.app')
@section('title')
    All creators
@endsection
@section('content')
<div class="container">
    <div class="row">
        @foreach ($users as $index => $user)
        @php
            $bgColor = $index % 2 == 0 ? 'bg-light' : 'bg-dark text-white';
            $btnClass = $index % 2 == 0 ? 'btn-dark text-white' : 'btn-light text-dark';
        @endphp
        <div class="col-md-4 mb-3">
            <div class="card {{ $bgColor }}" style="width: 26rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <a href="{{ route('users.showByUser', $user->id) }}" class="btn {{ $btnClass }}">
                        View Posts
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection