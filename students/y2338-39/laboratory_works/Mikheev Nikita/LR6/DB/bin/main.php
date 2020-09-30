<div id="ShowTableBlock">
<div id="HeadTable"> </div>


<div id="FootTable"> </div>
</div>
<?php 
include 'dbConnection.php';

	
	$stmt = $pdo->query("SELECT table_name
FROM information_schema.tables
WHERE table_schema = 'public';");

while($row=$stmt->fetch(PDO::FETCH_NUM)) { ?>
	
	
	<script>
	var tableObject = document.createElement("div");
	var test = document.getElementById('test');
	var name = '<?= $row[0];?>';
	var nameOfObject = tableObject.innerHTML="<p class=\"tableName\">"+name+"</p>"
	$(tableObject).insertBefore($("#FootTable"))

	</script>
	<?php
	
};	?>	

<script>

	

	$( ".tableName" ).click(function(){
	$("#HeadTable").append("<img id='BackButton' remv='tables' src='image/back.png' width='30' htight='30'></img>")
	$ (".tableName").remove();
  $.ajax({
		type: "POST",
		url: "bin/loadRows.php",
		data: { value:$(this).html()},
		success: function(data) {
			console.log(data);
			$(data).insertBefore($("#FootTable"))
			

		}
	});
	});	
	
	
</script>