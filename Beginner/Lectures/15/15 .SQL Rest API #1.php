(( Sign Up ))
<p></p>

<!--  http://localhost/test/sign_up.php?email=i.a@programmer.net&password=12345&name=IA -->
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
    $name = mysqli_real_escape_string($con, $_GET['name']);
    $email = mysqli_real_escape_string($con, $_GET['email']);
    $password = mysqli_real_escape_string($con, $_GET['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $token = base64_encode(random_bytes(32));
    $created = date('Y-m-d H:i:s');
    
    // create arraylist
    $code = array();
    while(count($code) < 4){
        $code[] = rand(0,9);
    };

    $code = implode('', $code); // convert from array to strings

    $sql = "SELECT email from users where email = '$email'";

    $res = array();
    $res1 = array();
    $result = mysqli_fetch_array(mysqli_query($con, $sql)); // fetched successfully and found this email
    
    if($result){

        array_push($res, array('Status' => 'Email Aready found'));
        echo json_encode(array("Signup_Status" => $res), JSON_PRETTY_PRINT);

    }else{

        $sql1 = "INSERT INTO users(name,email,password,role,access_token,code) 
        values('$name','$email','$password','2','$token','$code')";

        //check if insert successfully

        if(mysqli_query($con, $sql1)){
            array_push($res, array('Status' => 'email created'));

            array_push($res1, array(
                'id' => mysqli_insert_id($con),
                'name' => $name,
                'email' => $email,
                'code' => $code,
                'token' => $token
            ));

            echo json_encode(array("Signup_Status" => $res) + array("Signup_Infos" => $res1), JSON_PRETTY_PRINT);

        }else{
            echo json_encode(array("Signup_Status" => $res), JSON_PRETTY_PRINT);
        }
        
    }

    
    // close the connection
    mysqli_close($con);
    // -----------
};
?>