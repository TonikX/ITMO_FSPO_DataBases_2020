<?php

session_start();

$_SESSION['code'] = 2437; // Session

$a = 10; // int
$b = 'text'; // string
$d = 0.11; // float
$c = true; // bool

$array; // Array

for ($i = 0; $i < 10; $i++) { // Cycle FOR
  $array[] = $i;
}

function userFunc($arr) { // Custom func

  for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i] === 0) {
      echo $arr[$i] . ' - Ноль<br>';
    } else if ($arr[$i] % 2 === 0) {
      echo $arr[$i] . ' - Четное число<br>';
    } else {
      echo $arr[$i] . ' - Нечетное число<br>';
    }
  }

}

userFunc($array); 

switch ($array[0]) { // SWITCH
  case 0:
    echo 'SWITCH - 0<br>';
    break;
  
  default:
    echo 'SWITCH - DEFAULT<br>';
    break;
}

while ($a < 20) { // WHILE
  echo $a . ' ';
  $a++;
}

?>
