<?php

namespace App\Controller;

use App\Registry\CalculatorRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CalculatorController extends AbstractController
{

  /**
     * @Route("/automaton/{model}/change/{amount}", name="calculator")
     */
  public function index(string $model, int $amount)
  {
    $registry = new CalculatorRegistry();
    $calculator = $registry->getCalculatorFor($model);
    try {
      return $this->json($calculator->getChange($amount));
    } catch (\Exception $e) {
      error_log($e->getMessage());
    }
  }
}

