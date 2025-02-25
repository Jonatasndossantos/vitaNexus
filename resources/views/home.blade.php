<x-app-layout>  
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
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

                <div id="mainContent">
                    <div class="card">
                        <div class="card-body p-4 border border-success rounded">
                            <!-- Cabeçalho do Card -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h4 class="mb-1" id="section-title">
                                        @if(isset($lastHealthData) && !$showForm)
                                            Seus Resultados
                                        @else
                                            Novo Registro de Saúde
                                        @endif
                                    </h4>
                                    @if(isset($lastHealthData) && !$showForm)
                                        <div class="d-flex align-items-center text-muted">
                                            <i class="bi bi-calendar3 me-2"></i>
                                            {{ $lastHealthData->created_at->format('d/m/Y') }}
                                            <span class="mx-2">•</span>
                                            <i class="bi bi-person me-2"></i>
                                            {{ $lastHealthData->weight }}kg
                                            <span class="mx-2">•</span>
                                            <i class="bi bi-rulers me-2"></i>
                                            {{ $lastHealthData->height }}cm
                                            <span class="mx-2">•</span>
                                            <i class="bi bi-heart-pulse me-2"></i>
                                            {{ $lastHealthData->sistolica }}/{{ $lastHealthData->diastolica }}mmHg
                                        </div>
                                    @endif
                                </div>
                                @if(isset($lastHealthData) && !$showForm)
                                    <div class="btn-group">
                                        <a href="{{ route('history') }}" class="btn btn-outline-success">
                                            <i class="bi bi-clock-history me-2"></i>Histórico
                                        </a>
                                        <a href="{{ route('home', ['form' => true]) }}" class="btn btn-success">
                                            <i class="bi bi-plus-circle me-2"></i>Novo Registro
                                        </a>
                                    </div>
                                @endif
                            </div>

                            <!-- Conteúdo Principal -->
                            @if(isset($lastHealthData) && !$showForm)
                                <!-- Seção de Resultados -->
                                <div id="resultsSection">
                                    <div class="row g-4 mb-4">
                                        <!-- Card IMC -->
                                        <div class="col-md-4">
                                            <div class="card h-100">
                                                <div class="card-body text-center p-4">
                                                    <div class="icon-wrapper mx-auto mb-3">
                                                        <i class="bi bi-graph-up text-success fs-4"></i>
                                                    </div>
                                                    <h5 class="card-title">IMC</h5>
                                                    <h2 class="display-4 mb-2">{{ $lastHealthData->bmi }}</h2>
                                                    <p class="text-{{ $lastHealthData->bmiClass }}">{{ $lastHealthData->bmiCategory }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Card Água -->
                                        <div class="col-md-4">
                                            <div class="card h-100">
                                                <div class="card-body text-center p-4">
                                                    <div class="icon-wrapper mx-auto mb-3">
                                                        <i class="bi bi-droplet text-success fs-4"></i>
                                                    </div>
                                                    <h5 class="card-title">Água</h5>
                                                    <h2 class="display-4 mb-2">{{ $lastHealthData->waterIntake }}L</h2>
                                                    <p class="text-muted">Consumo diário recomendado</p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Card Calorias -->
                                        <div class="col-md-4">
                                            <div class="card h-100">
                                                <div class="card-body text-center p-4">
                                                    <div class="icon-wrapper mx-auto mb-3">
                                                        <i class="bi bi-calculator text-success fs-4"></i>
                                                    </div>
                                                    <h5 class="card-title">Calorias</h5>
                                                    <h2 class="display-4 mb-2">{{ $lastHealthData->calories }}</h2>
                                                    <p class="text-muted">Necessidade calórica diária</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Recomendações Nutricionais -->
                                    <div class="card mt-4">
                                        <div class="card-body p-4">
                                            <h5 class="mb-4">Recomendações Nutricionais</h5>
                                            <div class="row g-4">
                                                <div class="col-md-4">
                                                    <div class="card h-100">
                                                        <div class="card-body text-center p-4">
                                                            <h6 class="text-muted mb-3">Proteínas</h6>
                                                            <p class="h3 mb-0">{{ $lastHealthData->macros['protein']['min'] }}g - {{ $lastHealthData->macros['protein']['max'] }}g</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card h-100">
                                                        <div class="card-body text-center p-4">
                                                            <h6 class="text-muted mb-3">Carboidratos</h6>
                                                            <p class="h3 mb-0">{{ $lastHealthData->macros['carbs']['min'] }}g - {{ $lastHealthData->macros['carbs']['max'] }}g</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card h-100">
                                                        <div class="card-body text-center p-4">
                                                            <h6 class="text-muted mb-3">Gorduras</h6>
                                                            <p class="h3 mb-0">{{ $lastHealthData->macros['fats']['min'] }}g - {{ $lastHealthData->macros['fats']['max'] }}g</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <!-- Seção do Formulário -->
                                <div id="formSection">
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

                                        <div class="mt-4 d-flex justify-content-between">
                                            @if(isset($lastHealthData))
                                                <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                                    <i class="bi bi-arrow-left me-2"></i>Voltar
                                                </a>
                                            @endif
                                            <button type="submit" class="btn btn-success ms-auto ">
                                                <i class="bi bi-check-circle me-2"></i>Salvar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
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
    


    @push('styles')
    <style>
    #formSection, #resultsSection {
        transition: all 0.3s ease-in-out;
    }

    .btn {
        transition: all 0.3s ease;
    }

    /* Prevenir cliques múltiplos */
    .btn[disabled] {
        pointer-events: none;
        opacity: 0.65;
    }
    </style>
    @endpush

</x-app-layout>