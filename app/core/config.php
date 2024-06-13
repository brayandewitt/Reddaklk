<?php

$dotenv = Dotenv\Dotenv::createImmutable(realpath(__DIR__ . "/../.."));
$dotenv->load();

//show($_ENV);die;

$dbconnection = $_ENV["DB_CONNECTION"];
$dbhost = $_ENV["DB_HOST"];
$dbport = $_ENV["DB_PORT"];
$dbdatabase = $_ENV["DB_DATABASE"];
$dbusername = $_ENV["DB_USERNAME"];
$dbpasssword = $_ENV["DB_PASSWORD"];


/**
 * server 
 */

$svconnection = $_ENV["SV_CONNECTION"];
$svhost = $_ENV["SV_HOST"];
$svport = $_ENV["SV_PORT"];
$svdatabase = $_ENV["SV_DATABASE"];
$svusername = $_ENV["SV_USERNAME"];
$svpasssword = $_ENV["SV_PASSWORD"];
/**
 * app info
 */
define('APP_NAME', 'REDDAK.LK');
define('APP_DESC', 'LARGEST CLOTH SALE');



/**
 * database config
 */

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    //database config for local server

    define('DBHOST', $dbhost);
    define('DBNAME', $dbdatabase);
    define('DBUSER', $dbusername);
    define('DBPASS', $dbpasssword);
    define('DBDRIVER', $dbconnection);
    //local server root path e.glocalhost/
    define('ROOT', 'http://localhost/reddaklk/public');
} else {
    //database config for live server
    define('DBHOST', $svhost);
    define('DBNAME', $svdatabase);
    define('DBUSER', $svusername);
    define('DBPASS', $svpasssword);
    define('DBDRIVER', $svconnection);
    //online server root path e.g.www.hostname.com/
    define('ROOT', 'https://localhost/reddaklk/public');

    define('DBHOST','localhost');
    define('DBNAME','reddaklk');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','mysql');
//local server root path e.glocalhost/
    define('ROOT','http://localhost/reddaklk/public');
}else{
    //database config for live server
    define('DBHOST','localhost');
    define('DBNAME','reddaklk');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','mysql');
//online server root path e.g.www.hostname.com/

}
