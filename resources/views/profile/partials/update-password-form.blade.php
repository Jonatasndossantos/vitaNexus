<section class="mb-4 p-4">
    <header>

        <p class="text-muted">
            {{ __('Certifique-se de que sua conta esteja usando uma senha longa e aleatória para se manter segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="current_password" class="sr-only">{{ __('Senha Atual') }}</label>
            <input id="current_password" name="current_password" type="password" class="form-control" placeholder="{{ __('Senha Atual') }}" required />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="form-group">
            <label for="password" class="sr-only">{{ __('Nova Senha') }}</label>
            <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Nova Senha') }}" required />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="sr-only">{{ __('Confirmar Senha') }}</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="{{ __('Confirmar Senha') }}" required />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="d-flex justify-content-end pt-3">
            <button type="submit" class="btn btn-success">
                {{ __('Salvar') }}
            </button>
        </div>
    </form>
</section>
