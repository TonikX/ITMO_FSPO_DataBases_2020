<!DOCTYPE html>
<html>
  <head>
    <title>Inteface for my database</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  
  <body>
    <table class="table table-striped" frame="border">
    <thead>
<?php
  $dbuser = 'v4lka004';
  $dbpass = 'gfhjkm004';
  $host = 'localhost';
  $dbname='bibl_final';
  $db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
  if (!isset($_GET["tab"]))
    header("Location: index.php");
  if ($_GET['tab'] == "books") {
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
      $stmt = $db->prepare($query);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php foreach($result as $index => $row) { ?>
    <form method="POST" action="insert.php" >
      <tr>
      <?php foreach($row as $key => $value) { ?>
        <td><input name="<?= $key ?>" type="text" class="form-control" value="<?= $value ?>"></td>
      <?php } ?>
        <td><button class="btn btn-danger" type="submit" name="del">Delete</button> </td>
        <td><button class="btn btn-primary" type="submit" name="ch">Change</button> </td>
      </tr>
    </form>
    <?php } ?>
    <form method="POST" action="insert.php" >
      <tr>
        <th><input type="text" disabled class="form-control" placeholder="ID" name="id_book" value="<?= end($result)["id_book"]+1 ?>"> </th>
        <th><input type="text" class="form-control" placeholder="name" name="name"> </th>
        <th> <input type="text" class="form-control" placeholder="date edition"name="year_edition"></th>
        <th> <input type="text" class="form-control" placeholder="authors" name="authors"> </th>
        <th> <input type="text" class="form-control" placeholder="number instance" name="number_instance"></th>
        <th><input type="text" class="form-control" placeholder="date created"name="date_create"> </th>
        <th> <input type="submit"  class="btn btn-success" placeholder="create" name="sub"></th>
      </tr>
    </form>
  
  <?php
  } elseif ($_GET['tab'] == "readers") {
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
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <form method="POST" action="insert1.php" >
  <?php foreach($result as $index => $row) { ?>
    <tr>
    <?php foreach($row as $key => $value) { ?>
      <td><input name="<?= $key ?>" type="text" class="form-control" value="<?= $value ?>"></td>
    <?php } ?>
      <td><button class="btn btn-danger" type="submit" name="del">Delete</button> </td>
      <td><button class="btn btn-primary" type="submit" name="ch">Change</button> </td>
    </tr>
  <?php } ?>
    <tr>
      <th><input type="text" class="form-control" placeholder="number ticket" name="number_ticket" disabled value="<?= end($result)["number_ticket"]+1 ?>"> </th>
      <th><input type="text" class="form-control" placeholder="name" name="fio"> </th>
      <th> <input type="text" class="form-control" placeholder="address"name="adress"></th>
      <th> <input type="text" class="form-control" placeholder="number phone" name="number_phone"> </th>
      <th> <input type="text" class="form-control" placeholder="date birthday" name="date_birh"></th>
      <th><input type="text" class="form-control" placeholder="education"name="education"> </th>
      <th> <input type="text" class="form-control" placeholder="number passport" name="number_pasport"> </th>
      <th> <input type="submit"  class="btn btn-success" placeholder="create" name="sub"></th>
    </tr>
  </form>
  <?php } ?>
  </thead>
  </table>
  </body>
</html>