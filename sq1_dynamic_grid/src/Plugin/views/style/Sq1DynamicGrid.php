<?php

namespace Drupal\sq1_dynamic_grid\Plugin\views\style;

use Drupal\core\form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 * Style plugin to render a dynamic grid.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "sq1_dynamic_grid",
 *   title = @Translation("SQ1 Dynamic Grid"),
 *   help = @Translation("Render content into a dynamic grid."),
 *   theme = "views_view_sq1_dynamic_grid",
 *   display_types = { "normal" }
 * )
 */
class Sq1DynamicGrid extends StylePluginBase {

  protected $usesRowPlugin = TRUE;

  protected function defineOptions() {
    $options = parent::defineOptions();

    $options['default_column_count'] = ['default' => '6'];
    $options['responsive'][1]['active'] = ['default' => ''];
    $options['responsive'][1]['min'] = ['default' => ''];
    $options['responsive'][1]['max'] = ['default' => ''];
    $options['responsive'][2]['active'] = ['default' => ''];
    $options['responsive'][2]['min'] = ['default' => ''];
    $options['responsive'][2]['max'] = ['default' => ''];
    $options['responsive'][3]['active'] = ['default' => ''];
    $options['responsive'][3]['min'] = ['default' => ''];
    $options['responsive'][3]['max'] = ['default' => ''];
    $options['responsive'][4]['active'] = ['default' => ''];
    $options['responsive'][4]['min'] = ['default' => ''];
    $options['responsive'][4]['max'] = ['default' => ''];
    $options['responsive'][5]['active'] = ['default' => ''];
    $options['responsive'][5]['min'] = ['default' => ''];
    $options['responsive'][5]['max'] = ['default' => ''];
    $options['responsive'][6]['active'] = ['default' => ''];
    $options['responsive'][6]['min'] = ['default' => ''];
    $options['responsive'][6]['max'] = ['default' => ''];

    return $options;
  }

  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    $form['default_column_count'] = [
      '#type' => 'number',
      '#title' => $this->t('Columns'),
      '#description' => $this->t('The number of columns displayed if no responsive conditions are met.'),
      '#default_value' => $this->options['default_column_count'],
      '#required' => TRUE,
      '#min' => '1',
      '#max' => '6',
    ];

    $form['responsive'] = [
      '#type' => 'details',
      '#title' => $this->t('Responsive columns'),
      '#open' => TRUE,
    ];

    $form['responsive'][1] = [
      '#type' => 'fieldset',
      '#title' => $this->t('1 column'),
      '#open' => TRUE,
    ];

    $form['responsive'][1]['active'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Active'),
      '#default_value' => $this->options['responsive'][1]['active'],
    ];

    $form['responsive'][1]['min'] = [
      '#type' => 'number',
      '#title' => $this->t('Minimum screen size'),
      '#min' => 0,
      '#max' => 5000,
      '#default_value' => $this->options['responsive'][1]['min'],
    ];

    $form['responsive'][1]['max'] = [
      '#type' => 'number',
      '#title' => $this->t('Max screen size'),
      '#min' => 0,
      '#max' => 5000,
      '#default_value' => $this->options['responsive'][1]['max'],
    ];

    $form['responsive'][2] = [
      '#type' => 'fieldset',
      '#title' => $this->t('2 columns'),
      '#open' => TRUE,
    ];

    $form['responsive'][2]['active'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Active'),
      '#default_value' => $this->options['responsive'][2]['active'],
    ];

    $form['responsive'][2]['min'] = [
      '#type' => 'number',
      '#title' => $this->t('Minimum screen size'),
      '#min' => 0,
      '#max' => 5000,
      '#default_value' => $this->options['responsive'][2]['min'],
    ];

    $form['responsive'][2]['max'] = [
      '#type' => 'number',
      '#title' => $this->t('Max screen size'),
      '#min' => 0,
      '#max' => 5000,
      '#default_value' => $this->options['responsive'][2]['max'],
    ];

    $form['responsive'][3] = [
      '#type' => 'fieldset',
      '#title' => $this->t('3 columns'),
      '#open' => TRUE,
    ];

    $form['responsive'][3]['active'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Active'),
      '#default_value' => $this->options['responsive'][3]['active'],
    ];

    $form['responsive'][3]['min'] = [
      '#type' => 'number',
      '#title' => $this->t('Minimum screen size'),
      '#min' => 0,
      '#max' => 5000,
      '#default_value' => $this->options['responsive'][3]['min'],
    ];

    $form['responsive'][3]['max'] = [
      '#type' => 'number',
      '#title' => $this->t('Max screen size'),
      '#min' => 0,
      '#max' => 5000,
      '#default_value' => $this->options['responsive'][3]['max'],
    ];

    $form['responsive'][4] = [
      '#type' => 'fieldset',
      '#title' => $this->t('4 columns'),
      '#open' => TRUE,
    ];

    $form['responsive'][4]['active'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Active'),
      '#default_value' => $this->options['responsive'][4]['active'],
    ];

    $form['responsive'][4]['min'] = [
      '#type' => 'number',
      '#title' => $this->t('Minimum screen size'),
      '#min' => 0,
      '#max' => 5000,
      '#default_value' => $this->options['responsive'][4]['min'],
    ];

    $form['responsive'][4]['max'] = [
      '#type' => 'number',
      '#title' => $this->t('Max screen size'),
      '#min' => 0,
      '#max' => 5000,
      '#default_value' => $this->options['responsive'][4]['max'],
    ];

    $form['responsive'][5] = [
      '#type' => 'fieldset',
      '#title' => $this->t('5 columns'),
      '#open' => TRUE,
    ];

    $form['responsive'][5]['active'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Active'),
      '#default_value' => $this->options['responsive'][5]['active'],
    ];

    $form['responsive'][5]['min'] = [
      '#type' => 'number',
      '#title' => $this->t('Minimum screen size'),
      '#min' => 0,
      '#max' => 5000,
      '#default_value' => $this->options['responsive'][5]['min'],
    ];

    $form['responsive'][5]['max'] = [
      '#type' => 'number',
      '#title' => $this->t('Max screen size'),
      '#min' => 0,
      '#max' => 5000,
      '#default_value' => $this->options['responsive'][5]['max'],
    ];

    $form['responsive'][6] = [
      '#type' => 'fieldset',
      '#title' => $this->t('6 columns'),
      '#open' => TRUE,
    ];

    $form['responsive'][6]['active'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Active'),
      '#default_value' => $this->options['responsive'][6]['active'],
    ];

    $form['responsive'][6]['min'] = [
      '#type' => 'number',
      '#title' => $this->t('Minimum screen size'),
      '#min' => 0,
      '#max' => 5000,
      '#default_value' => $this->options['responsive'][6]['min'],
    ];

    $form['responsive'][6]['max'] = [
      '#type' => 'number',
      '#title' => $this->t('Max screen size'),
      '#min' => 0,
      '#max' => 5000,
      '#default_value' => $this->options['responsive'][6]['max'],
    ];

  }

}
