<!DOCTYPE html>
<html>
  <head>
    <title>Продажа масел || Лабораторная работа студента ******* *******</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <table class="table table-striped" frame="border">
    <thead>
<?php
$dbuser = 'postgres';//данные для подключения
$dbpass = '123';//данные для подключения
$hostname = 'localhost';//данные для подключения
$database_name='project';//данные для подключения
$db = pg_connect("host=$hostname port=5433 dbname=$database_name user=$dbuser password=$dbpass");//подключение
  if (isset($_POST['oil'])) {//если пришли за маслом - выводим масло
    ?>
    <form method="POST" action="add.php" >
      <button class="btn btn-info" type="submit" name="oil">Обновить</button>
    </form>
          <tr>
            <th> Артикул </th>
            <th> Название </th>
            <th> Цена </th>
            <th> Наличие </th>
            <th> Удалить </th>
            <th> Изменить </th>
          </tr>
    <?php

    $query = "select * from oils";
    $result = pg_query($db, $query);
    $count = pg_num_rows($result);
    for($i = 1; $i <= $count; $i++){ //цикл первый аргумент счетчик, второй условие - до тех пор пока не тсанет равно колву записей, третье действие в конце каждой итерации
      echo '<tr>';
      $query = 'select * from oils where id = ' .$i;
      $result = pg_query($db, $query);
      $result = pg_fetch_row($result);
      $temp = 1;
      foreach($result as $value) {
          ?>
                  <form method="POST" action="insert_oil.php" >
                  <td><input name="<?= $temp ?>" type="text" class="form-control" value="<?= $value ?>" </td>
          <?php
          $temp++;
          //в коде ниже отправляемся с пост запросом на удаление или изменение
         }?>
            <td><button class="btn btn-danger" type="submit" name="delete">Удалить</button> </td>
            <td><button class="btn btn-primary" type="submit" name="change">Изменить</button> </td>

        </form>
        </tr>
    <?php }
    if($i=$count){
      //в коде ниже отправляемся с пост запросом на добавление
      ?>
      <tr>
          <form method="POST" action="insert_oil.php" >
            <th><input type="text" class="form-control" value="ID" name="1"> </th>
            <th><input type="text" class="form-control" value="Name" name="2"> </th>
            <th> <input type="text" class="form-control" value="Cost" name="3"></th>
            <th> <input type="text" class="form-control" value="Count" name="4"> </th>
            <th> <button class="btn btn-primary" type="submit" name="add">Добавить</button> </th>
          </form>
      </tr>
    </thead>
    </table>
    </body>
  </html>
      <?php
    }
  }
  elseif (isset($_POST['orders'])) {
    ?>
    <form method="POST" action="add.php" >
      <button class="btn btn-info" type="submit" name="orders">Обновить</button>
    </form>
          <tr>
            <th> Номер </th>
            <th> Артикул </th>
            <th> Имя заказчика </th>
            <th> Телефон </th>
            <th> Удалить </th>
            <th> Изменить </th>
          </tr>
    <?php

    $query = "select * from orders";
    $result = pg_query($db, $query);
    $count = pg_num_rows($result);
    for($i = 1; $i <= $count; $i++){
      echo '<tr>';
      $query = 'select * from orders where id = ' .$i;
      $result = pg_query($db, $query);
      $result = pg_fetch_row($result);
      $temp = 1;
      foreach($result as $value) {
          ?>
                  <form method="POST" action="insert_order.php" >
                  <td><input name="<?= $temp ?>" type="text" class="form-control" value="<?= $value ?>" </td>
          <?php
          $temp++;
          //в коде ниже отправляемся с пост запросом на удаление или изменение
         }?>
            <td><button type="submit" name="delete">Удалить</button> </td>
            <td><button type="submit" name="change">Изменить</button> </td>

        </form>
        </tr>
    <?php }
    if($i=$count){
      //в коде ниже отправляемся с пост запросом на добавление
      ?>
      <tr>
          <form method="POST" action="insert_order.php" >
        <th><input type="text" class="form-control" value="ID" name="1"> </th>
        <th><input type="text" class="form-control" value="ID_oils" name="2"> </th>
        <th> <input type="text" class="form-control" value="Customer_Name" name="3"> </th>
        <th> <input type="text" class="form-control" value="Phone" name="4"></th>
        <th> <button class="btn btn-primary" type="submit" name="add">Добавить</button> </th>
      </form>
      </tr>
    </thead>
    </table>
    </body>
  </html>
      <?php
    }
  }
  ?>
