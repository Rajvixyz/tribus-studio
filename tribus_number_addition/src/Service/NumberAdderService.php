<?php

namespace Drupal\tribus_number_addition\Service;

/**
 * NumberAdderService service uses for addition of number.
 */
class NumberAdderService {

  /**
   * Return sum of two numbers.
   *
   * @param int $number1
   *   The integer number1.
   * @param int $number2
   *   The integer number2.
   *
   * @return int
   *   Returns sum of two numbers.
   */
  public function getInputNumbersSum($number1, $number2) {
    return $number1 + $number2;
  }

}
