<?php

namespace Drupal\Tests\google_analytics_et\FunctionalJavascript;
use Drupal\FunctionalJavascriptTests\JavascriptTestBase;
use Drupal\google_analytics_et\Entity\GoogleAnalyticsEventTracker;
use Drupal\Tests\ConfigTestTrait;

/**
 * Google Analytics Event Tracking JavaScript tests.
 *
 * @group google_analytics_et
 */
class GoogleAnalyticsEventTrackingJsTest extends JavascriptTestBase {

  use ConfigTestTrait;

  /**
   * {@inheritdoc}
   */
  public static $modules = [
    'google_analytics',
    'google_analytics_et',
  ];

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
    $this->container->get('theme_installer')->install(['bartik']);
    $this->container->get('config.factory')->getEditable('system.theme')->set('default', 'bartik')->save();
    $this->createContentType(['type' => 'page']);
    GoogleAnalyticsEventTracker::create([
      'label' => 'test tracker',
      'id' => 'test_tracker',
      'element_selector' => '#logo',
      'dom_event' => 'click',
      'ga_event_category' => 'test category',
      'ga_event_action' => 'test action',
      'ga_event_label' => 'test label',
      'ga_event_value' => 666,
      'ga_event_noninteraction' => 0,
    ]);
    $node = $this->createNode(['type' => 'page']);

  }

  /**
   * Ensure a tracker config adds a click event to an element.
   */
  public function testClickTrackerConfig() {

  }


}
