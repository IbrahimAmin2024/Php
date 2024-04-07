(( Check if key exists))
<p></p>

<!--  -->
<?php

// $listo = [
//     key=>value
// ];

$listo = [
    'name' => 'IA', // string
    'age' => 27,
    'gender' => 'Male',

];
// Check if key exists

//$result = array_key_exists('name', $listo); //true => 1
$result = isset($listo['name']); //true => 1 || Heigh recommended , if not found return as null
//$result = !empty($listo['name']); //true => 1

echo $result; // true

echo "<br><br>";

$check_arrays = array_keys($listo); // False forth array not found

echo isset($check_arrays[2]); // null empty if [null] > 2, else will show ture eqials 1

echo "<br><br>";

$listo2 = ["banna", 'apple', 'pear'];
echo in_array('pear', $listo2); // if exist will be 1 => true, else false => null | empty

echo "<br><br>";

$user_db = 
[


    [
        "user_id" => "1",
        "type" => "Admin",
        "url" => "localhost/test.php?id=1&png=1.png"
    ],

    [
        "user_id" => "2",
        "type" => "manager",
        "url" => "localhost/test.php?id=2&png=2.png"
    ],

    [
        "user_id" => "3",
        "type" => "vendor",
        "url" => "localhost/test.php?id=3&png=3.png"
    ],


    [
        "user_id" => "4",
        "type" => "user",
        "url" => "localhost/test.php?id=4&png=4.png"
    ]

];


echo array_search("4", array_column($user_db, "user_id")); // true[column rows], false[empty, null]
?>