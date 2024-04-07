(( Sign In ))
<p></p>

<!--  http://localhost/test/sign_in.php?email=i.a@programmer.net&password=12345-->
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
    echo "connected<br><br>";

    //name	email	password
    $email = mysqli_real_escape_string($con, $_GET['email']);


    $password_hashed;
    $password = mysqli_real_escape_string($con, $_GET['password']);
  
    $token = base64_encode(random_bytes(32));
    $created = date('Y-m-d H:i:s');

    // create arraylist
    $code = array();
    while(count($code) < 4){
        $code[] = rand(0,9);
    };

    $code = implode('', $code); // convert from array to strings

    $sql = "SELECT * from users where email = '$email'";

    $res = array();
    $result = mysqli_query($con, $sql); // fetched successfully and found this email
    
    if(mysqli_num_rows($result)> 0){ // if row found => 0

        $row = mysqli_fetch_array($result);

        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $token = $row['access_token'];
        $password_hashed =  $row['password'];


        if(password_verify($password, $password_hashed)){

            array_push($res, array(
                'Status' => 'Login Successfully',
                'id' =>  $id,
                'name' => $name,
                'email' => $email,
                'token' => $token,
                'password' => $password,
            ));
        
            
        }else
        {
            array_push($res, array(
                'Status' => 'Login Failed'
            ));
        
            
        }


        echo json_encode(array("SignIn_Status" => $res), JSON_PRETTY_PRINT);



    }else{

        array_push($res, array(
            'Status' => 'user not found'
        ));

            echo json_encode(array("Signup_Status" => $res), JSON_PRETTY_PRINT);
        }
        
    
    // close the connection
    mysqli_close($con);
    // -----------
};
?>