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
                        <label for="codename">Codename</label>
                        <input type="text" class="form-control @error('form.codename') is-invalid @enderror" id="codename" name="codename" wire:model.live="form.codename" autocomplete="off" required>
                        @error('form.codename')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="release_date">Release Date</label>
                        <input type="date" class="form-control @error('form.release_date') is-invalid @enderror" id="release_date" name="release_date" wire:model.live="form.release_date" autocomplete="off">
                        @error('form.release_date')
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