<?php

namespace Drupal\tribus_number_addition\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\tribus_number_addition\Service\StringFormatterService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * NumberAdditionController controller uses to show number addition string.
 */
class NumberAdditionController extends ControllerBase {

  /**
   * The string formatter service.
   *
   * @var \Drupal\tribus_number_addition\Service\StringFormatterService
   */
  protected $stringFormatterService;

  /**
   * Constructor for Number Addition Controller.
   *
   * @param \Drupal\tribus_number_addition\Service\StringFormatterService $string_formatter_service
   *   The string formatter service.
   */
  public function __construct(StringFormatterService $string_formatter_service) {
    $this->stringFormatterService = $string_formatter_service;
  }

  /**
   * {@inheritdoc}
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The Drupal service container.
   *
   * @return static
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('tribus_number_addition.string_formatter')
    );
  }

  /**
   * Show sum of two numbers string.
   */
  public function showFormattedString() {
    $formatted_string = $this->stringFormatterService->formtAdditionNumberString();
    return [
      '#theme' => 'numbers_sum_text',
      '#formatted_string' => $formatted_string,
    ];
  }

}
