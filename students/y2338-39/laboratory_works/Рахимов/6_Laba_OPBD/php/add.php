<!DOCTYPE html>
<html>
  <head>
    <title>Inteface for my database</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body background="https://w-dog.ru/wallpapers/12/5/524401033179809/kniga-stol-makro.jpg">
    <table class="table table-striped" frame="border">
    <thead>
<?php
$dbuser = 'postgres';
$dbpass = '123';
$host = '192.168.64.1';
$dbname='Bibl';
$db = pg_connect("host=$host port=5433 dbname=$dbname user=$dbuser password=$dbpass");
  if (isset($_POST['b'])) {
    ?>
          <tr>
            <th> ID </th>
            <th> name </th>
            <th> date edition </th>
            <th> author </th>
            <th> number instance </th>
            <th> date created </th>
            <th> delete </th>
            <th> change </th>
          </tr>
    <?php

    $query = "select * from book";
    $result = pg_query($db, $query);
    $count = pg_num_rows($result);
    for($i = 1; $i <= $count; $i++){
      echo '<tr>';
      $query = "select * from book where id_book = " .$i;
      $result = pg_query($db, $query);
      $result = pg_fetch_row($result);
      $temp = 1;
      foreach($result as $value) {
          ?>
                  <form method="POST" action="insert.php" >
                  <td><input name="<?= $temp ?>" type="text" class="form-control" value="<?= $value ?>" </td>
          <?php
          $temp++;
         }?>
            <td><button class="btn btn-danger" type="submit" name="del">Delete</button> </td>
            <td><button class="btn btn-primary" type="submit" name="ch">Change</button> </td>

        </form>
        </tr>
    <?php }
    if($i=$count){
      ?>
      <tr>
          <form method="POST" action="insert.php" >
        <th><input type="text" class="form-control" value="ID" name="id_book"> </th>
        <th><input type="text" class="form-control" value="name" name="name"> </th>
        <th> <input type="text" class="form-control" value="date edition"name="de"></th>
        <th> <input type="text" class="form-control" value="authors" name="aut"> </th>
        <th> <input type="text" class="form-control" value="number instance" name="ni"></th>
        <th><input type="text" class="form-control" value="date created"name="dc"> </th>
        <th> <input type="submit"  class="btn btn-success" value="create" name="sub"></th>
      </form>
      </tr>
    </thead>
    </table>
    </body>
  </html>
      <?php
    }
  }
  elseif (isset($_POST['readers'])) {
    ?>
          <tr>
            <th> number ticket </th>
            <th> name </th>
            <th> address </th>
            <th> number phone </th>
            <th> date birthday </th>
            <th> education </th>
            <th> number passport</th>
            <th> delete </th>
            <th> change </th>
          </tr>
    <?php

    $query = "select * from reader";
    $result = pg_query($db, $query);
    $count = pg_num_rows($result);
    for($i = 1; $i <= $count; $i++){
      echo '<tr>';
      $query = "select * from reader where number_ticket = " .$i;
      $result = pg_query($db, $query);
      $result = pg_fetch_row($result);
      $temp = 1;
      foreach($result as $value) {
          ?>
                  <form method="POST" action="insert1.php" >
                  <td><input name="<?= $temp ?>" type="text" class="form-control" value="<?= $value ?>" </td>
          <?php
          $temp++;
         }?>
            <td><button class="btn btn-danger" type="submit" name="del">Delete</button> </td>
            <td><button class="btn btn-primary" type="submit" name="ch">Change</button> </td>

        </form>
        </tr>
    <?php }
    if($i=$count){
      ?>
      <tr>
          <form method="POST" action="insert1.php" >
        <th><input type="text" class="form-control" value="number ticket" name="nt"> </th>
        <th><input type="text" class="form-control" value="name" name="name"> </th>
        <th> <input type="text" class="form-control" value="address"name="ad"></th>
        <th> <input type="text" class="form-control" value="number phone" name="np"> </th>
        <th> <input type="text" class="form-control" value="date birthday" name="db"></th>
        <th><input type="text" class="form-control" value="education"name="ed"> </th>
        <th> <input type="text" class="form-control" value="number passport" name="npas"> </th>
        <th> <input type="submit"  class="btn btn-success" value="create" name="sub"></th>
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
