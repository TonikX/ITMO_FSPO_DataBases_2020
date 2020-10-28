<link rel="stylesheet" href="assets/style.php">

<body style='background: #1b2631'>
    <?php
    $arg1 = $_POST['Competition_Num'];
    $arg3 = $_POST['Ring_Num'];
    $arg4 = $_POST['Time_Start'];
    $arg2 = $_POST['action'];
    $dbuser = 'postgres';
    $dbpass = '1234';
    $host = 'localhost';
    $dbname = 'qwerty';
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    if ($arg2 == "add") {
        $pdo->query("INSERT INTO public.\"Competition\" VALUES ('$arg1','$arg3', '$arg4')");
    } else if ($arg2 == "delete") {
        $pdo->query("DELETE from public.\"Competition\" where \"Competition_Num\" = '$arg1'");
    } else if ($arg2 == "edit") {
        $pdo->query("UPDATE public.\"Competition\" SET \"Ring_Num\" = '$arg3',  \"Time_Start\" = '$arg4'
    where \"Competition_Num\" = '$arg1'");
    }

    $data = $pdo->query('SELECT * FROM public."Competition"');
    echo "<div style=\"font-size:32px; color:#f9e79f; text-align: center; margin-top: 30px; 
  font-family: 'Montserrat', sans-serif;
  \">" . "Соревнования" . "</div>";
    echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
    echo "<td>";
    echo "Competition Num";
    echo "</td>";
    echo "<td>";
    echo "Ring Num";
    echo "</td>";
    echo "<td>";
    echo "Time Start";
    echo "</td>";
    echo "</table>";

    foreach ($data as $row) {
        echo "<table class='simple-little-table' style=\"
    text-align: center;\">";
        echo "<td>";
        echo "" . $row['Competition_Num'] . "";
        echo "</td>";
        echo "<td>";
        echo "" . $row['Ring_Num'] . "";
        echo "</td>";
        echo "<td>";
        echo "" . $row['Time_Start'] . "";
        echo "</td>";
        echo "</table>";
    }
    echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . "." . "</div>";

    ?>