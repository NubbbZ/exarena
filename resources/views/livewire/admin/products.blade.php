<div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div>
        @include('livewire.admin.forms.products-edit')
    </div>
    <div>
        <div class="card">
            <div class="card-header">{{ __('Products') }}</div>
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
                            <th scope="col">{{ __('Series') }}</th>
                            <th scope="col">{{ __('Product Code') }}</th>
                            <th scope="col">{{ __('Category') }}</th>
                            <th scope="col">{{ __('Note') }}</th>
                            <th scope="col">{{ __('Cover') }}</th>
                            <th scope="col">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr class="align-middle" wire:key="{{ $product->id }}">
                            <td scope="row">{{ $product->name }}</td>
                            <td>{{ $product->ProductSeries->codename }}</td>
                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->ProductCategory->name }}</td>
                            <td>{{ $product->note }}</td>
                            <td>{{ $product->cover }}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" wire:click="set_update({{ $product->id }})">
                                    <i class="bi bi-pencil-square"></i>
                                    <span>{{ __('Edit') }}</span>
                                </button>
                                @if ($product->cover)
                                <button type="button" class="btn btn-danger btn-sm" wire:click="deleteCover({{ $product->id }})" wire:confirm="Are you sure?">
                                    <i class="bi bi-image"></i>
                                    <span>{{ __('Remove Cover') }}</span>
                                </button>
                                @endif
                                <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $product->id }})" wire:confirm="Are you sure?">
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
            {{ $products->links() }}
        </div>
    </div>
</div>