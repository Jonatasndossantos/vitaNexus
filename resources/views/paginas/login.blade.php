<html lang="pt-BR" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
       
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary" cz-shortcut-listen="true">
    @csrf <!-- Abrir as portas do servidor-->
    <!--caixa de login-->
    <main class="card p-4 form-signin w-auto m-auto">
        <form method="GET">
            
            <h1 class="h3 mb-4 fw-normal">Faça login</h1>

            <div class="form-floating">
                <input name="usuario" type="text" class="form-control" id="floatingInput" placeholder="Username" required>
                <label for="validationDefaultUsername floatingInput">Usuario</label>
            </div>
            <div class="form-floating">
                <input name="senha" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="validationDefaultUsername floatingPassword">Senha</label>
            </div>

            <div class="form-check text-start my-3" style="--bs-gap: .25rem 1rem;">
                <div class="d-flex container text-center">
                      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                      <div class="col-7">
                        <label class="form-check-label" for="flexCheckDefault">
                            lembre de mim
                        </label>
                      </div>
                      <div class="col">
                        <div>
                            <a href="RedefinirSenha.php" class="txt1">
                                Esqueceu?
                            </a>
                        </div>
                      </div>
                  </div>                
            </div>
            <button class="btn btn-primary w-100 py-2">Entrar
                
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Entrar
                
            </button>
        </form>
        
        <!--modal cadastrar-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                  <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cadastre-se gratuitamente</font></font></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                  </div>

                  <div class="modal-body p-5 pt-0">
                    <form class="" method="POST" action="{{ route('register') }}">
                      <div class="form-floating mb-3">
                        <input type="name" class="form-control rounded-3" id="floatingInput" placeholder="Nome">
                        <label for="floatingInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nome</font></font></label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-3" id="floatingInput" placeholder="nome@exemplo.com">
                        <label for="floatingInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Endereço de email</font></font></label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-3" id="floatingPassword" placeholder="Senha">
                        <label for="floatingPassword"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Senha</font></font></label>
                      </div>
                      <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Inscrever-se</font></font></button>
                      <small class="text-body-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ao clicar em Inscrever-se, você concorda com os termos de uso.</font></font></small>
                      <hr class="my-4">
                      <h2 class="fs-5 fw-bold mb-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ou use um terceiro</font></font></h2>
                      <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
                        <svg class="bi me-1" width="16" height="16"><use xlink:href="#twitter"></use></svg><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Cadastre-se com o Twitter
                      </font></font></button>
                      <button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit">
                        <svg class="bi me-1" width="16" height="16"><use xlink:href="#facebook"></use></svg><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Cadastre-se com o Facebook
                      </font></font></button>
                      <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
                        <svg class="bi me-1" width="16" height="16"><use xlink:href="#github"></use></svg><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Cadastre-se com o GitHub
                      </font></font></button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
        <p class="mt-5 mb-3 text-body-secondary">© 2017–2024</p>
    </main>
    <!--fim caixa d login-->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>

</html>