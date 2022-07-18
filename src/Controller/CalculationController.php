<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/api", name="api_")
 */
class CalculationController extends AbstractController
{
    
    public $length_limit = 25;
    
    /**
     * @Route("/calculation", name="app_calculation")
     */
    public function index(): JsonResponse
    {
        return $this->json([
            'success' => true,
            'result' => 'Welcome to the calculator service'
        ]);
    }
    
    /*
     * Check for numeric value
     * */
    public function check_numbers($check): bool
    {
        return is_numeric($check);
    }
    
    /*
     * Check for number length
     * */
    public function check_length($num): bool
    {
        return strlen((string)$num) > $this->length_limit ? false : true;
    }
    
    /*
     * Basic validation rules
     * */
    public function check_rules($num1 = null, $num2 = null)
    {
        $validation = [];
        
        if ($num2 === null) {
            return [
                'success' => false,
                'result' => 'Error: Please provide two numbers',
            ];
        }
        
        $length = [];
        $length[] = $this->check_length($num1);
        $length[] = $this->check_length($num2);
        
        if (in_array(false, $length)) {
            return [
                'success' => false,
                'result' => 'Error: Please provide max 25 digits numbers',
            ];
        }
        
        $validation[] = $this->check_numbers($num1);
        $validation[] = $this->check_numbers($num2);
        
        if (in_array(false, $validation)) {
            return [
                'success' => false,
                'result' => 'Error: Please provide only numbers',
            ];
        }
    }
}
