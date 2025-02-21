<x-app-layout>
  <head>
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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    
  </head>
  <body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2 class="mb-4 text-center">Saúde em Foco</h2>
                
                <div class="row g-4 mb-5 ">
                    <!-- Card IMC -->
                    <div class="col-md-4">
                        <div class="card feature-card h-100 border border-success" data-bs-toggle="modal" data-bs-target="#imcModal" style="cursor: pointer">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon-wrapper">
                                    <i class="bi bi-graph-up text-success fs-4"></i>
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
                        <div class="card feature-card h-100 border border-success" data-bs-toggle="modal" data-bs-target="#hidratacaoModal" style="cursor: pointer">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon-wrapper">
                                    <i class="bi bi-droplet text-success fs-4"></i>
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
                        <div class="card feature-card h-100 border border-success" data-bs-toggle="modal" data-bs-target="#caloriasModal" style="cursor: pointer">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon-wrapper">
                                    <i class="bi bi-calculator text-success fs-4"></i>
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
                <div class="modal fade border border-success" id="imcModal" tabindex="-1" aria-labelledby="imcModalLabel" aria-hidden="true">
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
                        <div class="card-body p-4 border border-success rounded">
                            <form method="POST" action="{{ route('health.store') }}" class="needs-validation" novalidate>
                                @csrf
                                
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label for="weight" class="form-label">Peso (kg)</label>
                                        <input type="number" class="form-control @error('weight') is-invalid @enderror" 
                                               id="weight" name="weight" value="{{ old('weight') }}" 
                                               required min="30" max="300" step="0.1">
                                        @error('weight')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="height" class="form-label">Altura (cm)</label>
                                        <input type="number" class="form-control @error('height') is-invalid @enderror" 
                                               id="height" name="height" value="{{ old('height') }}" 
                                               required min="100" max="250">
                                        @error('height')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="age" class="form-label">Idade</label>
                                        <input type="number" class="form-control @error('age') is-invalid @enderror" 
                                               id="age" name="age" value="{{ old('age') }}" 
                                               required min="1" max="120">
                                        @error('age')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">Gênero</label>
                                        <select class="form-select @error('gender') is-invalid @enderror" 
                                                id="gender" name="gender" required>
                                            <option value="">Selecione...</option>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Masculino</option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Feminino</option>
                                        </select>
                                        @error('gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="sistolica" class="form-label">Pressão Arterial Sistólica (mmHg)</label>
                                        <input type="number" class="form-control @error('sistolica') is-invalid @enderror" 
                                               id="sistolica" name="sistolica" value="{{ old('sistolica') }}" 
                                               required min="1" max="200">
                                        @error('sistolica')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="diastolica" class="form-label">Pressão Arterial Diastólica (mmHg)</label>
                                        <input type="number" class="form-control @error('diastolica') is-invalid @enderror" 
                                               id="diastolica" name="diastolica" value="{{ old('diastolica') }}" 
                                               required min="1" max="160">
                                        @error('diastolica')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="activity_level" class="form-label">Nível de Atividade Física</label>
                                        <select class="form-select @error('activity_level') is-invalid @enderror" 
                                                id="activity_level" name="activity_level" required>
                                            <option value="">Selecione...</option>
                                            <option value="sedentary" {{ old('activity_level') == 'sedentary' ? 'selected' : '' }}>Sedentário</option>
                                            <option value="light" {{ old('activity_level') == 'light' ? 'selected' : '' }}>Levemente ativo</option>
                                            <option value="moderate" {{ old('activity_level') == 'moderate' ? 'selected' : '' }}>Moderadamente ativo</option>
                                            <option value="active" {{ old('activity_level') == 'active' ? 'selected' : '' }}>Muito ativo</option>
                                            <option value="extra_active" {{ old('activity_level') == 'extra_active' ? 'selected' : '' }}>Extremamente ativo</option>
                                        </select>
                                        @error('activity_level')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Vícios</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tabagismo" value="1" {{ old('tabagismo') ? 'checked' : '' }}>
                                            <label class="form-check-label">Tabagismo</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="alcoolismo" value="1" {{ old('alcoolismo') ? 'checked' : '' }}>
                                            <label class="form-check-label">Alcoolismo</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="alimentacao_nao_saudavel" value="1" {{ old('alimentacao_nao_saudavel') ? 'checked' : '' }}>
                                            <label class="form-check-label">Alimentação Não Saudável</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="estresse_cronico" value="1" {{ old('estresse_cronico') ? 'checked' : '' }}>
                                            <label class="form-check-label">Estresse Crônico</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="drogas_ilicitas" value="1" {{ old('drogas_ilicitas') ? 'checked' : '' }}>
                                            <label class="form-check-label">Drogas Ilícitas</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="insonia" value="1" {{ old('insonia') ? 'checked' : '' }}>
                                            <label class="form-check-label">Insônia</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 d-flex justify-content-end">
                                    <button class="btn btn-success" type="submit">
                                        Salvar
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Exibição dos dados salvos -->
                @if(session('success'))
                    <div class="alert alert-success mt-4">
                        {{ session('success') }}
                        @if(session('imc'))
                            <br>Seu IMC é: {{ session('imc') }}
                        @endif
                    </div>
                @endif

                @if(isset($healthData) && $healthData->count() > 0)
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title">Histórico de Saúde</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Peso</th>
                                            <th>Altura</th>
                                            <th>IMC</th>
                                            <th>Pressão Arterial</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($healthData as $data)
                                            <tr>
                                                <td>{{ $data->created_at->format('d/m/Y') }}</td>
                                                <td>{{ $data->weight }} kg</td>
                                                <td>{{ $data->height }} cm</td>
                                                <td>{{ round($data->weight / (($data->height/100) * ($data->height/100)), 2) }}</td>
                                                <td>{{ $data->sistolica }}/{{ $data->diastolica }}</td>
                                                <td>
                                                    <a href="{{ route('health.show', $data->id) }}" class="btn btn-sm btn-info">Ver</a>
                                                    <form action="{{ route('health.destroy', $data->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>


   <!--     ========================================= Pressão Arterial =========================   -->


    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
           
                
                <div class="row g-4 mb-5 ">
                    <!-- Card Pressão Arterial -->
                    <div class="col-md-4">
                        <div class="card feature-card h-100 border border-success" data-bs-toggle="modal" data-bs-target="#pressaoModal" style="cursor: pointer">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon-wrapper">
                                    <i class="bi bi-graph-up text-success fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="card-title mb-1">Pressão Arterial</h5>
                                    <p class="card-text text-muted small mb-0">Monitore sua pressão regularmente</p>
                                </div>  
                            </div>
                        </div>
                    </div>

                    <!-- Card Risco de Diabetes -->
                    <div class="col-md-4">
                        <div class="card feature-card h-100 border border-success" data-bs-toggle="modal" data-bs-target="#diabetesModal" style="cursor: pointer">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon-wrapper">
                                    <i class="bi bi-droplet text-success fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="card-title mb-1">Risco de Diabetes</h5>
                                    <p class="card-text text-muted small mb-0">Fique atento aos sinais</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Risco Cardiovascular -->
                    <div class="col-md-4">
                        <div class="card feature-card h-100 border border-success" data-bs-toggle="modal" data-bs-target="#cardioModal" style="cursor: pointer">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon-wrapper">
                                    <i class="bi bi-calculator text-success fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="card-title mb-1">Risco Cardiovascular</h5>
                                    <p class="card-text text-muted small mb-0">Cuide do seu coração</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Pressao -->
                <div class="modal fade border border-success" id="pressaoModal" tabindex="-1" aria-labelledby="imcModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imcModalLabel">Pressão Arterial</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>A pressão arterial é a força que o sangue exerce contra as paredes das artérias ao circular pelo corpo. Ela é medida em milímetros de mercúrio (mmHg) e representada por dois valores: a pressão sistólica (quando o coração se contrai) e a diastólica (quando o coração relaxa).</p>
                                <ul>
                                    <li>Abaixo de 90/60: Hipotensão (pressão baixa)</li>
                                    <li>90/60   - 119/79: Pressão arterial normal</li>
                                    <li>120/80  - 129/84: Normal alta</li>
                                    <li>130/85  - 139/89: Pré-hipertensão</li>
                                    <li>140/90  - 159/99: Hipertensão estágio 1</li>
                                    <li>160/100 - 179/109: Hipertensão estágio 2</li>
                                    <li>Acima de 180/110: Crise hipertensiva</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal diabetes -->
                <div class="modal fade" id="diabetesModal" tabindex="-1" aria-labelledby="hidratacaoModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hidratacaoModalLabel">Hidratação Diária</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>O risco de diabetes está relacionado à capacidade do corpo de controlar os níveis de glicose (açúcar) no sangue.</p>
                                <ul>
                                    <li>Abaixo de 70 mg/dL: Hipoglicemia (glicose baixa)</li>
                                    <li>70 - 99 mg/dL:</li>
                                    <li>100 - 125 mg/dL: Pré-diabetes</li>
                                    <li>126 mg/dL ou acima: Diabetes</li>
                                </ul>
                                <p>Além da glicemia em jejum, o teste de hemoglobina glicada (HbA1c) também é usado para avaliar o controle da glicose a longo prazo. </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Cardiovascular -->
                <div class="modal fade" id="cardioModal" tabindex="-1" aria-labelledby="caloriasModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="caloriasModalLabel">Necessidades Calóricas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Avalia a probabilidade de desenvolver doenças como infarto, AVC e outras complicações relacionadas ao coração e aos vasos sanguíneos. O risco cardiovascular é calculado com base em fatores como idade, sexo, pressão arterial, colesterol, diabetes, tabagismo e histórico familiar.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="input-section">
                    <div class="card">
                        <div class="card-body p-4 border border-success rounded">
                            <form id="healthForm" class="needs-validation" novalidate>
                                @csrf
                                <div class="row g-4">
                                    
                                    <div class="col-md-6">
                                        <label for="age" class="form-label">Pressão Arterial Sistólica (mmHg):</label>
                                        <input type="number" class="form-control" id="sistolica" name="sistolica" required min="1" max="200">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="age" class="form-label">Pressão Arterial Diastólica (mmHg):</label>
                                        <input type="number" class="form-control" id="diastolica" name="diastolica" required min="1" max="160">
                                    </div>

                            

                                    <div class="col-md-6">
                                    <label class="form-label">Vícios</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tabagismo" value="1">
                                            <label class="form-check-label">Tabagismo</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="alcoolismo" value="1">
                                            <label class="form-check-label">Alcoolismo</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                                            <label class="form-check-label" for="flexCheckChecked">Alimentação Não Saudável</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                                            <label class="form-check-label" for="flexCheckChecked">Estresse Crônico</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                                            <label class="form-check-label" for="flexCheckChecked">Drogas Ilícitas</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                                            <label class="form-check-label" for="flexCheckChecked">Insônia</label>
                                        </div>
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
                               <button class="btn btn-success" type="submit">
                                        Calcular
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if($healthData = Auth::user()->healthData()->latest()->first())
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title">Seus dados de saúde mais recentes</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Peso: {{ $healthData->weight }} kg</p>
                                    <p>Altura: {{ $healthData->height }} cm</p>
                                    <p>Idade: {{ $healthData->age }} anos</p>
                                    <!-- Adicione outros campos conforme necessário -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if(isset($calculatedData))
                <div id="results" class="mt-4">
                    <div class="results-card">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">Seus Resultados</h4>
                            <button class="btn btn-outline-primary" onclick="location.reload()">
                                <i class="bi bi-arrow-repeat me-2"></i>
                                Calcular Novamente
                            </button>
                        </div>
                        
                        <div class="row g-4 mb-4">
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <div class="card-body text-center p-4">
                                        <div class="icon-wrapper mx-auto mb-3">
                                            <i class="bi bi-graph-up text-primary fs-4"></i>
                                        </div>
                                        <h5 class="card-title">IMC</h5>
                                        <h2 class="display-4 mb-2">{{ $calculatedData['bmi'] }}</h2>
                                        <p class="text-{{ $calculatedData['bmiCategory']['color'] }}">
                                            {{ $calculatedData['bmiCategory']['category'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <div class="card-body text-center p-4">
                                        <div class="icon-wrapper mx-auto mb-3">
                                            <i class="bi bi-droplet text-primary fs-4"></i>
                                        </div>
                                        <h5 class="card-title">Água</h5>
                                        <h2 class="display-4 mb-2">{{ $calculatedData['waterIntake'] }}L</h2>
                                        <p class="text-muted">Consumo diário recomendado</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <div class="card-body text-center p-4">
                                        <div class="icon-wrapper mx-auto mb-3">
                                            <i class="bi bi-calculator text-primary fs-4"></i>
                                        </div>
                                        <h5 class="card-title">Calorias</h5>
                                        <h2 class="display-4 mb-2">{{ $calculatedData['calories'] }}</h2>
                                        <p class="text-muted">Necessidade calórica diária</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="mb-4">Recomendações Nutricionais</h5>
                                <div class="row g-4">
                                    <div class="col-md-4">
                                        <div class="card h-100">
                                            <div class="card-body text-center p-4">
                                                <h6 class="text-muted mb-3">Proteínas</h6>
                                                <p class="h3 mb-0">
                                                    {{ $calculatedData['macros']['protein']['min'] }}g - 
                                                    {{ $calculatedData['macros']['protein']['max'] }}g
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="card h-100">
                                            <div class="card-body text-center p-4">
                                                <h6 class="text-muted mb-3">Carboidratos</h6>
                                                <p class="h3 mb-0">
                                                    {{ $calculatedData['macros']['carbs']['min'] }}g - 
                                                    {{ $calculatedData['macros']['carbs']['max'] }}g
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="card h-100">
                                            <div class="card-body text-center p-4">
                                                <h6 class="text-muted mb-3">Gorduras</h6>
                                                <p class="h3 mb-0">
                                                    {{ $calculatedData['macros']['fats']['min'] }}g - 
                                                    {{ $calculatedData['macros']['fats']['max'] }}g
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
<script>
// Validação do formulário
(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/health-calculator.js') }}"></script>
</body>
</html>

</x-app-layout>