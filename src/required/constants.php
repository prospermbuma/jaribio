<?php

// Require database connection credentials
$credentials = parse_ini_file('../../../private/db.ini');

// Define constants for database connection
define('DB_HOST', $credentials['host']);
define('DB_NAME', $credentials['database']);
define('DB_USER', $credentials['username']);
define('DB_PASSWORD', $credentials['password']);

// Define constants for site settings
define('SITE_NAME', $credentials['site_name'] ?? 'My Website');
define('SITE_DESCRIPTION', $credentials['site_description'] ?? 'A simple website built with PHP.'); 
define('SITE_URL', $credentials['site_url'] ?? 'http://localhost/jaribio.co.tz/');

// Define constants for error messages
define('ERROR_INVALID_INPUT', 'Invalid input provided.');
define('ERROR_DB_CONNECTION', 'Database connection failed.');

// Define constants for success messages
define('SUCCESS_REGISTRATION', 'Registration successful!');
define('SUCCESS_LOGIN', 'Login successful!');

// Define constants for user roles
define('ROLE_USER', 'user');
define('ROLE_ADMIN', 'admin');

// Define constants for session keys
define('SESSION_USER_ID', 'user_id');
define('SESSION_USER_ROLE', 'user_role');

// Define constants for file paths
define('PATH_UPLOADS', 'uploads/');
define('PATH_LOGS', 'logs/');

// Define constants for API keys
define('API_KEY', 'your_api_key_here');
define('API_SECRET', 'your_api_secret_here');

// Define constants for email settings
define('EMAIL_HOST', 'smtp.example.com');
define('EMAIL_PORT', 587);
define('EMAIL_USERNAME', 'your_email_username');
define('EMAIL_PASSWORD', 'your_email_password');

// Define constants for pagination
define('ITEMS_PER_PAGE', 10);

// Define constants for date formats
define('DATE_FORMAT', 'Y-m-d H:i:s');
define('DATE_FORMAT_SHORT', 'Y-m-d');

// Define constants for currency
define('CURRENCY_SYMBOL', '$');
define('CURRENCY_CODE', 'USD');

// Define constants for time zones
define('TIME_ZONE', 'UTC');

// Define constants for file upload limits
define('MAX_FILE_SIZE', 10485760); // 10 MB
define('MAX_FILE_COUNT', 10);

// Define constants for API response codes
define('API_RESPONSE_SUCCESS', 200);
define('API_RESPONSE_ERROR', 500);

// Define constants for cache settings
define('CACHE_ENABLED', true);
define('CACHE_TIMEOUT', 600); // 10 minutes

// Define constants for logging
define('LOG_LEVEL_ERROR', 'error');
define('LOG_LEVEL_WARNING', 'warning');
define('LOG_LEVEL_INFO', 'info');
define('LOG_LEVEL_DEBUG', 'debug');

// Define constants for third-party service URLs
define('THIRD_PARTY_SERVICE_URL', 'https://api.thirdparty.com/v1/');

// Define constants for payment gateway settings
define('PAYMENT_GATEWAY_URL', 'https://gateway.example.com/');
define('PAYMENT_GATEWAY_API_KEY', 'your_api_key_here');

// Define constants for social media links
define('SOCIAL_FACEBOOK', 'https://www.facebook.com/yourpage');
define('SOCIAL_TWITTER', 'https://twitter.com/yourpage');

// Define constants for file types
define('FILE_TYPE_IMAGE', 'image/jpeg,image/png,image/gif');
define('FILE_TYPE_VIDEO', 'video/mp4,video/webm');

// Define constants for user status
define('USER_STATUS_ACTIVE', 'active');
define('USER_STATUS_INACTIVE', 'inactive');

// Define constants for notification settings
define('NOTIFICATION_EMAIL', true);
define('NOTIFICATION_SMS', false);

// Define constants for API rate limits
define('API_RATE_LIMIT', 1000); // 1000 requests per hour 

// Define constants for session timeout
define('SESSION_TIMEOUT', 3600); // 1 hour in seconds

// Define constants for file upload directories
define('UPLOAD_DIR_IMAGES', 'uploads/images/');
define('UPLOAD_DIR_VIDEOS', 'uploads/videos/');

// Define constants for file permissions
define('FILE_PERMISSION_READ', 0444);
define('FILE_PERMISSION_WRITE', 0222);

// Define constants for API endpoints
define('API_BASE_URL', 'https://api.example.com/v1');
define('API_USER_ENDPOINT', API_BASE_URL . 'users/');

?>