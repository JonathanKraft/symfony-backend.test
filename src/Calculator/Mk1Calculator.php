<?php

namespace App\Calculator;

use App\Calculator\CalculatorInterface;
use App\Model\Change;

class Mk1Calculator implements CalculatorInterface
{

  public function getSupportedModel(): string
  { 
    return "mk1";
  }

  public function getChange(int $amount): ?Change
   {
      $change = new Change();
      $change->coin1 = $amount;
      return $change;
   }
}
