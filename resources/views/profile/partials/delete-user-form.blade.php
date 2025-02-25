<section class="mb-4 p-4">
    <header>

        <p class="text-muted">
            {{ __('Uma vez que sua conta for excluída, todos os seus recursos e dados serão permanentemente deletados. Antes de excluir sua conta, faça o download de qualquer dado ou informação que você deseja reter.') }}
        </p>
    </header>

    <button class="btn btn-danger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Excluir Conta') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-4">
            @csrf
            @method('delete')

            <h2 class="h5 font-weight-bold">
                {{ __('Você tem certeza que deseja excluir sua conta?') }}
            </h2>

            <p class="text-muted">
                {{ __('Uma vez que sua conta for excluída, todos os seus recursos e dados serão permanentemente deletados. Por favor, insira sua senha para confirmar que você deseja excluir sua conta permanentemente.') }}
            </p>

            <div class="form-group">
                <label for="password" class="sr-only">{{ __('Senha') }}</label>
                <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Senha') }}" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </button>

                <button type="submit" class="btn btn-danger ms-2">
                    {{ __('Excluir Conta') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
