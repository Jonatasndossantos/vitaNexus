<x-guest-layout>
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <!-- Left side - Register Form -->
            <div class="col-12 col-md-6 p-5">
                <div class="d-flex flex-column h-100 justify-content-center" style="max-width: 400px; margin: 0 auto;">
                    <!-- Logo -->
                    <div class="text-center mb-4">
                        <img src="{{ url ('/assets/imagem/logo2.png ')}}" alt="Lotus Logo" style="width: 200px;">
                    </div>

                    <!-- Register Form -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name Input -->
                        <div class="form-floating mb-3">
                            <input type="text" 
                                   class="form-control" 
                                   id="name" 
                                   name="name" 
                                   placeholder="Seu nome"
                                   value="{{ old('name') }}" 
                                   required>
                            <label for="name">Nome</label>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Input -->
                        <div class="form-floating mb-3">
                            <input type="email" 
                                   class="form-control" 
                                   id="email" 
                                   name="email" 
                                   placeholder="name@example.com"
                                   value="{{ old('email') }}" 
                                   required>
                            <label for="email">Email</label>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password Input -->
                        <div class="form-floating mb-3">
                            <input type="password" 
                                   class="form-control" 
                                   id="password"
                                   name="password" 
                                   placeholder="Password"
                                   required>
                            <label for="password">Senha</label>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="form-floating mb-4">
                            <input type="password" 
                                   class="form-control" 
                                   id="password_confirmation"
                                   name="password_confirmation" 
                                   placeholder="Confirm Password"
                                   required>
                            <label for="password_confirmation">Confirmar Senha</label>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Register Button -->
                        <button type="submit" class="btn btn-lg btn-success w-100 mb-3">
                            CADASTRAR
                        </button>

                        <!-- Login Link -->
                        <div class="text-center">
                            <span class="text-muted">Já tem uma conta? </span>
                            <a href="{{ route('login') }}" class="text-decoration-none" style="color:rgb(32, 198, 96);">
                                Faça login
                            </a>
                        </div>
                        <div class="text-center mt-4">
                            <a href="/" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#05664F] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                <button type="button" class="btn btn-outline-success">
                                    Voltar
                                </button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right side - Gradient Background -->
            <div class="col-md-6 d-none d-md-flex align-items-center text-white p-5"
                 style="background: linear-gradient(270deg, rgba(9,121,17,1) 16%, rgba(255,255,255,1) 91%);">
                <div>
                </div>
            </div>
            
        </div>
    </div>


    <style>
        .form-control:focus {
            border-color: #20c660;
            box-shadow: 0 0 0 0.25rem rgba(32, 198, 96, 0.25);
        }

        .form-control {
            border-radius: 4px;
            border: 1px solid #ced4da;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</x-guest-layout>