<?php
use CRM_Geocodestats_ExtensionUtil as E;

class CRM_Geocodestats_BAO_Geocodestats extends CRM_Geocodestats_DAO_Geocodestats {

  /**
   * Create a new Geocodestats based on array-data
   *
   * @param array $params key-value pairs
   * @return CRM_Geocodestats_DAO_Geocodestats|NULL
   *
  public static function create($params) {
    $className = 'CRM_Geocodestats_DAO_Geocodestats';
    $entityName = 'Geocodestats';
    $hook = empty($params['id']) ? 'create' : 'edit';

    CRM_Utils_Hook::pre($hook, $entityName, CRM_Utils_Array::value('id', $params), $params);
    $instance = new $className();
    $instance->copyValues($params);
    $instance->save();
    CRM_Utils_Hook::post($hook, $entityName, $instance->id, $instance);

    return $instance;
  } */

  /**
   * @return array
   */
  public static function status() {
    $charaset = [
      'success' => 'Success',
      'failed' => 'Failed',
    ];
    return $charaset;
  }
}
