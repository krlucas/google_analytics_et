/**
 * @file
 * Fires Google Analytics events based on user configuration settings.
 */

(function (Drupal, drupalSettings) {
  'use strict';
  Drupal.behaviors.googleAnaltyicsEt = {
    attach: function (context, settings) {
      console.log(drupalSettings['google_analytics_et']);
    }
  };
})(Drupal, drupalSettings);