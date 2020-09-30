<?php
include 'func.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col mt-1">
				<!--<?=$success ?>-->
				
				<table class="table shadow ">
					<thead class="thead-dark">
						<tr>
							<th>id</th>
							<th>Название</th>
							<th>Цена</th>
						</tr>
						<?php foreach ($result as $value) { ?>
						<tr>
							<td><?=$value['id_phone'] ?></td>
							<td><?=$value['name'] ?></td>
							<td><?=$value['price'] ?></td>
							<p></p>
							<td>
								<a href="?edit=<?=$value['id_phone'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?=$value['id_phone'] ?>"><i class="fa fa-edit"></i></a> 

								<a href="?delete=<?=$value['id_phone'] ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?=$value['id_phone'] ?>"><i class="fa fa-trash"></i></a>
								<?php require 'modal.php'; ?>
							</td>
						</tr> <?php } ?>
					</thead>
				</table>
			</div>
		</div>
	</div>
	<div class="modal fade" tabindex="-1" role="dialog" id="Modal">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content shadow">
	      <div class="modal-header">
	        <h5 class="modal-title">Добавить продукт</h5>
	
	      </div>
	      <div class="modal-body">
	        <form action="" method="post">
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="name" value="" placeholder="Название">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="price" value="" placeholder="Цена">
	        	</div>
	      </div>
	      <div class="modal-footer">
	     
	        <button type="submit" name="submit" class="btn btn-primary">Добавить</button>
	      </div>
	  		</form>
	    </div>
	  </div>
	</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
</body>
</html>