<x-app-layout>
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Saúde em Foco</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }


      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }

      .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s;
      }
      .card:hover {
        transform: translateY(-5px);
      }
      .feature-card {
        background: linear-gradient(45deg, #f8f9fa, #ffffff);
      }
      .icon-wrapper {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #e7f1ff;
        margin-right: 1rem;
      }
      .form-control, .form-select {
        border-radius: 10px;
        padding: 0.75rem 1rem;
        border: 1px solid #e0e0e0;
      }
      .form-control:focus, .form-select:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
      }
      .btn-primary {
        border-radius: 10px;
        padding: 0.75rem 2rem;
      }
      .results-card {
        background-color: #ffffff;
        border-radius: 15px;
        padding: 2rem;
      }
    </style>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    
    <link href="{{ url ('/assets/css/dashboard.css')}}" rel="stylesheet">
    <link href="{{ url ('/assets/css/dashboard.rtl.css')}}" rel="stylesheet">
    <script src="{{ url ('/assets/js/dashboard.js')}}"></script>
  </head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2 class="mb-4 text-center">Saúde em Foco</h2>
                
                <div class="row g-4 mb-5">
                    <!-- Card IMC -->
                    <div class="col-md-4">
                        <div class="card feature-card h-100" data-bs-toggle="modal" data-bs-target="#imcModal" style="cursor: pointer">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon-wrapper">
                                    <i class="bi bi-graph-up text-primary fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="card-title mb-1">IMC</h5>
                                    <p class="card-text text-muted small mb-0">Calcule seu índice de massa corporal</p>
                                </div>  
                            </div>
                        </div>
                    </div>

                    <!-- Card Hidratação -->
                    <div class="col-md-4">
                        <div class="card feature-card h-100" data-bs-toggle="modal" data-bs-target="#hidratacaoModal" style="cursor: pointer">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon-wrapper">
                                    <i class="bi bi-droplet text-primary fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="card-title mb-1">Hidratação</h5>
                                    <p class="card-text text-muted small mb-0">Descubra sua necessidade diária de água</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Calorias -->
                    <div class="col-md-4">
                        <div class="card feature-card h-100" data-bs-toggle="modal" data-bs-target="#caloriasModal" style="cursor: pointer">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon-wrapper">
                                    <i class="bi bi-calculator text-primary fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="card-title mb-1">Calorias</h5>
                                    <p class="card-text text-muted small mb-0">Calcule suas necessidades calóricas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal IMC -->
                <div class="modal fade" id="imcModal" tabindex="-1" aria-labelledby="imcModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imcModalLabel">Índice de Massa Corporal (IMC)</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>O IMC é uma medida internacional usada para calcular se uma pessoa está no peso ideal. O índice é calculado dividindo o peso (em kg) pela altura ao quadrado (em metros).</p>
                                <h6>Classificação do IMC:</h6>
                                <ul>
                                    <li>Abaixo de 18,5: Abaixo do peso</li>
                                    <li>18,5 - 24,9: Peso normal</li>
                                    <li>25,0 - 29,9: Sobrepeso</li>
                                    <li>30,0 - 34,9: Obesidade grau 1</li>
                                    <li>35,0 - 39,9: Obesidade grau 2</li>
                                    <li>Acima de 40: Obesidade grau 3</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Hidratação -->
                <div class="modal fade" id="hidratacaoModal" tabindex="-1" aria-labelledby="hidratacaoModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hidratacaoModalLabel">Hidratação Diária</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>A hidratação adequada é essencial para o bom funcionamento do corpo. A quantidade de água necessária varia de acordo com diversos fatores:</p>
                                <ul>
                                    <li>Peso corporal</li>
                                    <li>Nível de atividade física</li>
                                    <li>Clima</li>
                                    <li>Dieta</li>
                                </ul>
                                <p>Uma regra geral é consumir entre 30-35ml de água por kg de peso corporal por dia.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Calorias -->
                <div class="modal fade" id="caloriasModal" tabindex="-1" aria-labelledby="caloriasModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="caloriasModalLabel">Necessidades Calóricas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>O cálculo das necessidades calóricas diárias considera diversos fatores:</p>
                                <ul>
                                    <li>Taxa metabólica basal (TMB)</li>
                                    <li>Nível de atividade física</li>
                                    <li>Idade</li>
                                    <li>Gênero</li>
                                    <li>Composição corporal</li>
                                </ul>
                                <p>Este cálculo ajuda a determinar a quantidade de calorias necessárias para manter, perder ou ganhar peso de forma saudável.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="input-section">
                    <div class="card">
                        <div class="card-body p-4">
                            <form id="healthForm" class="needs-validation" novalidate>
                                @csrf
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label for="weight" class="form-label">Peso (kg)</label>
                                        <input type="number" class="form-control" id="weight" name="weight" required min="30" max="300" step="0.1">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="height" class="form-label">Altura (cm)</label>
                                        <input type="number" class="form-control" id="height" name="height" required min="100" max="250">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="age" class="form-label">Idade</label>
                                        <input type="number" class="form-control" id="age" name="age" required min="1" max="120">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">Gênero</label>
                                        <select class="form-select" id="gender" name="gender" required>
                                            <option value="male">Masculino</option>
                                            <option value="female">Feminino</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="activityLevel" class="form-label">Nível de Atividade Física</label>
                                        <select class="form-select" id="activityLevel" name="activityLevel" required>
                                            <option value="sedentary">Sedentário</option>
                                            <option value="light">Levemente ativo</option>
                                            <option value="moderate">Moderadamente ativo</option>
                                            <option value="active">Muito ativo</option>
                                            <option value="extra_active">Extremamente ativo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-4 d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">
                                        Calcular
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="results" class="mt-4" style="display: none;">
                    <!-- Results will be displayed here -->
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/health-calculator.js') }}"></script>
</body>
</html>

</x-app-layout>