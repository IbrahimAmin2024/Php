(( Initializing an Array))
<p></p>

<!--  -->
<?php

//empty array
// $food = array();

// since use use php above 5.4
$food = [ 'apple'=> 'apple','banana'=> 'banana','orange'=> 'orange'];

$food['apple'] = 'pear';

echo implode("<br>" , $food);

echo "<br><br>";


$list =[];
$array_with_range = range(1,4);

for($i = 1; $i <= 4 ; $i++){
    $list[] = $i;

};

echo implode ("<br>",$list);

?>