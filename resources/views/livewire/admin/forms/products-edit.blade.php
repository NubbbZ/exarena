<div wire:ignore.self class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form wire:submit.prevent="{{ $submitMethod }}">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('form.name') is-invalid @enderror" id="name" name="name" wire:model.live="form.name" autocomplete="off" required>
                        @error('form.name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="product_series">Series</label>
                        <select class="form-select @error('form.product_series_id') is-invalid @enderror" id="product_series" name="product_series" wire:model="form.product_series_id" required>
                            <option value="" selected>Choose a product series!</option>
                            @foreach ($product_series as $series)
                                <option value="{{ $series->id }}">{{ $series->name }}</option>
                            @endforeach
                        </select>
                        @error('form.product_series_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="product_code">Product Code</label>
                        <input type="text" class="form-control @error('form.product_code') is-invalid @enderror" id="product_code" name="product_code" wire:model.live="form.product_code" autocomplete="off">
                        @error('form.product_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="product_category">Category</label>
                        <select class="form-select @error('form.product_category') is-invalid @enderror" id="product_category" name="product_category" wire:model="form.product_category" required>
                            <option value="" selected>Choose a product category!</option>
                            @foreach ($product_categories as $category)
                                <option value="{{ $category->value }}">{{ $category->displayText() }}</option>
                            @endforeach
                        </select>
                        @error('form.product_category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="cover">Cover</label>
                        <input type="file" class="form-control @error('form.cover') is-invalid @enderror" id="cover" name="cover" wire:model="form.cover" accept="image/*">
                        @error('form.cover')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="note">Note</label>
                        <textarea class="form-control" id="note" name="note" wire:model="form.note" rows="3"></textarea>
                        @error('form.note')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" wire:click="resetForm">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>