<?php

/**
 * @file
 * #ddev-generated: Automatically generated Drupal settings file.
 * ddev manages this file and may delete or overwrite the file unless this
 * comment is removed.  It is recommended that you leave this file alone.
 */

$host = "ddev-ddev-gitpod-db";
$port = 3306;

// If DDEV_PHP_VERSION is not set but IS_DDEV_PROJECT *is*, it means we're running (drush) on the host,
// so use the host-side bind port on docker IP
if (empty(getenv('DDEV_PHP_VERSION') && getenv('IS_DDEV_PROJECT') == 'true')) {
  $host = "127.0.0.1";
  $port = 49153;
}

$databases['default']['default'] = array(
  'database' => "db",
  'username' => "db",
  'password' => "db",
  'host' => $host,
  'driver' => "mysql",
  'port' => $port,
  'prefix' => "",
);

$settings['hash_salt'] = 'YUmoEydZYeqMCBWrovsxUjAqwpXpRCsjQIGGlrfbHfSsSnMTqPPmPqPKgTKOYEmj';

// This will prevent Drupal from setting read-only permissions on sites/default.
$settings['skip_permissions_hardening'] = TRUE;

// This will ensure the site can only be accessed through the intended host
// names. Additional host patterns can be added for custom configurations.
$settings['trusted_host_patterns'] = ['.*'];

// Don't use Symfony's APCLoader. ddev includes APCu; Composer's APCu loader has
// better performance.
$settings['class_loader_auto_detect'] = FALSE;

/**
 * Enable local development services.
 */
$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/development.services.yml';

/**
 * Show all error messages, with backtrace information.
 *
 * In case the error level could not be fetched from the database, as for
 * example the database connection failed, we rely only on this value.
 */
$config['system.logging']['error_level'] = 'verbose';

/**
 * Disable CSS and JS aggregation.
 */
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;


// This specifies the default configuration sync directory.
// For D8 before 8.8.0, we set $config_directories[CONFIG_SYNC_DIRECTORY] if not set
if (version_compare(Drupal::VERSION, "8.8.0", '<') &&
  empty($config_directories[CONFIG_SYNC_DIRECTORY])) {
  $config_directories[CONFIG_SYNC_DIRECTORY] = '../config/sync';
}
// For D8.8/D8.9, set $settings['config_sync_directory'] if neither
// $config_directories nor $settings['config_sync_directory is set
if (version_compare(DRUPAL::VERSION, "8.8.0", '>=') &&
  version_compare(DRUPAL::VERSION, "9.0.0", '<') &&
  empty($config_directories[CONFIG_SYNC_DIRECTORY]) &&
  empty($settings['config_sync_directory'])) {
  $settings['config_sync_directory'] = '../config/sync';
}
// For Drupal9, it's always $settings['config_sync_directory']
if (version_compare(DRUPAL::VERSION, "9.0.0", '>=') &&
  empty($settings['config_sync_directory'])) {
  $settings['config_sync_directory'] = '../config/sync';
}

