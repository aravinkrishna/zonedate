# zonedate
A Drupal9 module which displays time depending the configured time zone along with city and country in configuration.

- After module is installed navigate to admin/config/zonedate/adminsettings and configure the settings.
- Once the configuration is complete place the block named "Zone Date Block" in /admin/structure/block.
- Configure the block and save.
- The configuration variables can also be used in theme templates by adding following for each configuration in template file:
  - Country/Region : {{ zonedate_country }}
  - City : {{ zonedate_city }}
  - Date and Time for timezone selected : {{ zonedate_dateAndTime }}