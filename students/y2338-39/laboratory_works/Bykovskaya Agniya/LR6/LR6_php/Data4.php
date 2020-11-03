<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title> Library</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'Biblioteka';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
?>
<div class="container">
<p>Информация о читателях библиотеки и количестве посещений</p>
<table class="table-striped" frame="border">

  <?php $query = "select reader.fio, reader.date_of_birth, visit.room_number, visit.number_visited
  from reader JOIN visit ON reader.nomer_chit_bileta = visit.nomer_chit_bileta";
  $result = pg_query($db, $query);
  for ($data=[]; $count = pg_fetch_assoc($result); $data[] = $count); ?>
    <thead>
      <tr>
      <th>FIO</th>
      <th>Date of birth</th>
      <th>Room number</th>
      <th>Number visited</th>
      </tr>
    </thead>

<?php foreach ($data as $row) { ?>
<tbody>
        <tr>
          <td><?php echo $row['fio'];?></td>
          <td><?php echo $row['date_of_birth'];?></td>
          <td><?php echo $row['room_number'];?></td>
          <td><?php echo $row['number_visited'];?></td>

        </tr>
        </tbody>

      <?php } ?>
        </table>

      </div>
  </body>
</html>
