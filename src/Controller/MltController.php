<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api", name="api_")
 */
class MltController extends CalculationController
{
    /**
     * @Route("/calculation/mlt", name="mlt_calculation")
     */
    public function index(): JsonResponse
    {
        return $this->json([
            'success' => true,
            'result' => 'This is multiplication endpoint. Please provide two numbers'
        ]);
    }
    
    /**
     * @Route("/calculation/mlt/{num1}/{num2}", name="mlt_digits")
     */
    public function mlt(ManagerRegistry $doctrine, Request $request, $num1 = null, $num2 = null): JsonResponse
    {
        $validation = $this->check_rules($num1, $num2);
    
        if($validation['success']===false){
            return $this->json($validation);
        }
    
        return $this->json([
            'success' => true,
            'result' => $num1 * $num2,
        ]);
    }
}
