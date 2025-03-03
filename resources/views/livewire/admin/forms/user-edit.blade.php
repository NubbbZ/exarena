<div wire:ignore.self class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('form.username') is-invalid @enderror" id="username" name="username" wire:model.live="form.username" autocomplete="off" required>
                        <div id="displayUsernameHelpBlock" class="form-text">The Username must be 4-16 characters long, and must not contain spaces, special characters, or emoji.</div>
                        @error('form.username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('form.email') is-invalid @enderror" id="email" name="email" wire:model.live="form.email" autocomplete="off" required>
                        @error('form.email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="role">Role</label>
                        <select class="form-select" id="role" name="role" wire:model="form.role">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" wire:click="resetForm">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>