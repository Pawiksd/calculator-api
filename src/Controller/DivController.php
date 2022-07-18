<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api", name="api_")
 */
class DivController extends CalculationController
{
    /**
     * @Route("/calculation/div", name="div_calculation")
     */
    public function index(): JsonResponse
    {
        return $this->json([
            'success' => true,
            'result' => 'This is subtraction endpoint. Please provide two numbers'
        ]);
    }
    
    /**
     * @Route("/calculation/div/{num1}/{num2}", name="div_digits")
     */
    public function div(ManagerRegistry $doctrine, Request $request, $num1 = null, $num2 = null): JsonResponse
    {
        $validation = $this->check_rules($num1, $num2);
    
        if($validation['success']===false){
            return $this->json($validation);
        }
    
        if ($num2 == 0) {
            return $this->json([
                'success' => false,
                'result' => "Error: Second number can't be 0",
            ]);
        }
        
        return $this->json([
            'success' => true,
            'result' => $num1 / $num2,
        ]);
    }
}
