(( SQL Concepts & Keywords #2 ))
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
    echo "<br>";
    echo "<br>";

    // SELECT column1, column2 FROM users
    // SELECT * from users

    // -----------
    //$sql = 'SELECT name FROM users';

    //$sql = "SELECT name FROM users WHERE id='2'"; // 1 ia i.a@programmer.net +97154193.. 12345
    $sql = "SELECT * FROM users ORDER BY id ASC"; // ASC[verse : from old to new] , DESC[from new, to old]

    // for($sql as $user){
    //    echo $user;
    //}
    //while{codition}{
    //    echo $user;
    //}

    $user_infos; // declare the user variable rows infos
    $id;
    $name;
    $phone;
    $code;

    $result = mysqli_query($con, $sql); // fetch query of the user
    // Handle the excute the query
    if($result){

        //fetching each row from result set []
        while($user_infos = mysqli_fetch_assoc($result)){
            $id = $user_infos['id'];
            $name = $user_infos['name'];
            $phone = $user_infos['phone'];
            $code = $user_infos['code'];

            echo "<br>";
            echo "ID. " .$id;
            echo "<br>";
            echo "Welcome, " .$name;
            echo "<br>";
            echo "your phone No. " .$phone ;
            echo "<br>";
            echo "your code No. " .$code ;
            echo "<br>";
            echo "<br>";

        }
        // free the result set
        mysqli_free_result($result);
    }else{
        echo "<br>";
        echo mysqli_errno($con);
    }

    // close the connection
    mysqli_close($con);
    // -----------
};
?>