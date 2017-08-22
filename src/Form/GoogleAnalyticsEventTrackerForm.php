<?php

namespace Drupal\google_analytics_et\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class GoogleAnalyticsEventTrackerForm.
 */
class GoogleAnalyticsEventTrackerForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $google_analytics_event_tracker = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $google_analytics_event_tracker->label(),
      '#description' => $this->t("Label for the Google Analytics event tracker."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $google_analytics_event_tracker->id(),
      '#machine_name' => [
        'exists' => '\Drupal\google_analytics_et\Entity\GoogleAnalyticsEventTracker::load',
      ],
      '#disabled' => !$google_analytics_event_tracker->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $google_analytics_event_tracker = $this->entity;
    $status = $google_analytics_event_tracker->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Google Analytics event tracker.', [
          '%label' => $google_analytics_event_tracker->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Google Analytics event tracker.', [
          '%label' => $google_analytics_event_tracker->label(),
        ]));
    }
    $form_state->setRedirectUrl($google_analytics_event_tracker->toUrl('collection'));
  }

}
