<div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div>
        @include('livewire.admin.forms.product-series-edit')
    </div>
    <div>
        <div class="card">
            <div class="card-header">{{ __('Product Series') }}</div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-primary" wire:click="set_create">
                        <i class="bi bi-plus-circle"></i>
                        <span>{{ __('Create') }}</span>
                    </button>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Codename') }}</th>
                            <th scope="col">{{ __('Release Date') }}</th>
                            <th scope="col">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($product_series as $series)
                        <tr class="align-middle" wire:key="{{ $series->id }}">
                            <td scope="row">{{ $series->name }}</td>
                            <td scope="row">{{ $series->codename }}</td>
                            <td scope="row">{{ $series->release_date }}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" wire:click="set_update({{ $series->id }})">
                                    <i class="bi bi-pencil-square"></i>
                                    <span>{{ __('Edit') }}</span>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $series->id }})" wire:confirm="Are you sure?">
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
            {{ $product_series->links() }}
        </div>
    </div>
</div>