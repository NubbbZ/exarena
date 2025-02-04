@extends('layouts.admin')

@section('title', 'Products - Admin Dashboard')

@section('content')
    <h5 class="mb-3">Product Categories</h5>
    @livewire('admin.ProductCategories')
@endsection
