<!DOCTYPE html>
<html lang="en">
<head>
	<title> CLINIC INTERFACE </title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
  $dbuser = 'postgres';
  $dbpass = '1234';
  $host = 'localhost';
  $dbname = 'clinic';
  $db = pg_connect("host = $host port = 5432 dbname = $dbname user = $dbuser password = $dbpass");
  if (isset($_POST['pat'])) {
		echo '<p>PATIENTS</p>
		<table class="table table-striped" frame="border">
		<thead>
    <tr>
      <th> ID </th>
      <th> NAME </th>
      <th> GENDER </th>
      <th> DOB </th>
      <th> ADDRESS </th>
      <th> PHONE </th>
    </tr>
		';
      $query = "select * from clinic.medical_card";
      $result = pg_query($db, $query);
      $count = pg_num_rows($result);
      for ($i = 1;$i <= $count; $i++) {
        echo '<tr>';
        $query = "select * from clinic.medical_card where mc_id = " .$i;
        $result = pg_query($db, $query);
        $result = pg_fetch_row($result);
        $temp = 1;
        foreach($result as $value) {
          ?>
          <form method="POST" action="insertfirst.php" >
            <td><input name="<?= $temp ?>"type="text" class="form-control"
              value="<?=$value?>" </td>
              <?php
              $temp++;
            }?>
						<td><button class="btn btn-danger" type="submit" name="del">Delete</button> </td>
            <td><button class="btn btn-primary" type="submit" name="ch">Change</button> </td>
          </form>
        </tr>
      <?php }
      if ($i = $count) {
         ?>
         <form method="POST" action="insertfirst.php" >
        <th><input type="text" class="form-control" value="ID" name="mc_id"> </th>
        <th><input type="text" class="form-control" value="name" name="mc_full_name"> </th>
        <th> <input type="text" class="form-control" value="gender"name="mc_gender"></th>
        <th> <input type="text" class="form-control" value="DoB" name="mc_dob"> </th>
        <th> <input type="text" class="form-control" value="address" name="mc_address"></th>
        <th><input type="text" class="form-control" value="phone"name="mc_phone_num"> </th>
        <th> <input type="submit"  class="btn btn-success" value="create" name="sub"></th>
      </form>
<?php
}
}
elseif (isset($_POST['doc'])) {
echo '
<p> DOCTORS: </p>
<table class="table table-striped" frame="border">
<thead>
 <tr>
 <th> ID </th>
 <th> NAME </th>
 <th> GENDER </th>
 <th> DOB </th>
 <th> EDUCATION </th>
 <th> PROFESSION </th>
 <th> PHONE </th>
 <th> ADDRESS </th>
</tr>
';
$query = "select * from clinic.doctor";
$result = pg_query($db, $query);
$count = pg_num_rows($result);
for ($i = 1;$i <= $count; $i++) {
	echo '<tr>';
	$query = "select * from clinic.doctor where d_id = " .$i;
	$result = pg_query($db, $query);
	$result = pg_fetch_row($result);
	$temp = 1;
	foreach($result as $value) {
		?>
		<form method="POST" action="insertsecond.php" >
			<td><input name="<?= $temp ?>"type="text" class="form-control"
				value="<?=$value?>" </td>
				<?php
				$temp++;
			}?>
			<td><button class="btn btn-danger" type="submit" name="del">Delete</button> </td>
			<td><button class="btn btn-primary" type="submit" name="ch">Change</button> </td>
		</form>
	</tr>
<?php }
if ($i = $count) {
  ?>
  <tr>
    <form method = "post" action="insertsecond.php" >
      <th><input type="text" class="form-control" value="ID" name="d_id"> </th>
      <th><input type="text" class="form-control" value="name" name="d_full_name"> </th>
      <th> <input type="text" class="form-control" value="gender"name="d_gender"></th>
      <th> <input type="text" class="form-control" value="DoB" name="d_dob"> </th>
      <th> <input type="text" class="form-control" value="education" name="d_education"> </th>
      <th> <input type="text" class="form-control" value="profession" name="d_profession"> </th>
			<th><input type="text" class="form-control" value="phone"name="d_phone_num"> </th>
      <th> <input type="text" class="form-control" value="address" name="d_address"></th>
      <th> <input type="submit"  class="btn btn-success" value="create" name="sub"></th>
    </form>
  </tr>
<?php
}
}
elseif (isset($_POST['cab'])) {
echo '
	<p> CABINETS: </p>
	<table class="table table-striped" frame="border">
	<thead>
 <tr>
 <th> NUMBER </th>
 <th> OPENS </th>
 <th> CLOSES </th>
 <th> PHONE </th>
</tr>
';
$query = "select * from clinic.cabinet";
$result = pg_query($db, $query);
$count = pg_num_rows($result);
for ($i = 1;$i <= $count; $i++) {
	echo '<tr>';
	$query = "select * from clinic.cabinet where c_number = " .$i;
	$result = pg_query($db, $query);
	$result = pg_fetch_row($result);
	$temp = 1;
	foreach($result as $value) {
		?>
		<form method="POST" action="insertthird.php" >
			<td><input name="<?= $temp ?>"type="text" class="form-control"
				value="<?=$value?>" </td>
				<?php
				$temp++;
			}?>
			<td><button class="btn btn-danger" type="submit" name="del">Delete</button> </td>
			<td><button class="btn btn-primary" type="submit" name="ch">Change</button> </td>
		</form>
	</tr>
<?php }
if ($i = $count) {
  ?>
  <tr>
    <form method = "post" action="insertthird.php" >
      <th><input type="text" class="form-control" value="number" name="c_number"> </th>
      <th><input type="text" class="form-control" value="start" name="c_wt_start"> </th>
      <th> <input type="text" class="form-control" value="end"name="c_wt_end"></th>
      <th> <input type="text" class="form-control" value="phone" name="c_phone_num"> </th>
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
