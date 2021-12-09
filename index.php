<?php
// GOD IS LIGHT 

// server should keep session data for AT LEAST 48 hours
ini_set('session.gc_maxlifetime', 172800);

// each client should remember their session id for EXACTLY 48 hours
session_set_cookie_params(172800);

ob_start();

session_start();

date_default_timezone_set('africa/lagos');

// include core library functions
include_once 'core/lib/fns.php';

// load custom scripts
load('custom/fns.php');

// include core libs
load('core/core.php');

ob_end_flush();

// GOD IS LIGHT
?>