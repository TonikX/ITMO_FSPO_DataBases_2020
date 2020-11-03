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
<p>Информация о количестве символов в названии книг</p>
<table class="table-striped" frame="border">

  <?php $query = "select book.name, length(book.name)from book";
  $result = pg_query($db, $query);
  for ($data=[]; $count = pg_fetch_assoc($result); $data[] = $count); ?>
    <thead>
      <tr>
      <th>Name</th>
      <th>Length</th>
      </tr>
    </thead>

<?php foreach ($data as $row) { ?>
<tbody>
        <tr>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['length'];?></td>

        </tr>
        </tbody>

      <?php } ?>
        </table>

      </div>
  </body>
</html>
