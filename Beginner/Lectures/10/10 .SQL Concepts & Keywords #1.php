(( SQL Concepts & Keywords #1 ))
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

    // SELECT column1, column2 FROM users
    // SELECT * from users

    // -----------
    //$sql = 'SELECT name FROM users';

    //$sql = "SELECT name FROM users WHERE id='2'"; // 1 ia i.a@programmer.net +97154193.. 12345
    //$sql = "SELECT * FROM users WHERE id='2'"; // 1 ia i.a@programmer.net +97154193.. 12345
    $sql = "SELECT name, phone, code FROM users WHERE id='2'"; // 1 ia i.a@programmer.net +97154193.. 12345

    $user_infos; // declare the user variable rows infos
    $name;
    $phone;
    $code;

    $result = mysqli_query($con, $sql); // fetch query of the user
    // Handle the excute the query
    if($result){
        // fetched successfully the user infos 1 ia i.a@programmer.net +97154193.. 12345
        // fetch data from result set, as row => $user_infos
        $user_infos = mysqli_fetch_assoc($result);
        $name = $user_infos['name'];
        $phone = $user_infos['phone'];
        $code = $user_infos['code'];

        echo "<br>";
        echo "Welcome, " .$name;
        echo "<br>";
        echo "your phone No. " .$phone ;
        echo "<br>";
        echo "your code No. " .$code ;
    }else{
        echo "<br>";
        echo "Can't find the user";
    }

	// Free the result set
    mysqli_free_result($result);
	
    // close the connection
    mysqli_close($con);
    // -----------
};
?>