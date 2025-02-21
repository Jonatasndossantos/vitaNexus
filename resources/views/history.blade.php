<x-app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Histórico de Saúde</h5>
                        <a href="{{ route('home') }}" class="btn btn-primary">Novo Registro</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Peso</th>
                                        <th>Altura</th>
                                        <th>IMC</th>
                                        <th>Pressão</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($healthData as $data)
                                    <tr>
                                        <td>{{ $data['date'] }}</td>
                                        <td>{{ $data['weight'] }} kg</td>
                                        <td>{{ $data['height'] }} cm</td>
                                        <td>{{ $data['bmi'] }}</td>
                                        <td>{{ $data['sistolica'] }}/{{ $data['diastolica'] }}</td>
                                        <td>
                                            <span class="badge bg-{{ $data['bmiCategory']['color'] }}">
                                                {{ $data['bmiCategory']['category'] }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>