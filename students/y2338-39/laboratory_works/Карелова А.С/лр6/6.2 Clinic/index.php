<!DOCTYPE html>
<html lang="en">
<head>
	<title> CLINIC INTERFACE </title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="header-h1"> CLINIC </h1>
	<ul>
	<form action="add.php" method="post">
		<button "btn btn-info" type="submit" name="pat">Patients</button>
		<button "btn btn-info" type="submit" name="doc">Doctors</button>
		<button "btn btn-info" type="submit" name="cab">Cabinets</button>
	</form>
</ul>
</div>
<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'clinic';
$db = pg_connect("host = $host port = 5432 dbname = $dbname user = $dbuser password = $dbpass");
echo '
<p> Appointment ID, doctor name and patient name: </p>
<table class="table table-striped" frame="border">
	<thead>
		<tr>
			<th> APPOINTMENT ID </th>
			<th> DOCTOR NAME </th>
			<th> PATIENT NAME </th>
</tr>
';
$query = "select a_id, d_full_name, mc_full_name FROM clinic.appointment,
clinic.doctor, clinic.medical_card WHERE a_doctor = d_id AND a_patient = mc_id ORDER BY a_id";
$result1 = pg_query($db, $query);
while($result = pg_fetch_row($result1)) {
	echo '<tr>';
	foreach ($result as $value)
		echo '<td><input type="text" class="form-control" value="' . $value . '" </td>';
	echo '</tr>';
}
echo '</thead></table>
';
echo '
</br></br>
<p> For how long did miosis patient not paid the bill: </p>
<table class="table table-striped" frame="border">
	<thead>
		<tr>
			<th> PATIENT ID </th>
			<th> PATIENT NAME </th>
			<th> HOW LONG NOT PAID </th>
</tr>
';
$query = "select a_patient, mc_full_name, age(clinic.payment.p_date_closed,clinic.payment.p_date_opened)
FROM clinic.payment, clinic.medical_card, clinic.appointment
WHERE a_diagnosis = 'miosis' AND a_patient = mc_id AND a_payment = p_id ORDER BY mc_id";
$result1 = pg_query($db, $query);
while($result = pg_fetch_row($result1)) {
	echo '<tr>';
	foreach ($result as $value)
		echo '<td><input type="text" class="form-control" value="' . $value . '" </td>';
	echo '</tr>';
}
echo '</thead></table>
';
echo '
</br></br>
<p> Bill was bigger than 1000 rubles: </p>
<table class="table table-striped" frame="border">
	<thead>
	<tr>
		<th> BILL NUMBER </th>
		<th> BILL SUM</th>
	</tr>
';
$query = "select p_id, max(p_sum) from clinic.payment GROUP BY p_id having max(p_sum) > 1000 ORDER BY p_id";
	$result1 = pg_query($db, $query);
	while($result = pg_fetch_row($result1)) {
		echo '<tr>';
		foreach ($result as $value)
			echo '<td><input type="text" class="form-control" value="' . $value . '" </td>';
		echo '</tr>';
	}
	echo '</thead></table>
	';
	echo '
	</br></br>
	<p> All registered patients, that did not have an appointment yet: </p>
	<table class="table table-striped" frame="border">
		<thead>
			<tr>
				<th> PATIENT ID </th>
				<th> PATIENT NAME </th>
				<th> PATIENT GENDER </th>
				<th> PATIENT DOB</th>
				<th> PATIENT ADDRESS </th>
				<th> PATIENT PHONE </th>
	</tr>
	';
	$query = "select distinct * from clinic.medical_card WHERE not mc_id = any (SELECT a_patient FROM clinic.appointment)";
	$result1 = pg_query($db, $query);
	while($result = pg_fetch_row($result1)) {
		echo '<tr>';
		foreach ($result as $value)
			echo '<td><input type="text" class="form-control" value="' . $value . '" </td>';
		echo '</tr>';
	}
	echo '</thead></table>
	';
	echo '
	</br></br>
	<p> Doctors age at the day of the appointment: </p>
	<table class="table table-striped" frame="border">
		<thead>
			<tr>
				<th> DOCTOR NAME </th>
				<th>DOCTOR AGE (AT DAY OF APPOINTMENT) </th>
	</tr>
	';
	$query = "select d_full_name, age (clinic.appointment.a_date, clinic.doctor.d_dob) from clinic.appointment,
	 clinic.doctor WHERE a_doctor = d_id ORDER BY age";
	$result1 = pg_query($db, $query);
	while($result = pg_fetch_row($result1)) {
		echo '<tr>';
		foreach ($result as $value)
			echo '<td><input type="text" class="form-control" value="' . $value . '" </td>';
		echo '</tr>';
	}
	echo '</thead></table>
	';
	?>
</body>
</html>
