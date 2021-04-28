# com.skvare.geocodestats


This Extension record each geo coding request and provide reports. Report shows number request made on different 
contact address on specific date.

Currently it only record Google geo code request.

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v7.0+
* CiviCRM (*FIXME: Version number*)

## Installation (Web UI)

This extension has not yet been published for installation via the web UI.

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl com.skvare.geocodestats@https://github.com/Skvare/com.skvare.geocodestats/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/Skvare/com.skvare.geocodestats.git
cv en geocodestats
```

## Usage

Visite "Create New Report from Template" page ('civicrm/admin/report/template/list'), Look for 'Geostats for Address'.

Create New Report from this template.

Changes to be needed in Core file
````patch
diff --git a/CRM/Core/BAO/Address.php b/CRM/Core/BAO/Address.php
index 283709aba6..fa84f00f5c 100644
--- a/CRM/Core/BAO/Address.php
+++ b/CRM/Core/BAO/Address.php
@@ -1310,7 +1310,20 @@ SELECT is_primary,
       $providerExists = FALSE;
     }
     if ($providerExists) {
-      $provider::format($params);
+      $status = $provider::format($params);
+      //  ===== Custom Code START =====
+      // This is custom hook, Different Geo coder not initiating 'HOOK_civicrm_geocoderFormat', We can not record geo
+      // coder request and result. So creating new Custom hook
+      if (class_exists('\Civi\Core\Event\GenericHookEvent')) {
+        \Civi::dispatcher()->dispatch('hook_civicrm_geocoderFormatResult',
+          \Civi\Core\Event\GenericHookEvent::create([
+            'provider' => $provider,
+            'params' => &$params,
+            'status' => $status,
+          ])
+        );
+      }
+      // ===== Custom Code END =====
     }
````
Pass Address ID for Scheduled job Geocoding operation:
````patch
diff --git a/CRM/Utils/Address/BatchUpdate.php b/CRM/Utils/Address/BatchUpdate.php
index 22177485f3..f60ebe8c4c 100644
--- a/CRM/Utils/Address/BatchUpdate.php
+++ b/CRM/Utils/Address/BatchUpdate.php
@@ -161,6 +161,7 @@ class CRM_Utils_Address_BatchUpdate {
     while ($dao->fetch()) {
       $totalAddresses++;
       $params = [
+        'id' => $dao->address_id,
         'street_address' => $dao->street_address,
         'postal_code' => $dao->postal_code,
         'city' => $dao->city,

````
