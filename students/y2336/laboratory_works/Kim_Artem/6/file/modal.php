<div class="modal fade" id="editModal<?=$value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow">
      <div class="modal-header">
        

      </div>
      <div class="modal-body">
        <form action="?id=<?=$value['id'] ?>" method="post">
        	<div class="form-group">
        		<input type="text" class="form-control" name="edit_name" value="<?=$value['name'] ?>" placeholder="Имя">
        	</div>
          <div class="form-group">
        		<input type="text" class="form-control" name="edit_age" value="<?=$value['age'] ?>" placeholder="Возраст">
        	</div>
          <div class="form-group">
        		<input type="text" class="form-control" name="edit_position" value="<?=$value['position'] ?>" placeholder="Должность">
        	</div>
          <div class="form-group">
        		<input type="text" class="form-control" name="edit_salary" value="<?=$value['salary'] ?>" placeholder="Зарплата">
        	</div>
        	<div class="modal-footer">
        		<button type="submit" name="edit-submit" class="btn btn-primary">Обновить</button>
        	</div>
        </form>	
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="deleteModal<?=$value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow">
      <div class="modal-header">
        

      </div>
      <div class="modal-footer">
        <form action="?id=<?=$value['id'] ?>" method="post">
        
        <button type="submit" name="delete_submit" class="btn btn-danger">Удалить</button>
    	</form>
      </div>
    </div>
  </div>
</div>