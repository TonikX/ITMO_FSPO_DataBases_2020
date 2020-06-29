<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");


$font_family = 'Arial, Helvetica, sans-serif';
$font_size = '15px';
$border = '1px solid';
?>


table{
  width: 70%;
}
 th, td{
    font-family: <?=$font_family?>;
    font-size: <?=$font_size?>;
    color: #00000;
    border: 1px solid;
    padding-bottom: 0;
    vertical-align: top;
}
tablee {
margin: 8px;
}

tht {
font-family: <?=$font_family?>;
font-size: <?=$font_size?>;
color: #00000;
padding: 10px  10px 6px;
margin: 0 5 0;
border-collapse: separate;
}

tdt {
font-family: <?=$font_family?>;
font-size: 16px;
color: #00000;
padding: 2px  10px 6px;
border-collapse: separate;
}

th {
  padding-right: 45px;
  text-align: right;
  width: 20%;
}
td {
  width: 15%;
}
alltable{
  margin: 20px 30px 0px 0px;
}