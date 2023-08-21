<?php

namespace Drupal\tribus_number_addition\Service;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * StringFormatter service uses for formatting string of number addition.
 */
class StringFormatterService {

  use StringTranslationTrait;

  /**
   * The configuration factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The number adder service.
   *
   * @var \Drupal\tribus_number_addition\Service\NumberAdderService
   */
  protected $numberAdderService;

  /**
   * Constructor for String Formatter helper.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The configuration factory.
   * @param \Drupal\tribus_number_addition\Service\NumberAdderService $number_adder_service
   *   The number adder service.
   */
  public function __construct(ConfigFactoryInterface $config_factory, NumberAdderService $number_adder_service) {
    $this->configFactory = $config_factory;
    $this->numberAdderService = $number_adder_service;
  }

  /**
   * Return sum of two numbers.
   *
   * @return string
   *   Returns text for sum of two numbers.
   */
  public function formtAdditionNumberString() {
    $number1 = $this->configFactory->get('input_numbers.settings')->get('input_number1');
    $number2 = $this->configFactory->get('input_numbers.settings')->get('input_number2');

    $number_addition = $this->numberAdderService->getInputNumbersSum($number1, $number2);
    $number_addition_text = $this->t("The product of @number1 and @number2 is @number_addition.", [
      '@number1' => $number1,
      '@number2' => $number2,
      '@number_addition' => $number_addition,
    ]);
    return $number_addition_text;
  }

}
