@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Admin Dashboard') }}</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('Hello admin!') }}
    </div>
</div>
@endsection
