<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'blank_nulls' => false, 
        // Database settings
        'db' => [
            'user' => 'root',
            'pass' => '',
            'host' => 'localhost',
            'name' => 'factory',
        ],
        // PHPMailer settingss
        'phpmailer' => [
            'CharSet' => 'UTF-8',
			'Host' => 'smtp.gmail.com',
			'SMTPAuth' => true,
			'Username' => 'some_email@gmail.com',
			'Password' => 'password',
			'SMTPSecure' => 'tls',
			'Port' => 587,
        ],
        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        
        'logs' => [
            'api_log' => true,
            'api_log_level' => 2, // 1=> Basic Details (Only API details), 2=> Basic + Request Body (API Details and Request Body) 3=> Few Details (Request Details along with the API Details), 2=> All Detials (Request and Response and API Details) 
            'api_limit' => false,
            'api_limit_value' => 20,
        ],
        
        'error_info_url' => 'https://factory-app-cammy92.c9users.io/slim_final/',
        'errors' => [
            'MySQLException' => [
                'error_type' => 'MySQLException',
                'error_code' => 1234,
                'http_code' => 500
            ],
            'APILimitCrossed' => [
                'error_type' => 'APILimitCrossed',
                'error_code' => 1111,
                'http_code' => 429
            ],
            'APIKeyInvalid' => [
                'error_type' => 'APIKeyInvalid',
                'error_code' => 1111,
                'http_code' => 401
            ],
            'APIKeyNotFound' => [
                'error_type' => 'APIKeyNotFound',
                'error_code' => 1222,
                'http_code' => 403
            ],
            'UserTokenInvalid' => [
                'error_type' => 'UserTokenInvalid',
                'error_code' => 1111,
                'http_code' => 401
            ],
            'UserTokenNotFound' => [
                'error_type' => 'UserTokenNotFound',
                'error_code' => 1111,
                'http_code' => 403
            ],
            'RuntimeException' => [
                'error_type' => 'RuntimeException',
                'error_code' => 1111,
                'http_code' => 500
            ],
            'PageNotFoundError' => [
                'error_type' => 'PageNotFoundError',
                'error_code' => 1111,
                'http_code' => 404
            ],
            'MethodNotAllowed' => [
                'error_type' => 'MethodNotAllowed',
                'error_code' => 1111,
                'http_code' => 405
            ],
            'PHPError' => [
                'error_type' => 'PHPError',
                'error_code' => 1111,
                'http_code' => 500
            ],
            'ValidationError' => [
                'error_type' => 'ValidationError',
                'error_code' => 1111,
                'http_code' => 422
            ],
            'UserNotFound' => [
                'error_type' => 'UserNotFound',
                'error_code' => 1111,
                'http_code' => 404
            ],
            'InvalidCredentials' => [
                'error_type' => 'InvalidCredentials',
                'error_code' => 1111,
                'http_code' => 404
            ],
            'FailedInsertException' => [
                'error_type' => 'FailedInsertException',
                'error_code' => 1111,
                'http_code' => 400
            ],
            'FailedUpdateException' => [
                'error_type' => 'FailedUpdateException',
                'error_code' => 1111,
                'http_code' => 400
            ],
            'FailedDeleteException' => [
                'error_type' => 'FailedDeleteException',
                'error_code' => 1111,
                'http_code' => 400
            ],
            'InvalidParameterValues' => [
                'error_type' => 'InvalidParameterValues',
                'error_code' => 1111,
                'http_code' => 400
            ],
        ],
        'success_info_url' => 'https://factory-app-cammy92.c9users.io/slim_final/',
        'success' => [
            'LoginSuccessful' => [
                'success_type' => 'LoginSuccessful',
                'success_code' => 1234,
                'http_code' => 200
            ],
            'InitializedSuccessful' => [
                'success_type' => 'InitializedSuccessful',
                'success_code' => 1111,
                'http_code' => 200
            ],
            'InsertedSuccessful' => [
                'success_type' => 'InsertedSuccessful',
                'success_code' => 1234,
                'http_code' => 201
            ],
            'FetchedSuccessful' => [
                'success_type' => 'FetchedSuccessful',
                'success_code' => 1111,
                'http_code' => 200
            ],
            'UpdatedSuccessful' => [
                'success_type' => 'UpdatedSuccessful',
                'success_code' => 1111,
                'http_code' => 200
            ],
            'PatchedSuccessful' => [
                'success_type' => 'PatchedSuccessful',
                'success_code' => 1111,
                'http_code' => 200
            ],
            'DeletedSuccessful' => [
                'success_type' => 'DeletedSuccessful',
                'success_code' => 1111,
                'http_code' => 200
            ]
        ]
    ]
];