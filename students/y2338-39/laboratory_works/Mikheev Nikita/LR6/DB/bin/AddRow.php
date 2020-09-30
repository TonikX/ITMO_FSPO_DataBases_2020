/* myP.onclick = function() {
	myP.style.visibility='hidden';
	<?php
	$stmt = $pdo->query("select * from \"Subject\";"); 
	
	while ($row = $stmt->fetch()) { ?>
	
	var ID = '<?= $row["id"];?>';
	var Name =  '<?= $row["Name"];?>';
	var idTeacher =  '<?= $row["idTeacher"];?>';
	var sooqa = document.getElementById("elem");
	var newDiv = document.createElement("div");
	newDiv.innerHTML = 
	"<h3> ID =" + ID + "</h3>"+
	"<h3 > NAME =" + Name + "</h3>"+
	"<h3> idTeacher = " + idTeacher + "</h3> ";
	document.body.insertBefore(newDiv,sooqa);
	<?php } ?>

}; */