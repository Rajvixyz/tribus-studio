<?php

namespace Drupal\tribus_number_addition\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Input number settings to take input numbers for addition.
 */
class InputNumberSettingsForm extends ConfigFormBase {

  /**
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'input_numbers.settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'input_numbers_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::SETTINGS);

    $form['input_number1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Number1'),
      '#attributes' => [
        ' type' => 'number',
      ],
      '#required' => TRUE,
      '#default_value' => $config->get('input_number1'),
    ];

    $form['input_number2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Number2'),
      '#attributes' => [
        ' type' => 'number',
      ],
      '#required' => TRUE,
      '#default_value' => $config->get('input_number2'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration.
    $this->config(static::SETTINGS)
      // Set the submitted configuration setting.
      ->set('input_number1', $form_state->getValue('input_number1'))
      ->set('input_number2', $form_state->getValue('input_number2'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
