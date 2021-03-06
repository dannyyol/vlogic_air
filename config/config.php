<?php
// GOD IS LIGHT
$iparray = array("127.0.0.1", "::1");
$remote = (in_array($_SERVER['REMOTE_ADDR'], $iparray)) ? TRUE : FALSE;
$local_remote = (strpos($_SERVER['REMOTE_ADDR'], "192.168.") !== FALSE) ? TRUE : FALSE;

//directory routing
$dir = array(
            "user" => "user", 
            "admin" => "admin",
            "folder3" => NULL,
            "folder4" => NULL,
            "folder5" => NULL
            );

// define base urls 
$base_url_local = 'http://localhost/vlogic_air/';
$base_url = 'https://air.v-logic.com.ng/';

// alternative base urls
$alt_base_url_local = NULL;
$alt_base_url = NULL;

// define root dir
$root_dir_local = 'vlogic_air';
$root_dir = 'air.v-logic.com.ng';

// index page for app
$index_page = '';

// user shopping cart
$use_shopping_cart = TRUE;

// cart session name can be changed
$cart_sess_name = NULL;

// cart attr name
$cart_attr_name = NULL;

// define 404 page path
$err404 = 'view/404.php';

// 404 page path
define("PAGE_404", $err404);

// site title
define("TITLE", "Air Shipping");

// site name
define("SITENAME","v-logic.com.ng");

// preloader
define("PRELOADER", FALSE);

// define index page
define("INDEX_PAGE", $index_page);

define("DIR", $dir);

if($remote == TRUE){
    // base url local env
    define("BASE_URL", $base_url_local);
    // alt base url local env
    define("ALT_BASE_URL", $alt_base_url_local);
    // root dir local env
    define("ROOT_DIR", $root_dir_local);
}
else{
    // check for local remote connection
    // local testing
    // optional - access from remote computer
    if($local_remote == TRUE){
        // base url local env
        define("BASE_URL", $base_url_local);
        // alt base url local env
        define("ALT_BASE_URL", $alt_base_url_local);
        // root dir local env
        define("ROOT_DIR", $root_dir_local);
    }
    else{
        // base url online env
        define("BASE_URL", $base_url);
        // alt base url production env
        define("ALT_BASE_URL", $alt_base_url);
        // root dir online env
        define("ROOT_DIR", $root_dir);      
    }
}

define("USE_SHOPPING_CART", $use_shopping_cart);

// define cart name
define("FHOLA_CART", $cart_sess_name);

// cart attribute session name
define("CART_ATTR", $cart_attr_name);
// GOD IS LIGHT