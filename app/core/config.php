<?php


/**
 * app info
 */
define('APP_NAME','REDDAK.LK');
define('APP_DESC','LARGEST CLOTH SALE');



/**
 * database config
 */

if($_SERVER['SERVER_NAME'] == 'localhost'){
    //database config for local server
    define('DBHOST','localhost');
    define('DBNAME','reddaklk');
    define('DBUSER','root');
    define('DBPASS','Dewittbrayan123c@');
    define('DBDRIVER','mysql');
//local server root path e.glocalhost/
    define('ROOT','http://localhost/reddaklk/public');
}else{
    //database config for live server
    define('DBHOST','localhost');
    define('DBNAME','reddaklk');
    define('DBUSER','root');
    define('DBPASS','Dewittbrayan123c@');
    define('DBDRIVER','mysql');
//online server root path e.g.www.hostname.com/
    define('ROOT','https://localhost/reddaklk/public');
}
