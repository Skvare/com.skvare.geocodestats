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
