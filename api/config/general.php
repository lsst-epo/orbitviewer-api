<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 *
 * @see \craft\config\GeneralConfig
 */

use craft\helpers\App;

$dev = App::env('ENVIRONMENT') === 'dev';

$gcsBucketPathFormat = 'https://storage.googleapis.com/%s/';

return [
    // Global settings
    '*' => [
        // Default Week Start Day (0 = Sunday, 1 = Monday...)
        'defaultWeekStartDay' => 1,

        // Whether generated URLs should omit "index.php"
        'omitScriptNameInUrls' => true,

        // Control Panel trigger word
        'cpTrigger' => 'admin',

        // The secure key Craft will use for hashing and encrypting data
        'securityKey' => App::env('SECURITY_KEY'),

        'aliases' => [
            '@assets' => sprintf(
                $gcsBucketPathFormat,
                App::env('GCS_GENERAL_BUCKET')
            ),
        ],

        'allowedGraphqlOrigins' => false,

        'headlessMode' => true //,

        // Disable CSRF protection for contact form - unnecessary until we implement certs
        //'enableCsrfProtection' => $_SERVER['REQUEST_URI'] !== '/actions/contact-form/send',


    ],

    // Dev environment settings
    'dev' => [
        // Dev Mode (see https://craftcms.com/guides/what-dev-mode-does)
        'devMode' => App::env('ENVIRONMENT') === 'dev',
    ],

    // Staging environment settings
    'staging' => [
        // Set this to `false` to prevent administrative changes from being made on staging
        'allowAdminChanges' => false,
    ],

    // Production environment settings
    'production' => [
        // Set this to `false` to prevent administrative changes from being made on production
        'allowAdminChanges' => false,
    ],
];
