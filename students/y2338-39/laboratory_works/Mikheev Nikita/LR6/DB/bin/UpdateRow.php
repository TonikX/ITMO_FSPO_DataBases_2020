<div id ="Updatediv">
<form id="UpdateForm"> </form>
<button id="UpdateButton">Apply</button>
</div>
<?php

$test = $_POST['names'];
$test2 = $_POST['values'];
$size = $_POST['size'];
$tableN=$_POST['table'];
$qry ="$test";

?>
<script>
var name = '<?= $test;?>';
var value = '<?= $test2;?>';
var names=name.split("_");
var values = value.split("_");


</script>


<?php



for($i=0;$i<$size;$i++) {
	
	?>
	<script>
	var i = '<?= $i;?>';
	$("#UpdateForm").append("<input type = '"+names[i]+"'  oldvalue = '"+values[i]+"'value='"+values[i]+"'>");
	</script>
	
		
<?php


}

?>

<script>

$("#UpdateButton").click(function(){


var inputs = $("#UpdateForm").children();	
var size = '<?= $size;?>'
var tblName = '<?= $tableN;?>'
var qry = "UPDATE \""+tblName+"\" SET "
for (i=0;i<inputs.length;i++) {
	if (i!=0) qry+=" , "
	qry+="\""+$(inputs[i]).attr('type') +"\" = '" +$(inputs[i]).val()+"'";
}	
qry+=" WHERE ";
for (i=0;i<inputs.length;i++) {
	if (i!=0) qry+=" AND "
	if ($(inputs[i]).attr('oldvalue')=='null') qry+="\""+$(inputs[i]).attr('type') +"\" is " +$(inputs[i]).attr('oldvalue');
	else qry+="\""+$(inputs[i]).attr('type') +"\" = '" +$(inputs[i]).attr('oldvalue')+"'";
	
}
$("#ShowTableBlock").show();
$("#Updatediv").remove();

var val = '<?= $_POST['value22'];?>';
$.ajax({
		type: "POST",
		url: "bin/UpdateQuery.php",
		data: {'qry':qry},
		success: function(data) {
			$.ajax({
		type: "POST",
		url: "bin/loadRows.php",
		data: {value:val },
		success: function(data) {
			
			$("#RowsOfTablediv").remove();
			$("#BackButton").attr("remv","tables");
			$(data).insertBefore($("#FootTable"));
		}
	});
		}
	});	
});
$("#BackButton").click(function(){
	
	if ($("#BackButton").attr("remv")=="rows") {
		var val = '<?= $_POST['value22'];?>';

	$.ajax({
		type: "POST",
		url: "bin/loadRows.php",
		data: {value:val },
		success: function(data) {
			$("#Updatediv").remove();
			$("#RowsOfTablediv").remove();
			$("#BackButton").attr("remv","tables");
			$(data).insertBefore($("#FootTable"));
		}
	});
		
	}
	
	
});
</script>