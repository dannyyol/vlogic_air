<?php
// GOD IS LIGHT
$iparray = array("127.0.0.1", "::1");

// local testing
$lcl_db_host = 'localhost';
$lcl_db_name = 'vlogic_air';
$lcl_db_username = 'root';
$lcl_db_password = '';
    
// online
$db_host = 'localhost';
$db_name = 'vlogolsw_air';
$db_username = 'vlogolsw_vlogolsw';
$db_password = 'vBVHjxfs$7XE';

// db connection
if(in_array($_SERVER['REMOTE_ADDR'], $iparray)){
    // local testing
    $db = array(
            "db_host" => $lcl_db_host,
            "db_name" => $lcl_db_name,
            "db_username" => $lcl_db_username,
            "db_password" => $lcl_db_password
            );
}
else{
    if(strpos($_SERVER['REMOTE_ADDR'], "192.168.") !== FALSE){
        // local testing
        // optional - access from remote computer
        $db = array(
                "db_host" => $lcl_db_host,
                "db_name" => $lcl_db_name,
                "db_username" => $lcl_db_username,
                "db_password" => $lcl_db_password
                );
    }
    else{
        // online testing
        $db = array(
                "db_host" => $db_host,
                "db_name" => $db_name,
                "db_username" => $db_username,
                "db_password" => $db_password
                );   
    }
}

define("DB", $db);
// GOD IS LIGHT