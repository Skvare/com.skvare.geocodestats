-- +--------------------------------------------------------------------+
-- | Copyright CiviCRM LLC. All rights reserved.                        |
-- |                                                                    |
-- | This work is published under the GNU AGPLv3 license with some      |
-- | permitted exceptions and without any warranty. For full license    |
-- | and copyright information, see https://civicrm.org/licensing       |
-- +--------------------------------------------------------------------+
--
-- Generated from schema.tpl
-- DO NOT EDIT.  Generated by CRM_Core_CodeGen
-- 

-- +--------------------------------------------------------------------+
-- | Copyright CiviCRM LLC. All rights reserved.                        |
-- |                                                                    |
-- | This work is published under the GNU AGPLv3 license with some      |
-- | permitted exceptions and without any warranty. For full license    |
-- | and copyright information, see https://civicrm.org/licensing       |
-- +--------------------------------------------------------------------+
--
-- Generated from drop.tpl
-- DO NOT EDIT.  Generated by CRM_Core_CodeGen
--
-- /*******************************************************
-- *
-- * Clean up the existing tables
-- *
-- *******************************************************/

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `civicrm_geocodestats`;

SET FOREIGN_KEY_CHECKS=1;
-- /*******************************************************
-- *
-- * Create new tables
-- *
-- *******************************************************/

-- /*******************************************************
-- *
-- * civicrm_geocodestats
-- *
-- * Geo code stats
-- *
-- *******************************************************/
CREATE TABLE `civicrm_geocodestats` (


     `id` int unsigned NOT NULL AUTO_INCREMENT  COMMENT 'Unique Geocodestats ID',
     `address_id` int unsigned    COMMENT 'FK to Contact',
     `provider` varchar(255)   DEFAULT NULL ,
     `status` varchar(255)   DEFAULT NULL ,
     `created_date` timestamp NULL  DEFAULT CURRENT_TIMESTAMP COMMENT 'When was the Geo code call was initiated.' 
,
        PRIMARY KEY (`id`)
 
    ,     INDEX `index_created_date`(
        created_date
  )
  
,          CONSTRAINT FK_civicrm_geocodestats_address_id FOREIGN KEY (`address_id`) REFERENCES `civicrm_address`(`id`) ON DELETE CASCADE  
)    ;

 