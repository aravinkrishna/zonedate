<?php

namespace Drupal\zonedate\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a block with location and time for zone selected
 * 
 * @Block(
 *  id = "zone_date_block",
 *  admin_label = @Translation("Zone Date Block")
 * )
 */

class ZoneDateBlock extends BlockBase {

    /**
     * {@inheritdoc}
     */
    public function build() {
        $config = \Drupal::config('zonedate.settings');
        $city = $config->get("city");
        $country = $config->get("country");
        /* @var \Drupal\zonedate\ZoneDateService $zoneDateService */
        $zoneDateService = \Drupal::service('zonedate_service.datetime');
        $dateAndTime = $zoneDateService->getTime();
        return [
            "#type" => "makrup",
            "#markup" => $city . ", " . $country . "<br>" . $dateAndTime,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function blockAccess(AccountInterface $account) {
        return AccessResult::allowedIfHasPermission($account, 'access content');
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheMaxAge() {
        return 0;
    }
}