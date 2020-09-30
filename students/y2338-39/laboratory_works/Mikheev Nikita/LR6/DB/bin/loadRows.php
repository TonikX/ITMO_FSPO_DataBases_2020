<div id="RowsOfTablediv">
<table id="RowsOfTable">

</table>
<button id="AddNewRow">add</button>
<div>
<?php 
include "dbConnection.php";
$tbname = $_POST['value'];
//$tbname="Teacher";
showRows($tbname,$pdo);

function showRows($Tablename,$pdo){

$stmt = $pdo->query("select * from \"$Tablename\";");
$iteration =1;
?>

<script>

var table = document.getElementById("RowsOfTable");
var headerRow= table.insertRow(0);
i=0;
</script>
<?php
$headers =  $pdo->query("select column_name
from information_schema.columns 
where table_name = '$Tablename';");
while($row = $headers->fetch(PDO::FETCH_NUM) ) {
?>
<script>


headerRow.insertCell(i).innerHTML='<?= $row[0];?>';
i++;
</script>

<?php
}

?>

<?php 
while ($row = $stmt->fetch(PDO::FETCH_NUM)) { 
	$size = count($row); ?>

<script>
var iteration= <?= $iteration;?>;
var myrow= table.insertRow(iteration);
</script>

<?php

for($i=0;$i<$size;$i++) {
	
	?>
	
	<script>
	var i = <?= $i;?>;
	var cell = myrow.insertCell(i);
	var qry_data='<?= $row[$i];?>';
	if (qry_data=="") qry_data="null";
	cell.innerHTML=qry_data ;
	var a=[];
	a = $( "#RowsOfTable tr:first td" ).toArray();
	
	cell.setAttribute("column", a[i].innerHTML);
	
	</script>
	
	<?php } 
$iteration++;?>
<script> 
++i;
var deleteCell=myrow.insertCell(i);
deleteCell.innerHTML="<img src='image/delete.png' width='50' height='30'></img>";
deleteCell.classList.add("deleteButton");
var UpdateCell=myrow.insertCell(i);
UpdateCell.innerHTML="<img src='image/reload.png' width='30' height='30'></img>";
UpdateCell.classList.add("UpdateButton");
/*deleteCell.onclick=function() { 
	

	
   DeleteElement();
  };*/
</script>
<?php		
} ?>
<script>


var TName = '<?= $Tablename;?>';
/*
$(".deleteButton").click(function(){
	
	alert('hello! 22');
});	*/

$("#RowsOfTable").attr("tag",TName);
$(".deleteButton").click(function(){
	
		
	
		var children = $(this).parent().children();
		var TbName=$(this).parents("#RowsOfTable").attr('tag')
		console.log(children.length);
		var whereQuery="where ";
		for (i=0;i<children.length-2;i++) {
			if (i!=0) whereQuery= whereQuery + " and ";
		whereQuery= whereQuery + "\""+$(children[i]).attr('column')+"\" = '"+$(children[i]).text()+"'";
		}
	// $("#RowsOfTable").remove();
		//$(this).parent().hide();
	
		console.log(whereQuery);
		 $.ajax({
		type: "POST",
		url: "bin/deleteRow.php",
		data: { 'table':TbName,'qry':whereQuery},
		success: function(data) {
			
			
			
			var val = '<?= $_POST['value'];?>';
	 $.ajax({
		type: "POST",
		url: "bin/loadRows.php",
		data: {value:val },
		success: function(data) {
			
			$("#RowsOfTablediv").remove();
			$(data).insertBefore($("#FootTable"))
		}
	});
		}
	});
	
		console.log(whereQuery);
 
	});	

$("#AddNewRow").click(function(){
	var TabName=$(".deleteButton").parents("#RowsOfTable").attr('tag');
	
	$("#RowsOfTablediv").remove();
	var val = '<?= $_POST['value'];?>';
	 $.ajax({
		type: "POST",
		url: "bin/addNewRow.php",
		data: {'tbl':TabName,value:val},
		success: function(data) {
			$("#BackButton").attr('remv','rows');
			$(data).insertBefore($("#FootTable"));
			
		}
	});
	
});

$(".UpdateButton").click(function(){
	var TabName=$(".deleteButton").parents("#RowsOfTable").attr('tag')
	var test = $(this).parent().children();
	console.log(test);
	
	$("#RowsOfTablediv").remove();
	var size = test.length-2;
	var name = "";
	var value = "";
	for (i=0;i<size;i++) {
		if (i!=0) {
			name+="_";
			value+="_";
			
		}
		name+=$(test[i]).attr('column');
		value+=$(test[i]).text();
	}
	
	/*console.log(size);
	console.log(name);
	console.log(value);*/
	var val = '<?= $_POST['value'];?>';
	
	 $.ajax({
		type: "POST",
		url: "bin/UpdateRow.php",
		data: {'table':TabName,'size':size,'names':name,'values':value,'value22':val},
		success: function(data) {
			$("#BackButton").attr('remv','rows');
			$(data).insertBefore($("#FootTable"))
		}
	});
});

function DeleteElement(table,_indificator,_value){
	
	alert("Hello!");
}

$("#BackButton").click(function(){
	
	if ($("#BackButton").attr("remv")=='tables') {
			$("#ShowTableBlock").remove();

$.ajax({
		type: "POST",
		url: "bin/main.php",
		data: {},
		success: function(data) {
			
			$( "body" ).append(data);

		}
	});
		
	}

});
</script>
<?php

}
?>
