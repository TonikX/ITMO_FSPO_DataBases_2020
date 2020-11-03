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
<p>Информация о книгах, которые ещё никогда не брали в библиотеке</p>
<table class="table-striped" frame="border">

  <?php $query = "select distinct * from book where not shifr_knigi = any (select shifr_knigi from poluchenie_knigi)";
  $result = pg_query($db, $query);
  for ($data=[]; $count = pg_fetch_assoc($result); $data[] = $count); ?>
    <thead>
      <tr>
        <th>Shifr_knigi</th>
        <th>Name</th>
        <th>Author</th>
        <th>Publishing_house</th>
        <th>Year_publishing</th>
        <th>Section</th>
        <th>Chislo_exempl_v_kajdom_zale</th>
      </tr>
    </thead>

<?php foreach ($data as $row) { ?>
<tbody>
        <tr>
          <td><?php echo $row['shifr_knigi'];?></td>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['author'];?></td>
          <td><?php echo $row['publishing_house'];?></td>
          <td><?php echo $row['year_publishing'];?></td>
          <td><?php echo $row['section'];?></td>
          <td><?php echo $row['chislo_exempl_v_kajdom_zale'];?></td>
        </tr>
        </tbody>

      <?php } ?>
        </table>

      </div>
  </body>
</html>
