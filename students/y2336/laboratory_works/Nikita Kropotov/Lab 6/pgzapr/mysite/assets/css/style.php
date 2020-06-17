<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");


$font_family = 'Arial, Helvetica, sans-serif';
$font_size = '15px';
$border = '1px solid';
?>


table.table{
    border: 1px solid;
}
 th, td{
    font-family: <?=$font_family?>;
    font-size: <?=$font_size?>;
    color: #00000;
    border: 1px solid;
}
tablee {
margin: 8px;
}

tht {
font-family: <?=$font_family?>;
font-size: <?=$font_size?>;
color: #00000;
padding: 10px  10px 6px;
border-collapse: separate;
}

tdt {
font-family: <?=$font_family?>;
font-size: 16px;
color: #00000;
padding: 2px  10px 6px;
border-collapse: separate;
}
