<?php

namespace Drupal\config_tracker\EventSubscriber;

use Drupal\Core\Config\ConfigCrudEvent;
use Drupal\Core\Config\ConfigEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


/**
 * Class ExampleEventSubScriber.
 *
 * @package Drupal\example_events
 */
class ConfigTrackerEventSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[ConfigEvents::SAVE][] = ['onSavingConfig', 800];
    return $events;
  }

  /**
   * Subscriber Callback for the event.
   * @param ConfigCrudEvent $event
   */
  public function onSavingConfig(ConfigCrudEvent $event) {
    // Do your magic (save user, config name, timestamp to the DB) here
    \Drupal::messenger()->addStatus('Config ' . $event->getConfig()->getName() . ' has been saved!');
  }

}
