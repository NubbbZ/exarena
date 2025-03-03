<div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div>
        @include('livewire.admin.forms.cards-edit')
    </div>
    <div>
        <div class="card">
            <div class="card-header">{{ __('Cards') }}</div>
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
                            <th scope="col">{{ __('Card Number') }}</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Color') }}</th>
                            <th scope="col">{{ __('Type') }}</th>
                            <th scope="col">{{ __('Description') }}</th>
                            <th scope="col">{{ __('Product') }}</th>
                            <th scope="col">{{ __('Note') }}</th>
                            <th scope="col">{{ __('Image') }}</th>
                            <th scope="col">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($cards as $card)
                        <tr class="align-middle" wire:key="{{ $card->id }}">
                            <td scope="row">{{ $card->card_number }}</td>
                            <td>{{ $card->name }}</td>
                            <td>{{ $card->color_type }}</td>
                            <td>{{ $card->card_type }}</td>
                            <td>{{ $card->description }}</td>
                            <td>{{ $card->Product->name }}</td>
                            <td>{{ $card->note }}</td>
                            <td>{{ $card->image }}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" wire:click="set_update({{ $card->id }})">
                                    <i class="bi bi-pencil-square"></i>
                                    <span>{{ __('Edit') }}</span>
                                </button>
                                @if ($card->image)
                                <button type="button" class="btn btn-danger btn-sm" wire:click="deleteImage({{ $card->id }})" wire:confirm="Are you sure?">
                                    <i class="bi bi-image"></i>
                                    <span>{{ __('Remove Image') }}</span>
                                </button>
                                @endif
                                <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $card->id }})" wire:confirm="Are you sure?">
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
            {{ $cards->links() }}
        </div>
    </div>
</div>