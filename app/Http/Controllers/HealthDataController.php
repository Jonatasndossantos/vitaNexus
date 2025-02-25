<?php

namespace App\Http\Controllers;

use App\Models\HealthData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HealthDataController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $lastHealthData = $user->healthData()->latest()->first(); // pega o proximo dado de saúde do usuário pelo usuario
        
        // Pega o parâmetro da URL ou usa false como padrão
        $showForm = $request->query('form', false); //resultado la no home

        if ($lastHealthData) {
            // Calcular todos os dados necessários
            $bmi = $this->calculateIMC($lastHealthData->weight, $lastHealthData->height);
            $waterIntake = $this->calculateWaterIntake($lastHealthData->weight);
            $calories = $this->calculateCalories($lastHealthData->toArray());

            // Adicionar propriedades calculadas ao objeto
            $lastHealthData->bmi = round($bmi, 1);
            $lastHealthData->bmiCategory = $this->getBMICategory($bmi);
            $lastHealthData->bmiClass = $this->getBMIClass($bmi);
            $lastHealthData->waterIntake = round($waterIntake, 1);
            $lastHealthData->calories = round($calories);
            $lastHealthData->macros = [
                'protein' => [
                    'min' => round($calories * 0.10 / 4), // 10% do total calórico dividido por 4 kcal/g
                    'max' => round($calories * 0.35 / 4)
                ],
                'carbs' => [
                    'min' => round($calories * 0.45 / 4),
                    'max' => round($calories * 0.65 / 4)
                ],
                'fats' => [
                    'min' => round($calories * 0.20 / 9),
                    'max' => round($calories * 0.35 / 9)
                    ]
                ];
            }
            
            return view('home', compact('lastHealthData', 'showForm'));
        }
        
    public function show($id)
    {
        $healthData = HealthData::findOrFail($id);
        return view('health.show', compact('healthData'));
    }
    
    public function destroy($id)
    {
        $healthData = auth()->user()->healthData()->findOrFail($id);
        $healthData->delete();

        return redirect()->route('history')->with('success', 'Registro excluído com sucesso!');
    }
    public function store(Request $request)
    {
        try {
            // Validação dos dados
            $validator = Validator::make($request->all(), [
                'weight' => 'required|numeric|min:10|max:300',
                'height' => 'required|numeric|min:10|max:400',
                'age' => 'required|numeric|min:1|max:150',
                'gender' => 'required|in:male,female',
                'sistolica' => 'required|numeric|min:1|max:200',
                'diastolica' => 'required|numeric|min:1|max:160',
                'activity_level' => 'required|in:sedentary,light,moderate,active,extra_active'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'Dados inválidos',
                    'messages' => $validator->errors()
                ], 422);
            }

            // Salvar dados
            $healthData = new HealthData();
            $healthData->user_id = auth()->id();

            $healthData->weight = $request->weight;
            $healthData->height = $request->height;
            $healthData->age = $request->age;
            $healthData->gender = $request->gender;
            $healthData->sistolica = $request->sistolica;
            $healthData->diastolica = $request->diastolica;
            $healthData->activity_level = $request->activity_level;

            $healthData->tabagismo = $request->has('tabagismo'); //Se o checkbox não estiver marcado, o campo não será enviado na requisição, e o método has retornará false.
            $healthData->alcoolismo = $request->has('alcoolismo');
            $healthData->alimentacao_nao_saudavel = $request->has('alimentacao_nao_saudavel');
            $healthData->estresse_cronico = $request->has('estresse_cronico');
            $healthData->drogas_ilicitas = $request->has('drogas_ilicitas');
            $healthData->insonia = $request->has('insonia');
            $healthData->save();

            // Calcular resultados
            $bmi = $this->calculateIMC($request->weight, $request->height);
            $waterIntake = $this->calculateWaterIntake($request->weight);
            $calories = $this->calculateCalories($request->all());

            return redirect()->route('home')->with('success', 'Dados salvos com sucesso!');

        } catch (\Exception $e) {
            \Log::error('Erro ao salvar dados:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Erro ao salvar os dados: ' . $e->getMessage()]);
        }
    }//Fim store

    
    private function calculateWaterIntake($weight)
    {
        // Cálculo básico: 35ml por kg de peso corporal
        return $weight * 35/1000;
    }

    private function calculateCalories($data)
    {
        // Fórmula de Harris-Benedict revisada
        $bmr = 0; // Taxa Metabólica Basal

        if ($data['gender'] === 'male') {
            $bmr = 88.362 + (13.397 * $data['weight']) + (4.799 * $data['height']) - (5.677 * $data['age']);
        } else {
            $bmr = 447.593 + (9.247 * $data['weight']) + (3.098 * $data['height']) - (4.330 * $data['age']);
        }
        
        // Multiplicador baseado no nível de atividade
        $activityMultipliers = [
            'sedentary' => 1.2,      // Pouco ou nenhum exercício
            'light' => 1.375,        // Exercício leve 1-3 dias/semana
            'moderate' => 1.55,      // Exercício moderado 3-5 dias/semana
            'active' => 1.725,       // Exercício pesado 6-7 dias/semana
            'extra_active' => 1.9    // Exercício muito pesado, trabalho físico
        ];

        return $bmr * $activityMultipliers[$data['activity_level']];
    }


    // ---------IMC--------  https://www.mdsaude.com/endocrinologia/calculadora-imc
    private function calculateIMC($weight, $height)
    {
        $heightInMeters = $height / 100;
        return round($weight / ($heightInMeters * $heightInMeters), 2);
    }

    private function getBMICategory($bmi)
    {
        if ($bmi < 15.9) return 'Extremamente abaixo do peso';
        if ($bmi < 16.9) return 'Muito abaixo do peso';
        if ($bmi < 18.5) return 'Abaixo do peso';
        if ($bmi < 24.9) return 'Peso normal';
        if ($bmi < 29.9) return 'Sobrepeso';
        if ($bmi < 34.9) return 'Obesidade Grau I';
        if ($bmi < 39.9) return 'Obesidade Grau II';
        return 'Obesidade Grau III';
    }
    
    private function getBMIClass($bmi) {
        if ($bmi < 16.9) return 'danger';
        if ($bmi < 18.5) return 'warning';
        if ($bmi < 24.9) return 'success';
        if ($bmi < 29.9) return 'warning';
        return 'danger';
    }


    
    private function getPressureClass($sistolica, $diastolica) {
        
        if ($sistolica < 90 || $diastolica < 50) return 'danger'; // Hipotensão perigosa
        if ($sistolica < 120 && $diastolica < 80) return 'success'; // Pressão ótima
        if ($sistolica < 130 && $diastolica < 85) return 'info'; // Normal
        if ($sistolica < 140 && $diastolica < 90) return 'warning'; // Normal-alta
        if ($sistolica < 160 && $diastolica < 100) return 'danger'; // Hipertensão Grau 1
        if ($sistolica < 180 && $diastolica < 110) return 'danger'; // Hipertensão Grau 2
        return 'danger';
    }
    
    private function getHealthStatus($data) {
        $risks = 0;
        $risks += isset($data['tabagismo']) && $data['tabagismo'] ? 1 : 0;
        $risks += isset($data['alcoolismo']) && $data['alcoolismo'] ? 1 : 0;
        $risks += isset($data['alimentacao_nao_saudavel']) && $data['alimentacao_nao_saudavel'] ? 1 : 0;
        $risks += isset($data['estresse_cronico']) && $data['estresse_cronico'] ? 1 : 0;
        $risks += isset($data['drogas_ilicitas']) && $data['drogas_ilicitas'] ? 1 : 0;
        $risks += isset($data['insonia']) && $data['insonia'] ? 1 : 0;
    
        if ($risks == 0) {
            return '<i class="bi bi-emoji-smile text-success" data-bs-toggle="tooltip" title="Ótimo estado de saúde"></i>';
        } elseif ($risks == 1) {
            return '<i class="bi bi-emoji-neutral text-warning" data-bs-toggle="tooltip" title="Alguns pontos de atenção"></i>';
        } else {
            return '<i class="bi bi-emoji-frown text-danger" data-bs-toggle="tooltip" title="Necessita cuidados"></i>';
        }
    }

    public function history(Request $request)
    {
        $query = auth()->user()->healthData()->orderBy('created_at', 'desc');

        // Aplicar busca
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('weight', 'LIKE', "%{$search}%")
                  ->orWhere('height', 'LIKE', "%{$search}%")
                  ->orWhere('create_at', 'LIKE', "%{$search}%")
                  ->orWhere('sistolica', 'LIKE', "%{$search}%")
                  ->orWhere('diastolica', 'LIKE', "%{$search}%");
            });
        }

        // Aplicar filtros de data
        if ($request->filled('date_start')) {
            $query->whereDate('created_at', '>=', $request->date_start);
        }
        if ($request->filled('date_end')) {
            $query->whereDate('created_at', '<=', $request->date_end);
        }

        // Aplicar filtro de IMC
        if ($request->filled('bmi_category')) {
            $query->where(function($q) use ($request) {
                switch($request->bmi_category) {
                    case 'abaixo':
                        $q->whereRaw('(weight / POWER(height/100, 2)) < 18.5');
                        break;
                    case 'normal':
                        $q->whereRaw('(weight / POWER(height/100, 2)) BETWEEN 18.5 AND 24.9');
                        break;
                    case 'sobrepeso':
                        $q->whereRaw('(weight / POWER(height/100, 2)) BETWEEN 25 AND 29.9');
                        break;
                    case 'obesidade':
                        $q->whereRaw('(weight / POWER(height/100, 2)) >= 30');
                        break;
                }
            });
        }

        // Filtro de Pressão Arterial
        if ($request->filled('pressure_category')) {
            switch($request->pressure_category) {
                case 'normal':
                    $query->where('sistolica', '<', 120)
                          ->where('diastolica', '<', 80);
                    break;
                case 'elevated':
                    $query->where('sistolica', '>=', 120)
                          ->where('sistolica', '<', 130)
                          ->where('diastolica', '<', 80);
                    break;
                case 'high':
                    $query->where(function($q) {
                        $q->where('sistolica', '>=', 130)
                          ->orWhere('diastolica', '>=', 80);
                    });
                    break;
            }
        }

        // Filtro de Fatores de Risco
        if ($request->filled('risk_factors')) {
            foreach ($request->risk_factors as $factor) {
                $query->where($factor, true);
            }
        }

        $healthData = $query->get()->map(function($data) {
            $bmi = $this->calculateIMC($data->weight, $data->height);
            return [
                'id' => $data->id,
                'date' => $data->created_at->format('d/m/Y'),
                'weight' => $data->weight,
                'height' => $data->height,
                'bmi' => round($bmi, 1),
                'bmiCategory' => $this->getBMICategory($bmi),
                'bmiClass' => $this->getBMIClass($bmi),
                'sistolica' => $data->sistolica,
                'diastolica' => $data->diastolica,
                'pressureClass' => $this->getPressureClass($data->sistolica, $data->diastolica),
                'healthStatus' => $this->getHealthStatus($data),
                'activity_level' => $data->activity_level,
                'tabagismo' => $data->tabagismo,
                'alcoolismo' => $data->alcoolismo,
                'alimentacao_nao_saudavel' => $data->alimentacao_nao_saudavel,
                'estresse_cronico' => $data->estresse_cronico,
                'drogas_ilicitas' => $data->drogas_ilicitas,
                'insonia' => $data->insonia,
            ];
        });

        return view('history', compact('healthData'));
    }

    public function edit($id)
    {
        $healthData = auth()->user()->healthData()->findOrFail($id);
        return view('edit', compact('healthData'));
    }

    public function update(Request $request, $id)
    {
        $healthData = auth()->user()->healthData()->findOrFail($id);
        
        $validated = $request->validate([
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'sistolica' => 'required|numeric|min:0',
            'diastolica' => 'required|numeric|min:0',
            'activity_level' => 'required|string',
            'tabagismo' => 'nullable|boolean',
            'alcoolismo' => 'nullable|boolean',
            'alimentacao_nao_saudavel' => 'nullable|boolean',
            'estresse_cronico' => 'nullable|boolean',
            'drogas_ilicitas' => 'nullable|boolean',
            'insonia' => 'nullable|boolean',
        ]);

        // Tratar checkboxes não marcados
        $validated['tabagismo'] = $request->has('tabagismo');
        $validated['alcoolismo'] = $request->has('alcoolismo');
        $validated['alimentacao_nao_saudavel'] = $request->has('alimentacao_nao_saudavel');

        $healthData->update($validated);

        return redirect()->route('history')
            ->with('success', 'Registro atualizado com sucesso!');
    }//FIm history
}//Fim class