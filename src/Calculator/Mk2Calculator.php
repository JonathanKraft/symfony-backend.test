<?php

namespace App\Calculator;

use App\Calculator\CalculatorInterface;
use App\Model\Change;

class Mk2Calculator implements CalculatorInterface
{

  public function getSupportedModel(): string
  {
    return "mk2";
  }

  public function getChange(int $amount): ? Change
  {
    if ($amount === 1 || $amount === 3) {
      return null;
    }
    $values = [10, 5, 2, 1];
    $change = new Change();

    if ($amount % 2 !== 0) {
      $amount -= 5;
      $change->bill5 += 1;
    }
    $change->bill10 = intval($amount / 10);
    $amount -= $change->bill10 * 10;
    $change->coin2 = intval($amount / 2);
    $amount -= $change->coin2 * 2;

    return $change;

    // foreach ($values as $key => $value) {
    //   $operation = ($amount - $amount % $value) / $value;
    //   if ($value >= 5) {
    //     $change->bill{$value} = $operation;
    //   } else {
    //     $change->coin{$value} = $operation;
    //   }
    //   $amount -= $value * $operation;
    // }

    // return $change;
  }
}
