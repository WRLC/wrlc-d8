<?php

/**
 * @file
 * Page callbacks for feeds_ex.
 */

use Drupal\Component\Utility\Html;
use Drupal\Component\Utility\Unicode;

/**
 * Autocomplete callback for encodings.
 */
function feeds_ex_encoding_autocomplete($string = '') {
  $matches = [];

  if (!strlen($string) || Unicode::getStatus() != Unicode::STATUS_MULTIBYTE) {
    drupal_json_output($matches);
    return;
  }

  $added = array_map('trim', explode(',', $string));
  $string = array_pop($added);
  $lower_added = array_map('drupal_strtolower', $added);

  // Filter out items already added. Do it case insensitively without changing
  // the suggested case.
  $prefix = '';
  $encodings = [];
  foreach (mb_list_encodings() as $suggestion) {
    if (in_array(mb_strtolower($suggestion), $lower_added)) {
      $prefix .= $suggestion . ', ';
      continue;
    }
    $encodings[] = $suggestion;
  }

  // Find starts with first.
  foreach ($encodings as $delta => $encoding) {
    if (stripos($encoding, $string) !== 0) {
      continue;
    }
    $matches[$prefix . $encoding] = Html::escape($encoding);
    // Remove matches so we don't search them again.
    unset($encodings[$delta]);
  }

  // Find contains next.
  foreach ($encodings as $encoding) {
    if (stripos($encoding, $string) !== FALSE) {
      $matches[$prefix . $encoding] = Html::escape($encoding);
    }
  }

  // Only send back 10 suggestions.
  $matches = array_slice($matches, 0, 10, TRUE);
  drupal_json_output($matches);
}
