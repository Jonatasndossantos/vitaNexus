<x-guest-layout>
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <!-- Left side - Login Form -->
            <div class="col-12 col-md-6 p-5">
                <div class="d-flex flex-column h-100 justify-content-center" style="max-width: 400px; margin: 0 auto;">
                    <!-- Logo -->
                    <div class="text-center mb-4">
                        <img src="{{ url ('/assets/imagem/logo2.png ')}}" alt="Lotus Logo" style="width: 200px;">
                      
                    </div>

                

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

  
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

                        <div class="form-floating mb-4">
                            <input type="password" 
                                   class="form-control" 
                                   id="password"
                                   name="password" 
                                   placeholder="Password"
                                   required>
                            <label for="password">Senha</label>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="btn btn-lg btn-success w-100 mb-3" 
                              >
                            LOGIN
                        </button>

                        <!-- Forgot Password Link -->
                        <div class="text-center mb-4">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-muted text-decoration-none">
                                   Esqueceu sua senha?
                                </a>
                            @endif
                        </div>

                        <!-- Create Account Link -->
                        <div class="text-center">
                            <span class="text-muted">Não tem uma conta </span>
                            <a href="{{ route('register') }}" class="text-decoration-none" style="color:rgb(32, 198, 96);">
                                Cadastre-se
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

    <footer class="container">
   
    <p>&copy; 2025 VitaNexus &middot; </p>
  </footer>
</main>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .form-control:focus {
            border-color: #dd3675;
            box-shadow: 0 0 0 0.25rem rgba(221, 54, 117, 0.25);
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