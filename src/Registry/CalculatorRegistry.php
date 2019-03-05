<?php

namespace App\Registry;

use App\Registry\CalculatorRegistryInterface;
use App\Calculator\CalculatorInterface;
use App\Calculator\Mk2Calculator;
use App\Calculator\Mk1Calculator;

class CalculatorRegistry implements CalculatorRegistryInterface
{
  public function getCalculatorFor(string $model): ?CalculatorInterface
  {
  
    if ($model !== "mk1" && $model !== "mk2") {
      return null;
    }
    return ($model === "mk1")? new Mk1Calculator(): new Mk2Calculator();
  }
  
}

// public function getCalculatorFor(string $model): ? CalculatorInterface
// {
//   $className = 'App\\calculator\\' . ucfirst($model) . 'Calculator';

//   if (!class_exists($className)) {
//     return null;
//   }
//   if (!className instanceof CalculatorInterface ){
//     return null;
//   }
//   return new $className;
// }
