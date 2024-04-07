(( iterate an array using array_map))
<p></p>

<!-- Sometimes two arrays of the same length need to be iterated together -->
<?php

$people = ['IA','abo','ahmad'];
$foods = ['chicken', 'beef', 'pizaa'];

// array_map("ahmad", "pizaa");

$result = array_map(
    function($people, $foods){
        return "$people Likes $foods <br>";
    },$people, $foods);

    // implode : Fetchig single value
    echo implode($result);

    echo "<br>";
?>

<!-- 
- IA likes chicken
- abo likes beef
- ahmad likes pizaa 
-->


<?php

$numbers = [1,2,3,4,5];

// array_map("ahmad", "pizaa");

$sum = array_map( 
    
    function($numbers){
        return $numbers + $numbers ."<br>";
    }, $numbers);

    // implode : Fetchig single value
    echo implode($sum);
?>

<!-- 
1
4
9
16
25
-->