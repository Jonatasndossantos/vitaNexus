<x-app-layout>
    

    <div class="py-12 ">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('Informações de Perfil') }}</h5>
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('Atualizar Senha') }}</h5>
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('Excluir Conta') }}</h5>
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
