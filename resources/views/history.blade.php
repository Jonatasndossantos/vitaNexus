<x-app-layout>
    <div class="container py-5">
        <!-- Alerta de Sucesso -->
        

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <!-- Cabeçalho da Página -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="mb-1">Histórico de Saúde</h2>
                        <p class="text-muted mb-0">Acompanhe sua evolução ao longo do tempo</p>
                    </div>
                    <a href="{{ route('home') }}" class="btn btn-success">
                        <i class="bi bi-plus-circle me-2"></i>Novo Registro
                    </a>
                </div>

                <!-- Card Principal -->
                <div class="card shadow-sm">
                    <div class="card-header bg-success bg-opacity-10 border-success">
                        <div class="row align-items-center">
                            <div class="col">
                                <form action="{{ route('history') }}" method="GET" class="d-flex">
                                    <div class="input-group">
                                        <span class="input-group-text border-success">
                                            <i class="bi bi-search text-success"></i>
                                        </span>
                                        <input type="text" name="search" class="form-control border-success" 
                                               placeholder="Buscar registros..." value="{{ request('search') }}">
                                        <button type="submit" class="btn btn-success">
                                            <i class="bi bi-search me-1"></i>Buscar
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-auto">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#filterModal">
                                        <i class="bi bi-funnel me-1"></i>Filtrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-success bg-opacity-25">
                                    <tr>
                                        <th class="px-4">Data</th>
                                        <th>Peso</th>
                                        <th>IMC</th>
                                        <th>Pressão Arterial</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-end px-4">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($healthData as $data)
                                        <tr>
                                            <td class="px-4">
                                                <strong>{{ $data['date'] }}</strong>
                                            </td>
                                            <td>{{ $data['weight'] }} kg</td>
                                            <td>
                                                <span class="badge bg-{{ $data['bmiClass'] }}">
                                                    {{ $data['bmi'] }}
                                                </span>
                                                <small class="text-muted ms-1">{{ $data['bmiCategory'] }}</small>
                                            </td>
                                            <td>
                                                <span class="badge bg-{{ $data['pressureClass'] }}">
                                                    {{ $data['sistolica'] }}/{{ $data['diastolica'] }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                {!! $data['healthStatus'] !!}
                                            </td>
                                            <td class="text-end px-4">
                                                <div class="btn-group-sm">
                                                    <a href="#" 
                                                       class="btn btn-outline-primary"
                                                       data-bs-toggle="modal" 
                                                       data-bs-target="#editModal{{ $data['id'] }}">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <form action="{{ route('delete', $data['id']) }}" method="POST" style="display:inline;" class="">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn text-danger" onclick="return confirm('Tem certeza que deseja excluir?')">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Footer com Paginação -->
                    <div class="card-footer bg-light border-success py-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <small class="text-muted">
                                    Mostrando {{ count($healthData) }} registros
                                </small>
                            </div>
                            <div class="col-auto">
                                <!-- Adicione paginação se necessário -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Exibição dos dados salvos -->

    <!-- Modal de Filtros -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success bg-opacity-10">
                    <h5 class="modal-title" id="filterModalLabel">Filtrar Registros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('history') }}" method="GET">
                    <div class="modal-body">
                        <!-- Período -->
                        <div class="mb-3">
                            <label class="form-label">Período</label>
                            <div class="row g-2">
                                <div class="col">
                                    <input type="date" name="date_start" class="form-control" 
                                           value="{{ request('date_start') }}" placeholder="Data Inicial">
                                </div>
                                <div class="col">
                                    <input type="date" name="date_end" class="form-control" 
                                           value="{{ request('date_end') }}" placeholder="Data Final">
                                </div>
                            </div>
                        </div>

                        <!-- Categoria IMC -->
                        <div class="mb-3">
                            <label class="form-label">Categoria IMC</label>
                            <select name="bmi_category" class="form-select">
                                <option value="">Todas as categorias</option>
                                <option value="abaixo" {{ request('bmi_category') == 'abaixo' ? 'selected' : '' }}>Abaixo do peso</option>
                                <option value="normal" {{ request('bmi_category') == 'normal' ? 'selected' : '' }}>Peso normal</option>
                                <option value="sobrepeso" {{ request('bmi_category') == 'sobrepeso' ? 'selected' : '' }}>Sobrepeso</option>
                                <option value="obesidade" {{ request('bmi_category') == 'obesidade' ? 'selected' : '' }}>Obesidade</option>
                            </select>
                        </div>

                        <!-- Pressão Arterial -->
                        <div class="mb-3">
                            <label class="form-label">Pressão Arterial</label>
                            <select name="pressure_category" class="form-select">
                                <option value="">Todas as categorias</option>
                                <option value="normal" {{ request('pressure_category') == 'normal' ? 'selected' : '' }}>Normal</option>
                                <option value="elevated" {{ request('pressure_category') == 'elevated' ? 'selected' : '' }}>Elevada</option>
                                <option value="high" {{ request('pressure_category') == 'high' ? 'selected' : '' }}>Alta</option>
                            </select>
                        </div>

                        <!-- Fatores de Risco -->
                        <div class="mb-3">
                            <label class="form-label">Fatores de Risco</label>
                            <div class="form-check">
                                <input type="checkbox" name="risk_factors[]" value="tabagismo" 
                                       class="form-check-input" {{ in_array('tabagismo', request('risk_factors', [])) ? 'checked' : '' }}>
                                <label class="form-check-label">Tabagismo</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="risk_factors[]" value="alcoolismo" 
                                       class="form-check-input" {{ in_array('alcoolismo', request('risk_factors', [])) ? 'checked' : '' }}>
                                <label class="form-check-label">Alcoolismo</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="risk_factors[]" value="alimentacao_nao_saudavel" 
                                class="form-check-input" {{ in_array('alimentacao_nao_saudavel', request('risk_factors', [])) ? 'checked' : '' }}>
                                <label class="form-check-label">Alimentação não saudável</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="risk_factors[]" value="estresse_cronico" 
                                       class="form-check-input" {{ in_array('estresse_cronico', request('risk_factors', [])) ? 'checked' : '' }}>
                                <label class="form-check-label">estresse_cronico</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="risk_factors[]" value="drogas_ilicitas" 
                                       class="form-check-input" {{ in_array('drogas_ilicitas', request('risk_factors', [])) ? 'checked' : '' }}>
                                <label class="form-check-label">drogas_ilicitas</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="risk_factors[]" value="insonia" 
                                       class="form-check-input" {{ in_array('insonia', request('risk_factors', [])) ? 'checked' : '' }}>
                                <label class="form-check-label">insonia</label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('history') }}" class="btn btn-outline-secondary">Limpar Filtros</a>
                        <button type="submit" class="btn btn-success">Aplicar Filtros</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de Edição para cada registro -->
    @foreach($healthData as $data)
        <div class="modal fade" id="editModal{{ $data['id'] }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary bg-opacity-10">
                        <h5 class="modal-title">Editar Registro de {{ $data['date'] }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('update', $data['id']) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Peso (kg)</label>
                                <input type="number" step="0.1" name="weight" 
                                       class="form-control" required 
                                       value="{{ $data['weight'] }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Altura (cm)</label>
                                <input type="number" step="0.1" name="height" 
                                       class="form-control" required 
                                       value="{{ $data['height'] }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pressão Arterial</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" name="sistolica" 
                                               class="form-control" placeholder="Sistólica" 
                                               required value="{{ $data['sistolica'] }}">
                                    </div>
                                    <div class="col">
                                        <input type="number" name="diastolica" 
                                               class="form-control" placeholder="Diastólica" 
                                               required value="{{ $data['diastolica'] }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nível de Atividade</label>
                                <select name="activity_level" class="form-select" required>
                                    <option value="sedentary" {{ $data['activity_level'] == 'sedentary' ? 'selected' : '' }}>Sedentário</option>
                                    <option value="light" {{ $data['activity_level'] == 'light' ? 'selected' : '' }}>Leve</option>
                                    <option value="moderate" {{ $data['activity_level'] == 'moderate' ? 'selected' : '' }}>Moderado</option>
                                    <option value="active" {{ $data['activity_level'] == 'active' ? 'selected' : '' }}>Ativo</option>
                                    <option value="extra_active" {{ $data['activity_level'] == 'extra_active' ? 'selected' : '' }}>Muito Ativo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fatores de Risco</label>
                                <div class="form-check">
                                    <input type="checkbox" name="tabagismo" value="1" 
                                           class="form-check-input" {{ $data['tabagismo'] ? 'checked' : '' }}>
                                    <label class="form-check-label">Tabagismo</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="alcoolismo" value="1" 
                                           class="form-check-input" {{ $data['alcoolismo'] ? 'checked' : '' }}>
                                    <label class="form-check-label">Alcoolismo</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="alimentacao_nao_saudavel" value="1" 
                                    class="form-check-input" {{ $data['alimentacao_nao_saudavel'] ? 'checked' : '' }}>
                                    <label class="form-check-label">Alimentação não saudável</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="estresse_cronico" value="1" 
                                           class="form-check-input" {{ $data['estresse_cronico'] ? 'checked' : '' }}>
                                    <label class="form-check-label">estresse_cronico</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="drogas_ilicitas" value="1" 
                                           class="form-check-input" {{ $data['drogas_ilicitas'] ? 'checked' : '' }}>
                                    <label class="form-check-label">drogas_ilicitas</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="insonia" value="1" 
                                           class="form-check-input" {{ $data['insonia'] ? 'checked' : '' }}>
                                    <label class="form-check-label">insonia</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>