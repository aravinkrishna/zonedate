<?php

namespace Drupal\zonedate;

use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * ZoneDateService returns current time based on selected zone.
 * 
 * @package Drupal\zonedate\src\
 */
class ZoneDateService {
    
  /**
   * ZoneDate custom configurations.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
  */
  protected $config;
    
  /**
   * 
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config
   *   The config factory service.
  */
  public function __construct(ConfigFactoryInterface $config) {
      $this->config = $config;
  }

  /**
   * Returns date and time for the timezone configured.
   * 
   * {@inheritdoc}
   */
  public function getTime() {
    $timezone = $this->config->get('zonedate.settings')->get('timezone');
    if($timezone !== '') {
        date_default_timezone_set($timezone);
    }
    $dateAndTime = date('jS M Y - h:i a', time()); 
    return $dateAndTime;
  }


}