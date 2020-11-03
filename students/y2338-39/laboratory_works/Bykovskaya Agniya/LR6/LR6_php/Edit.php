<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="Change">
    <h5> Изменение данных</h5>
<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'Biblioteka';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");


if (isset( $_GET['ed'])){
  ?>

    <table>
      <tbody>
  <tr>
      <form action="Change.php" method="post">
      <td><input type="text" class="form-control" placeholder = "Name" name = "name"></td>
      <td><input type="text" class="form-control" placeholder = "Author" name = "author"></td>
      <td><input type="text" class="form-control" placeholder = "Publishing_house" name = "publishing_house"></td>
      <td><input type="date" class="form-control" placeholder = "Year_publishing" name = "year_publishing"></td>
      <td><input type="text" class="form-control" placeholder = "Section" name = "section"></td>
      <td><input type="number" class="form-control" placeholder = "Chislo_exempl_v_kajdom_zale" name = "chislo_exempl_v_kajdom_zale"></td>
      <input type="hidden" name="shifr_knigi" value="<?php echo $_GET['ed']; ?>">
      <td><input type="submit" class="btn btn-info" value="Edit" name="edit"></td>
    </form>

</tr>
</tbody>
</table>
<?php } ?>

</div>
</body>
