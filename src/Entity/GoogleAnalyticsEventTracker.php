<?php

namespace Drupal\google_analytics_et\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Google Analytics event tracker entity.
 *
 * @ConfigEntityType(
 *   id = "google_analytics_event_tracker",
 *   label = @Translation("Google Analytics event tracker"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\google_analytics_et\GoogleAnalyticsEventTrackerListBuilder",
 *     "form" = {
 *       "add" = "Drupal\google_analytics_et\Form\GoogleAnalyticsEventTrackerForm",
 *       "edit" = "Drupal\google_analytics_et\Form\GoogleAnalyticsEventTrackerForm",
 *       "delete" = "Drupal\google_analytics_et\Form\GoogleAnalyticsEventTrackerDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\google_analytics_et\GoogleAnalyticsEventTrackerHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "google_analytics_event_tracker",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/config/system/google-analytics/google_analytics_event_tracker/{google_analytics_event_tracker}",
 *     "add-form" = "/admin/config/system/google-analytics/google_analytics_event_tracker/add",
 *     "edit-form" = "/admin/config/system/google-analytics/google_analytics_event_tracker/{google_analytics_event_tracker}/edit",
 *     "delete-form" = "/admin/config/system/google-analytics/google_analytics_event_tracker/{google_analytics_event_tracker}/delete",
 *     "collection" = "/admin/config/system/google-analytics/google_analytics_event_tracker"
 *   }
 * )
 */
class GoogleAnalyticsEventTracker extends ConfigEntityBase implements GoogleAnalyticsEventTrackerInterface {

  /**
   * The Google Analytics event tracker ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Google Analytics event tracker label.
   *
   * @var string
   */
  protected $label;

}
