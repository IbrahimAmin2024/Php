(( Alternative Syntax for Control Structures Statment Conditions))
<p></p>

<!-- Syntax
• structure: /* code */ endstructure; 

- for (normal for loop)
- while
- foreach
- switch
- if / elseif / else
-->

<!-- 
$i++ (+1) | $i-- (-1)
i+= 2 (+2) | i-= 2 (-2)
i= i + 3 (+3) | i= i - 3 (-3)
 -->
<?php
$start = 0;
$end = 10;

$items = [1,2,3,4,5,6,7,8,9,10];
// -) 1 for
// for (start; end; + or -)
// for ($i = $start; $i <= $end; $i++) :
//     echo "Number : " .$i ."<br>";
// endfor

// -) 2 while
// while (condtion) :
// endwhile

// while($start < $end):
// $start+= 1;
// echo "Value : " . $start ."<br>";
// endwhile


// -) 3 foreach
// foreach ($items as $itemo):
// echo "Item Number : " .$itemo ."<br>";
// endforeach;    

// -) 4 switch
// switch (condition) :
    // case 1:
    //    codes
    // break;
    // case 2:
    // break;
  // default
   //     codes
   // endswitch;

// switch ($items[15]):
//     case 1:
//         echo "Item 1";
//         break;
//     case 2:
//         echo "Item 2";
//         break;
//     default:
//         echo "not found";
//         break;

// endswitch; 

// -) 5 if
// if ($condition){
//     // codes
// }elseif ($condition){
//     // codes
// }else{
//     // codes
// }

if ($items[0] == 54){
    // codes
    echo "right it's equals : 1";
}elseif ($items[1] == 10){
    // codes
    echo "right it's equals : 10";
}else{
    // codes
    echo "No result";
}
?>