<x-guest-layout>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm p-4 w-100" style="max-width: 400px;">
            <div class="card-body">
                <p class="text-muted text-center">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </p>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Confirm') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-guest-layout>
