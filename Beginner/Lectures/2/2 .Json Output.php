((Non-HTML output from web server))
<?php 


header("Content-type: application/json");

// Creating array list to show as json Data
$Data = [
    "Status" => "Completed",
    "Repsone" => "Hello World"
];


//echo json_encode($Data);


// Key : Value

//  [

//     "Response" : "Hello World",
// ] 
echo json_encode($Data["Status"]); // "Completed"
?>


OR


<?php 

header("Content-Type: text/plain");
echo "World";

?>
