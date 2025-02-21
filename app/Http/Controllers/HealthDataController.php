<?php

namespace App\Http\Controllers;

use App\Models\HealthData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\HealthCalculatorController;

class HealthDataController extends Controller
{
    public function index()
    {
        $healthData = auth()->user()->healthData()->latest()->get();
        return view('home', compact('healthData'));
    }

    use HealthCalculatorController;

    public function store(Request $request)
    {
        try {
            // Validação dos dados
            $validator = Validator::make($request->all(), [
                'weight' => 'required|numeric|min:30|max:300',
                'height' => 'required|numeric|min:100|max:250',
                'age' => 'required|numeric|min:1|max:120',
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
            $healthData->tabagismo = $request->has('tabagismo');
            $healthData->alcoolismo = $request->has('alcoolismo');
            $healthData->alimentacao_nao_saudavel = $request->has('alimentacao_nao_saudavel');
            $healthData->estresse_cronico = $request->has('estresse_cronico');
            $healthData->drogas_ilicitas = $request->has('drogas_ilicitas');
            $healthData->insonia = $request->has('insonia');
            $healthData->save();

            // Calcular resultados
            $bmi = $this->calculateBMI($request->weight, $request->height);
            $waterIntake = $this->calculateWaterIntake($request->weight);
            $calories = $this->calculateCalories($request->all());

            return response()->json([
                'success' => true,
                'bmi' => round($bmi, 1),
                'bmiCategory' => $this->getBMICategory($bmi),
                'waterIntake' => round($waterIntake, 1),
                'calories' => round($calories),
                'macros' => [
                    'protein' => [
                        'min' => round($calories * 0.25 / 4),
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
                ]
            ]);

    } catch (\Exception $e) {
        \Log::error('Erro ao salvar dados:', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return redirect()->back()
            ->withInput()
            ->withErrors(['error' => 'Erro ao salvar os dados: ' . $e->getMessage()]);
    }
    }

    private function calculateIMC($weight, $height)
    {
        $heightInMeters = $height / 100;
        return round($weight / ($heightInMeters * $heightInMeters), 2);
    }

    public function show($id)
    {
        $healthData = HealthData::findOrFail($id);
        return view('health.show', compact('healthData'));
    }

    public function destroy($id)
    {
        $healthData = HealthData::findOrFail($id);
        $healthData->delete();
        return redirect()->route('home')->with('success', 'Registro excluído com sucesso!');
    }

    public function history()
    {
        $healthData = auth()->user()->healthData()
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function($data) {
                $bmi = $this->calculateBMI($data->weight, $data->height);
                return [
                    'id' => $data->id,
                    'date' => $data->created_at->format('d/m/Y'),
                    'weight' => $data->weight,
                    'height' => $data->height,
                    'bmi' => round($bmi, 1),
                    'bmiCategory' => $this->getBMICategory($bmi),
                    'sistolica' => $data->sistolica,
                    'diastolica' => $data->diastolica,
                    'age' => $data->age,
                    'gender' => $data->gender,
                    'activity_level' => $data->activity_level,
                    // Adicione outros campos conforme necessário
                ];
            });

        return view('health.history', compact('healthData'));
    }
}