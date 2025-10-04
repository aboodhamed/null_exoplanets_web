<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExoController extends Controller
{
 
    // صفحة التصنيف (عرض الـ Form)
    public function classify()
    {
        return view('components.classify.index');
    }

    // معالجة الـ Form في التصنيف (مع dummy predictions)
    public function classifyPost(Request $request)
    {
        // Dummy data للتصنيف (كأن النموذج اشتغل)
// Dummy data for classification (simulating model output)
$predictions = [
    [
        'input' => 'Orbital Period: 365.25 days, Transit Duration: 2.5 hours, Transit Depth: 0.01, SNR: 15.2',
        'result' => 'Confirmed',
        'probability' => 0.92
    ],
    [
        'input' => 'Orbital Period: 87.0 days, Transit Duration: 1.8 hours, Transit Depth: 0.005, SNR: 8.7',
        'result' => 'Candidate',
        'probability' => 0.75
    ],
    [
        'input' => 'Orbital Period: 120.5 days, Transit Duration: 3.2 hours, Transit Depth: 0.02, SNR: 4.1',
        'result' => 'False Positive',
        'probability' => 0.15
    ]
];

        return view('components.classify.index', compact('predictions'));
    }

    // صفحة أداء النموذج (مع dummy metrics)
    public function performance()
    {
        // Dummy metrics
        $metrics = [
            'accuracy' => 92.5,
            'precision' => 90.2,
            'recall' => 88.7,
            'f1_score' => 89.4
        ];

        // Dummy confusion matrix data
        $confusionMatrix = [
            'confirmed' => [120, 5, 2],
            'candidate' => [8, 95, 10],
            'false_positive' => [3, 7, 110]
        ];

        return view('components.performance.index', compact('metrics', 'confusionMatrix'));
    }


 
}