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
                        <label for="product_category_id">Category</label>
                        <select class="form-select @error('form.product_category_id') is-invalid @enderror" id="product_category_id" name="product_category_id" wire:model="form.product_category_id" required>
                            <option selected>Choose a product category!</option>
                            @foreach ($product_categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('form.product_category_id')
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
                        <label for="name">Note</label>
                        <input type="text" class="form-control @error('form.note') is-invalid @enderror" id="name" name="name" wire:model.live="form.note" autocomplete="off">
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