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
<p>Информация о книгах, которые были опубликованы в период с 16.07.1951 по 11.07.1960 </p>
<table class="table-striped" frame="border">

  <?php $query = "select shifr_knigi, name, author, year_publishing
  from book where year_publishing between '1951-07-16' and '1960-07-11'";
  $result = pg_query($db, $query);
  for ($data=[]; $count = pg_fetch_assoc($result); $data[] = $count); ?>
    <thead>
      <tr>
      <th>Shifr_knigi</th>
      <th>Name</th>
      <th>Author</th>
      <th>Year_publishing</th>
      </tr>
    </thead>

<?php foreach ($data as $row) { ?>
<tbody>
        <tr>
          <td><?php echo $row['shifr_knigi'];?></td>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['author'];?></td>
          <td><?php echo $row['year_publishing'];?></td>

        </tr>
        </tbody>

      <?php } ?>
        </table>

      </div>
  </body>
</html>
