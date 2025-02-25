<section class="mb-6 p-4">
    <header>

        <p class="text-muted">
            {{ __('Atualize as informações do perfil e o endereço de e-mail da sua conta.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4 ">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="name" class="sr-only">{{ __('Nome') }}</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->updateProfileInformation->get('name')" class="mt-2" />
        </div>

        <div class="form-group">
            <label for="email" class="sr-only">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <x-input-error :messages="$errors->updateProfileInformation->get('email')" class="mt-2" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-muted">
                        {{ __('Your email address is not verified.') }}

                        <button form="send-verification" class="btn btn-link p-0">
                            {{ __('Click here to resend the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-end pt-3">
            <button type="submit" class="btn btn-success">
                {{ __('Salvar') }}
            </button>
        </div>
    </form>
</section>
