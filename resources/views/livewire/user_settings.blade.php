<div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">Account</div>
        <div class="card-body">
            <form wire:submit.prevent="changeEmail">
                <div class="form-group">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@email.com" wire:model.live="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary" wire:confirm="Are you sure you want to change your email?">Update Email</button>
            </form>
            <br>
            <form wire:submit.prevent="changePassword">
                <div class="form-group">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" aria-describedby="passwordHelpBlock" wire:model.live="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" wire:model.live="password_confirmation">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div id="passwordHelpBlock" class="form-text">Your password must be min 8 characters long.</div>
                <br>
                <button type="submit" class="btn btn-primary" wire:confirm="Are you sure you want to change your password?">Change Password</button>
            </form>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">Delete Account</div>
        <div class="card-body">
            <p class="card-text text-danger">Deleting your account is a permanent action and cannot be undone. Are you are sure you want to delete your account?</p>
            <button type="button" class="btn btn-danger" wire:click="closeAccount" wire:confirm="Are you sure you want to delete your account?">Yes i understand, delete my account!</button>
        </div>
    </div>
</div>
