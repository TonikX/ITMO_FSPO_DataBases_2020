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
<p>Информация обо всех выданных книгах</p>
<table class="table-striped" frame="border">

  <?php $query = "select shifr_knigi, name, author from book where book.shifr_knigi in (select poluchenie_exemplyara_knigi.shifr_knigi from Poluchenie_exemplyara_knigi
   where Poluchenie_exemplyara_knigi.Shifr_knigi in (select Poluchenie_knigi.Shifr_knigi from Poluchenie_knigi))";
  $result = pg_query($db, $query);
  for ($data=[]; $count = pg_fetch_assoc($result); $data[] = $count); ?>
    <thead>
      <tr>
        <th>Shifr_knigi</th>
        <th>Name</th>
        <th>Author</th>
      </tr>
    </thead>

<?php foreach ($data as $row) { ?>
<tbody>
        <tr>
          <td><?php echo $row['shifr_knigi'];?></td>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['author'];?></td>
        </tr>
        </tbody>

      <?php } ?>
        </table>

      </div>
  </body>
</html>
