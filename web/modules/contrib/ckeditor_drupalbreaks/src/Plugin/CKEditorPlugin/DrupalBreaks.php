<?php

namespace Drupal\ckeditor_drupalbreaks\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "drupalbreaks" plugin.
 *
 * @CKEditorPlugin(
 *   id = "drupalbreaks",
 *   label = @Translation("Drupal breaks")
 * )
 */
class DrupalBreaks extends CKEditorPluginBase {

  /**
   * {@inheritdoc}
   */
  public function getButtons() {
    return [
      'DrupalBreak' => [
        'label' => t('Drupal breaks'),
        'image' => drupal_get_path('module', 'ckeditor_drupalbreaks') . '/js/drupalbreaks/images/drupalpagebreak.png',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFile() {
    return drupal_get_path('module', 'ckeditor_drupalbreaks') . '/js/drupalbreaks/plugin.js';
  }

  /**
   * {@inheritdoc}
   */
  public function getDependencies(Editor $editor) {
    return ['fakeobjects'];
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return [];
  }

}
