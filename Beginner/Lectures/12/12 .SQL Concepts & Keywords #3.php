(( SQL Concepts & Keywords #3 ))
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

    // UNIQUE : Ensure values in a column are unique.
    // PRIMARY KEY : uniquely identifies each record in a table.
    // UNIQUE : Ensure values in a column are unique.

    $sql = "
    
    CREATE TABLE testo(
        id INT NOT NULL,
        name TEXT,
        PRIMARY KEY (id)
    );
    
    "; 

    $result = mysqli_query($con, $sql); // fetch query of the user
    // Handle the excute the query
    if($result){

        echo "<br>";
        echo "Created, successfully.!";

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