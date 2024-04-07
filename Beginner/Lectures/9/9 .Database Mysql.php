(( Config Database Mysql))
<p></p>

<!--  -->
<?php
error_reporting(0);

// import config file
$server = '../../config.php';
include_once($server);


// Create a connection
$con = new mysqli($serverhost, $username, $password, $dbname);

if ($con->connect_error) {
    echo "error";
    die("Connection Failed : " .$con->connect_error);
}else{
    echo "connected";
};
?>



Config file

<?php
// handle the error, dont show
error_reporting(0);

//sned our server info

// if u aready upload this php file server and also the same server have our db
// u can use localhost
$serverhost = "localhost";
//else : if u upload php files into  webserver , and ur cpanel db in another server
// $serverhost = "xxx.xxx.xxx.xxx";// type ur db cpanel public ip
// cpanel db, remote mysql>

$username = "root";
$password = "";
$dbname = "test";
?>
