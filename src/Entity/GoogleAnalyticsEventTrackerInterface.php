<?php

namespace Drupal\google_analytics_et\Entity;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface for defining Google Analytics event tracker entities.
 */
interface GoogleAnalyticsEventTrackerInterface extends ConfigEntityInterface {

  /**
   * Returns the list of DOM events supported by this tracker.
   *
   * @return array
   */
  public function getDomEvents();

}
