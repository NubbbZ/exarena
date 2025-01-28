@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('SETTINGS') }}
        </div>
    </div>
</div>
@endsection
