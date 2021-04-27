<?php

require_once 'geocodestats.civix.php';
// phpcs:disable
use CRM_Geocodestats_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function geocodestats_civicrm_config(&$config) {
  _geocodestats_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function geocodestats_civicrm_xmlMenu(&$files) {
  _geocodestats_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function geocodestats_civicrm_install() {
  _geocodestats_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function geocodestats_civicrm_postInstall() {
  _geocodestats_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function geocodestats_civicrm_uninstall() {
  _geocodestats_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function geocodestats_civicrm_enable() {
  _geocodestats_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function geocodestats_civicrm_disable() {
  _geocodestats_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function geocodestats_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _geocodestats_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function geocodestats_civicrm_managed(&$entities) {
  _geocodestats_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function geocodestats_civicrm_caseTypes(&$caseTypes) {
  _geocodestats_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function geocodestats_civicrm_angularModules(&$angularModules) {
  _geocodestats_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function geocodestats_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _geocodestats_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function geocodestats_civicrm_entityTypes(&$entityTypes) {
  _geocodestats_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function geocodestats_civicrm_themes(&$themes) {
  _geocodestats_civix_civicrm_themes($themes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function geocodestats_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function geocodestats_civicrm_navigationMenu(&$menu) {
//  _geocodestats_civix_insert_navigation_menu($menu, 'Mailings', array(
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ));
//  _geocodestats_civix_navigationMenu($menu);
//}
function geocodestats_civicrm_geocoderFormatResult($geoProvider, &$values, $status) {
  if (is_object($geoProvider)) {
    $providerClass = explode('_', get_class($geoProvider));
    $geoProviderName = end($providerClass);
  }
  else {
    $geoProviderName = $geoProvider;
  }

  $geoCodeStats = [];

  if ($geoProviderName == 'Google') {
    $geoCodeStats['status'] = 'Failed';
    if ($status === FALSE) {
      if (array_key_exists('geo_code_error', $values)) {
        //$errorMsg = (array)$values['geo_code_error'];
        //$errorMsg = reset($errorMsg);
        //$geoCodeStats['status'] .= ' : ' . $errorMsg;
      }
    }
    else {
      $geoCodeStats['status'] = 'Success';
    }
  }
  else {
    if ($status === TRUE) {
      $geoCodeStats['status'] = 'Success';
    }
    else {
      $geoCodeStats['status'] = 'Failed';
    }
  }

  if (!empty($geoCodeStats)) {
    $geoCodeStats['address_id'] = $values['id'];
    $geoCodeStats['provider'] = $geoProviderName;
    $geoCodeStats['geo_code_1'] = $values['geo_code_1']?? NULL;
    $geoCodeStats['geo_code_2'] = $values['geo_code_2']?? NULL;

    try {
      $result = civicrm_api3('Geocodestats', 'create', $geoCodeStats);
    }
    catch (CiviCRM_API3_Exception $exception) {

    }
  }
}

