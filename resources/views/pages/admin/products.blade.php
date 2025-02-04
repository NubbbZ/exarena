@extends('layouts.admin')

@section('title', 'Products - Admin Dashboard')

@section('headextras')
<script type="module">
    var myModal = new bootstrap.Modal(document.getElementById('formModal'));
    window.addEventListener('closeModal', event => {
        myModal.hide();
    });
</script>
@endsection

@section('content')
    <h5 class="mb-3">Product Categories</h5>
    @livewire('admin.ProductCategories')
@endsection
