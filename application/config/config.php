<?php
date_default_timezone_set('Asia/Kuala_Lumpur');

# turn off in production
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$config['base_url'] = getenv('BASE_URL');

# file upload
$config['upload_destination'] = getenv('UPLOAD_FOLDER');
$config['upload_tmp'] = getenv('UPLOAD_TMP_FOLDER');

$config['site_title'] = getenv('SITE_TITLE');
$config['company'] = getenv('COMPANY_NAME');
$config['default_controller'] = 'auth'; // Default controller to load
$config['error_controller'] = 'oops'; // Controller used for errors (e.g. 404, 500 etc)

# STMP setting
$config['from_email'] = getenv('EMAIL_ADDRESS'); // default email address
$config['from_name'] = getenv('EMAIL_FROM');