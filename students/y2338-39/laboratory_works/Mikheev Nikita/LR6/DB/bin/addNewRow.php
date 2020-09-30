<div id="AddFormdiv">
<form id="AddForm">

</form>
<button id="Submit">Submit</button>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

var form = document.getElementById('AddForm');
 </script>
<?php 
$Tablename = $_POST['tbl'];
include "dbConnection.php";
//$Tablename = 'Teacher';

$headers =  $pdo->query("select column_name
from information_schema.columns 
where table_name = '$Tablename';");
while($row = $headers->fetch(PDO::FETCH_NUM) ) {
	?>
	
	<script>
	
	
	var name = '<?= $row[0];?>';
	var $element = "<input element=\""+name+"\" placeholder=\""+name+"\">";
	$("#AddForm").append($element);
	</script>
	
	
	
	<?php 
}


?>

<script>

$("#Submit").click(function(){
		$("#ShowTableBlock").show();
		
	var values = $("#AddForm").children();
	//console.log($(values[0]).val());
	var qry = " values ( ";
	for (i=0;i<values.length;i++) {
		if (i!=0) qry= qry+(",");
		qry=qry+" '"+$(values[i]).val()+"' ";
		
	}
	qry+= ")";
	console.log(qry);
	var val = '<?= $_POST['value'];?>';
	
	  $.ajax({
		type: "POST",
		url: "bin/NewRow.php",
		data: { 'qry':qry,'table':'<?= $Tablename;?>'},
		success: function(data) {
			
			
			$("#AddFormdiv").remove();
	 $.ajax({
		type: "POST",
		url: "bin/loadRows.php",
		data: {value:val },
		success: function(data) {
			
			$("#BackButton").attr("remv","tables");
			$(data).insertBefore($("#FootTable"));
		}
	});
		}
		
	});
	
});
$("#BackButton").click(function(){
	
	if ($("#BackButton").attr("remv")=="rows") {
		var val = '<?= $_POST['value'];?>';

	$.ajax({
		type: "POST",
		url: "bin/loadRows.php",
		data: {value:val },
		success: function(data) {
			$("#AddFormdiv").remove();
			$("#RowsOfTablediv").remove();
			$("#BackButton").attr("remv","tables");
			$(data).insertBefore($("#FootTable"));
		}
	});
		
	}
	
	
});

</script>