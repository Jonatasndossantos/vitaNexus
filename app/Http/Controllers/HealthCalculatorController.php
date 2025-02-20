<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HealthCalculatorController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function calculate(Request $request)
    {
        try {
            //Validação dos Dados
            $validator = Validator::make($request->all(), [
                'weight' => 'required|numeric|min:30|max:300',
                'height' => 'required|numeric|min:100|max:250',
                'age' => 'required|numeric|min:1|max:120',
                'gender' => 'required|in:male,female',
                'activityLevel' => 'required|in:sedentary,light,moderate,active,extra_active'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'Dados inválidos',
                    'messages' => $validator->errors()
                ], 422);
            }

            //Cálculos de Saúde
            $validated = $validator->validated();

            $bmi = $this->calculateBMI($validated['weight'], $validated['height']);
            $waterIntake = $this->calculateWaterIntake($validated['weight']);
            $calories = $this->calculateCalories($validated);

            // Salvar os dados no banco de dados
            modelSaude::create([
                'weight' => $validated['weight'],
                'height' => $validated['height'],
                'age' => $validated['age'],
                'gender' => $validated['gender'],
                'activityLevel' => $validated['activityLevel'],
                'bmi' => round($bmi, 1),
                'bmiCategory' => $this->getBMICategory($bmi)['category'],
                'waterIntake' => round($waterIntake, 1),
                'calories' => round($calories),
                'macros' => json_encode([
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
                ])
            ]);


            //Retorno dos Resultados
            return response()->json([
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
            Log::error('Erro no cálculo de saúde: ' . $e->getMessage());
            return response()->json([
                'error' => 'Erro ao processar os dados',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    private function calculateBMI($weight, $height)
    {
        $heightInMeters = $height / 100;
        return $weight / ($heightInMeters * $heightInMeters);
    }

    private function calculateWaterIntake($weight)
    {
        return $weight * 0.035;
    }

    private function calculateCalories($data)
    {
        // Base Metabolic Rate (BMR) using Mifflin-St Jeor Equation
        if ($data['gender'] === 'male') {
            $bmr = 10 * $data['weight'] + 6.25 * $data['height'] - 5 * $data['age'] + 5;
        } else {
            $bmr = 10 * $data['weight'] + 6.25 * $data['height'] - 5 * $data['age'] - 161;
        }

        $activityMultipliers = [
            'sedentary' => 1.2,
            'light' => 1.375,
            'moderate' => 1.55,
            'active' => 1.725,
            'extra_active' => 1.9
        ];

        return $bmr * $activityMultipliers[$data['activityLevel']];
    }

    private function getBMICategory($bmi)
    {
        if ($bmi < 18.5) return ['category' => 'Abaixo do peso', 'color' => 'warning'];
        if ($bmi < 25) return ['category' => 'Peso normal', 'color' => 'success'];
        if ($bmi < 30) return ['category' => 'Sobrepeso', 'color' => 'warning'];
        return ['category' => 'Obesidade', 'color' => 'danger'];
    }
} 