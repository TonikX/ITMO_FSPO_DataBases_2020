<?php
session_start();
$i = 0;
$Names = array('first','second','third');
$count = 0;
function printArray($array, $arr,$count){
    while ($count != 3){
        echo $array[$arr[$count]];
        $count++;
    }                                                                                   
}

printArray($_SESSION,$Names, $count);                                                       
?>