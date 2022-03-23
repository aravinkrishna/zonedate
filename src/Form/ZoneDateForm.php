<?php  
/**  
 * @file  
 * Contains Drupal\zonedate\Form\ZoneDateForm.  
 */  
namespace Drupal\zonedate\Form;  
use Drupal\Core\Form\ConfigFormBase;  
use Drupal\Core\Form\FormStateInterface;  
  
class ZoneDateForm extends ConfigFormBase {  
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
      return [
          'zonedate.settings'
      ];
  }

  /**  
   * {@inheritdoc}  
   */  
  public function getFormId() {  
    return 'zonedate_form';  
  }  

    /**  
   * {@inheritdoc}  
   */  
  public function buildForm(array $form, FormStateInterface $form_state) {  
    $config = $this->config('zonedate.settings');

    $form['country'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Country/Region: '),
        '#description' => $this->t('Enter country/region name.'),
        '#default_value' => $config->get('country')
    ];

    $form['city'] = [
        '#type' => 'textfield',
        '#title' => $this->t('City: '),
        '#description' => $this->t('Enter city name.'),
        '#default_value' => $config->get('city')
    ];

    $form['timezone'] = [
        '#type' => 'select',
        '#title' => $this->t('Timezone: '),
        '#description' => $this->t('Select a time zone.'),
        '#options' => [
        '' => "--- SELECT ---", 
        'America/Chicago' => "America/Chicago", 
        'America/New_York' => "America/New_York", 
        'Asia/Tokyo' => "Asia/Tokyo",
        'Asia/Dubai' => "Asia/Dubai",
        'Asia/Kolkata' => "Asia/Kolkata",
        'Europe/Amsterdam' => "Europe/Amsterdam",
        'Europe/Oslo' => "Europe/Oslo",
        'Europe/london' => "Europe/london",
        ],
        '#default_value' => $config->get('timezone')
    ];

    return parent::buildForm($form, $form_state);  
  }

  /**  
   * {@inheritdoc}  
   */  
  public function submitForm(array &$form, FormStateInterface $form_state) {  
    parent::submitForm($form, $form_state);  
  
    $this->config('zonedate.settings')  
      ->set('country', $form_state->getValue('country'))  
      ->set('city', $form_state->getValue('city'))  
      ->set('timezone', $form_state->getValue('timezone'))  
      ->save();  
  } 
}  