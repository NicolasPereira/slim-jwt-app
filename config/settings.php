<?php

// Should be set to 0 in production
error_reporting(E_ALL);

// Should be set to '0' in production
ini_set('display_errors', '1');

// Timezone
date_default_timezone_set('Europe/Berlin');

// Settings
$settings = [];

// Path settings
$settings['root'] = dirname(__DIR__);

// Error Handling Middleware settings
$settings['error'] = [

    // Should be set to false in production
    'display_error_details' => true,

    // Parameter is passed to the default ErrorHandler
    // View in rendered output by enabling the "displayErrorDetails" setting.
    // For the console and unit tests we also disable it
    'log_errors' => true,

    // Display error details in error log
    'log_error_details' => true,
];

$settings['db'] = [
    // Enables or disables Doctrine metadata caching
    // for either performance or convenience during development.
    'dev_mode' => true,

    // Path where Doctrine will cache the processed metadata
    // when 'dev_mode' is false.
    'cache_dir' => __DIR__ . '/var/doctrine',

    // List of paths where Doctrine will search for metadata.
    // Metadata can be either YML/XML files or PHP classes annotated
    // with comments or PHP8 attributes.
    'metadata_dirs' => [__DIR__ . '/src/Domain'],

    // The parameters Doctrine needs to connect to your database.
    // These parameters depend on the driver (for instance the 'pdo_sqlite' driver
    // needs a 'path' parameter and doesn't use most of the ones shown in this example).
    // Refer to the Doctrine documentation to see the full list
    // of valid parameters: https://www.doctrine-project.org/projects/doctrine-dbal/en/current/reference/configuration.html
    'connection' => [
        'driver' => 'pdo_pgsql',
        'host' => 'slim_db',
        'port' => 5432,
        'dbname' => 'slim_app',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf-8'
    ]
];

return $settings;