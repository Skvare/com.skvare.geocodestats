<?php
// This file declares a managed database record of type "ReportTemplate".
// The record will be automatically inserted, updated, or deleted from the
// database as appropriate. For more details, see "hook_civicrm_managed" at:
// https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
return [
  [
    'name' => 'CRM_Geocodestats_Form_Report_Geostats',
    'entity' => 'ReportTemplate',
    'params' => [
      'version' => 3,
      'label' => 'Geostats for Address',
      'description' => 'Geostats (com.skvare.geocodestats)',
      'class_name' => 'CRM_Geocodestats_Form_Report_Geostats',
      'report_url' => 'contact/geostats',
      'component' => '',
    ],
  ],
];
