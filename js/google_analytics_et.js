/**
 * @file
 * Fires Google Analytics events based on user configuration settings.
 */

(function (Drupal, drupalSettings) {
  'use strict';
  Drupal.behaviors.googleAnaltyicsEt = {
    attach: function (context, settings) {
      // Bail if the ga function isn't defined.
      if (typeof ga == 'undefined') {
        return;
      }
      var trackers = drupalSettings.googleAnalyticsEt;
      // Iterate over our tracker settings.
      for (var i = 0; i < trackers.length; i++) {
        var elements = document.querySelectorAll(trackers[i].selector);
        for (var j = 0; j < elements.length; j++) {
          elements[j].addEventListener(trackers[i].event, (function(setting, element) {
              return function(e) {
                Drupal.googleAnaltyicsEt(setting, element);
              };
          }) (trackers[i], elements[j]), false)
        }
      }
    }
  };

  Drupal.googleAnaltyicsEt = function (tracker, element) {
    ga('send', {
      'hitType': 'event',
      'eventCategory': tracker.category,
      'eventAction': tracker.action,
      'eventLabel': tracker.label,
      'eventValue': tracker.value,
      'nonInteraction': Boolean(tracker.bounce)
    });
  }
})(Drupal, drupalSettings);

