<!DOCTYPE HTML>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="style/style.css">
<html>
 <head>
  <title>SITE</title>
  <meta charset="utf-8">
  
 </head>
 <body>

  

 </body>
</html>

<script>
	

$( document ).ready(function() {
    
	$.ajax({
		type: "POST",
		url: "bin/main.php",
		data: {},
		success: function(data) {
			
			$( "body" ).append(data);

		}
	});
	
});

</script>