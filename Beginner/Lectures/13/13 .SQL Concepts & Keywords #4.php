(( SQL Concepts & Keywords #4 ))
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
    //$sql = "SELECT name, phone, code FROM users WHERE id='2'"; // 1 ia i.a@programmer.net +97154193.. 12345

    // SELECT * table1 LEFT JOIN table2 ON table1.column_name = table.column_name;
    // employees : employee=> 1500, ceo=> 2500, cherman=>3500

    // sql = "select name,email from user where id='1'" // Same table

    // sql = "select name, salary from user left join employee on id='1'" // Same table

    $sql = "SELECT e.employee_name, d.department_name 
    FROM employees e 
    LEFT JOIN departments d 
    ON e.employee_id = d.department_id";
    // LEFT JOIN departments
    // select 

    $result = $con->query($sql); // excute the query
    // Handle the excute the query
    if($result->num_rows > 0){
        // fetched successfully the user infos 1 ia i.a@programmer.net +97154193.. 12345
        // fetch data from result set, as row => $user_infos
        
        echo "<table><tr><th>Emplyee Name</th><th>Department Name</th></tr>";
        
        while($row = $result->fetch_assoc()){
            echo "<tr><td>" .$row["employee_name"] ."</td><td>" .$row["department_name"] ."</td></tr>";
        }
        
        echo "</table>";
        

        $user_infos = $result->fetch_assoc();

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