<div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div>
        @include('livewire.admin.forms.product-categories-edit')
    </div>
    <div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal" wire:click="set_create">
                        <i class="bi bi-plus-circle"></i>
                        <span>{{ __('Create') }}</span>
                    </button>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr class="align-middle" wire:key="{{ $category->id }}">
                            <td scope="row">{{ $category->name }}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#formModal" wire:click="set_update({{ $category->id }})">
                                    <i class="bi bi-pencil-square"></i>
                                    <span>{{ __('Edit') }}</span>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $category->id }})" wire:confirm="Are you sure?">
                                    <i class="bi bi-trash"></i>
                                    <span>{{ __('Delete') }}</span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pt-4">
            {{ $categories->links() }}
        </div>
    </div>
</div>