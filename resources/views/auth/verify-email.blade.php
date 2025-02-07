<x-guest-layout>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4 w-100" style="max-width: 500px;">
        <div class="card-body">
            <h5 class="card-title text-center mb-3">{{ __('Verify Your Email') }}</h5>

            <p class="text-muted text-center">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success text-center" role="alert">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="d-flex justify-content-between mt-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link text-decoration-none">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

</x-guest-layout>
