@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
<div class="container">
    @livewire('user-settings', ['user' => Auth::user()])
</div>
@endsection
