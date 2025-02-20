@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Calculadora de Saúde</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('health.calculate') }}">
        @csrf
        
        <div class="form-group">
            <label for="weight">Peso (kg)</label>
            <input type="number" step="0.1" name="weight" id="weight" 
                value="{{ old('weight', $inputs['weight'] ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="height">Altura (cm)</label>
            <input type="number" name="height" id="height" 
                value="{{ old('height', $inputs['height'] ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="age">Idade</label>
            <input type="number" name="age" id="age" 
                value="{{ old('age', $inputs['age'] ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="gender">Gênero</label>
            <select name="gender" id="gender">
                <option value="male" {{ (old('gender', $inputs['gender'] ?? '') == 'male') ? 'selected' : '' }}>Masculino</option>
                <option value="female" {{ (old('gender', $inputs['gender'] ?? '') == 'female') ? 'selected' : '' }}>Feminino</option>
            </select>
        </div>

        <div class="form-group">
            <label for="activity_level">Nível de Atividade</label>
            <select name="activity_level" id="activity_level">
                <option value="sedentary" {{ (old('activity_level', $inputs['activity_level'] ?? '') == 'sedentary') ? 'selected' : '' }}>Sedentário</option>
                <option value="light" {{ (old('activity_level', $inputs['activity_level'] ?? '') == 'light') ? 'selected' : '' }}>Leve</option>
                <option value="moderate" {{ (old('activity_level', $inputs['activity_level'] ?? '') == 'moderate') ? 'selected' : '' }}>Moderado</option>
                <option value="active" {{ (old('activity_level', $inputs['activity_level'] ?? '') == 'active') ? 'selected' : '' }}>Ativo</option>
                <option value="very_active" {{ (old('activity_level', $inputs['activity_level'] ?? '') == 'very_active') ? 'selected' : '' }}>Muito Ativo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Calcular</button>
    </form>

    @if(isset($results))
        <div class="results mt-4">
            <h2>Resultados:</h2>
            <ul>
                <li>IMC: {{ $results['bmi'] }} ({{ $results['bmiCategory'] }})</li>
                <li>Consumo de água recomendado: {{ $results['waterIntake'] }} litros/dia</li>
                <li>Calorias diárias recomendadas: {{ $results['calories'] }} kcal</li>
                <li>Macronutrientes recomendados (em gramas):
                    <ul>
                        <li>Proteínas: {{ $results['macros']['protein'] }}g</li>
                        <li>Carboidratos: {{ $results['macros']['carbs'] }}g</li>
                        <li>Gorduras: {{ $results['macros']['fats'] }}g</li>
                    </ul>
                </li>
            </ul>
        </div>
    @endif
</div>
@endsection 