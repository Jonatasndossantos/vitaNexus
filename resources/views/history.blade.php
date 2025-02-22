<x-app-layout>
    <div class="container py-5">
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
                <div class="card border-success shadow-sm">
                    <div class="card-header bg-success bg-opacity-10 border-success">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-text border-success">
                                        <i class="bi bi-search text-success"></i>
                                    </span>
                                    <input type="text" id="searchTable" class="form-control border-success" placeholder="Buscar registros...">
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="btn-group">
                                    <button class="btn btn-outline-success">
                                        <i class="bi bi-funnel me-1"></i>Filtrar
                                    </button>
                                    <button class="btn btn-outline-success">
                                        <i class="bi bi-download me-1"></i>Exportar
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
                                        <th>Altura</th>
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
                                            <td>{{ $data['height'] }} cm</td>
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
                                                <div class="btn-group">
                                                    <a href="{{ route('health.show', $data['id']) }}" 
                                                       class="btn btn-sm btn-outline-success"
                                                       data-bs-toggle="tooltip"
                                                       title="Ver detalhes">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <form action="{{ route('health.destroy', $data['id']) }}" 
                                                          method="POST" 
                                                          class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-outline-danger"
                                                                data-bs-toggle="tooltip"
                                                                title="Excluir registro"
                                                                onclick="return confirm('Tem certeza que deseja excluir este registro?')">
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
    @if(session('success'))
                    <div class="alert alert-success mt-4">
                        {{ session('success') }}
                        @if(session('imc'))
                            <br>Seu IMC é: {{ session('imc') }}
                        @endif
                    </div>
                @endif

    

    @push('scripts')
    <script>
        // Ativar tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        // Busca na tabela
        document.getElementById('searchTable').addEventListener('keyup', function() {
            var searchText = this.value.toLowerCase();
            var table = document.querySelector('table');
            var rows = table.getElementsByTagName('tr');

            for (var i = 1; i < rows.length; i++) {
                var showRow = false;
                var cells = rows[i].getElementsByTagName('td');
                
                for (var j = 0; j < cells.length; j++) {
                    if (cells[j].textContent.toLowerCase().indexOf(searchText) > -1) {
                        showRow = true;
                        break;
                    }
                }
                
                rows[i].style.display = showRow ? '' : 'none';
            }
        });
    </script>
    @endpush

    @push('styles')
    <style>
        .table > :not(caption) > * > * {
            padding: 1rem 0.5rem;
        }
        .badge {
            padding: 0.5em 0.8em;
        }
        .btn-group .btn {
            padding: 0.25rem 0.5rem;
        }
    </style>
    @endpush
</x-app-layout>