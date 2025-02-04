@extends('layouts.admin')

@section('title', 'Users - Admin Dashboard')

@section('headextras')
<script type="module">
    var myModal = new bootstrap.Modal(document.getElementById('editModal'));
    window.addEventListener('closeModal', event => {
        myModal.hide();
    });
</script>
@endsection

@section('content')
    @livewire('admin.Users')
@endsection
