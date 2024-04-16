<?php 
//DB Params
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','db_jwt');
//App Root
define("APPROOT", dirname(dirname(__FILE__))."/");
//Url Root
$host1 = "/jwt_php/";
$host = "/";
define("URLROOT", $host1);
//Site Name
define("DEVELOPER","Christian IRADUKUNDA");
//Support Email
define("SUPPORT_EMAIL","info@hanomedia.com");

$token_key = "UdpUBtF02SHYdiqsOd7x9MTsuvdiOhSBXSkaik4i4uSagQBtcsQg4WHFz5lZadx7";
$token_issuer="hanomedia.com";
$token_audience = "hanomedia.com";
define("TOKEN_ISSUER",$token_issuer);
define("AUDIENCE",$token_audience);
define("TOKEN_KEY",$token_key);









