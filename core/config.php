<?php

// ROOTS
define ('ROOT', 'http://' . $_SERVER['SERVER_NAME'] . ':3000/');
define ('ADMIN_ROOT', ROOT.'admin/');
define ('ASSETS_ROOT', ROOT.'assets/');
define ('APP_ROOT' , dirname(dirname(__FILE__)));

// GLOBALS
$globals = [
	'LAYOUT' => 'default'
];

// DETAILS FOR FILE SIZE
define('BYTE', 1);
define('KB', 1024*BYTE);
define('MB', 1024*KB);

// FILESIZE FOR IMGS
define('FILE_SIZE', 10*MB);

// IMG SIZE
define('IMG_WIDTH', 10500);
define('IMG_HEIGHT',10500);

// FILE SIZE FOR PDFS
define('FILE_SIZE_FILE', 6*MB);

// FILE FOLDER
define ('FILE_FOLDER', 'files/');

// IMG WIDTH IN PX
define('PH_WIDTH', 1920);

// IMG QUALITY
define('IMG_QUALI', 80);
define('TN_QUALI', 80);

// IMG FOLDER
define('IMG_FOLDER', 'img/');

// ALLOWED FILE EXT FOR FILE UPLOAD
$_file_extensions_files = array('doc', 'pdf', 'xls');

// ALLOWED FILE EXT FOR IMG UPLOAD
$_file_extensions = array('jpg', 'jpeg', 'gif', 'png');

// ALLOWED MIME-TYPE FOR IMG UPLOAD
$_file_mime_types = array('image/jpeg', 'image/gif', 'image/png', 'image/x-png');

// ALLOWED MIME-TYPE FOR FILE UPLOAD
$_file_mime_types_files = array('application/pdf', 'application/msword', 'application/msexcel', 'application/vnd.ms-excel');
?>