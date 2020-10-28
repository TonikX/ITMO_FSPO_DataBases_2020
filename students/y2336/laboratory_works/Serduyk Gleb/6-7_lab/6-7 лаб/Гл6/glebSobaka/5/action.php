<link rel="stylesheet" href="assets/style.php">

<body style='background: #1b2631'>
    <?php
    $arg1 = $_POST['ID_Sponsor'];
    $arg3 = $_POST['Total_Investment'];
    $arg2 = $_POST['action'];
    $dbuser = 'postgres';
    $dbpass = '1234';
    $host = 'localhost';
    $dbname = 'qwerty';
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    if ($arg2 == "add") {
        $pdo->query("INSERT INTO public.\"Sponsor\" VALUES ('$arg1','$arg3')");
    } else if ($arg2 == "delete") {
        $pdo->query("DELETE from public.\"Sponsor\" where \"ID_Sponsor\" = '$arg1'");
    } else if ($arg2 == "edit") {
        $pdo->query("UPDATE public.\"Sponsor\" SET \"Total_Investment\" = '$arg3'
    where \"ID_Sponsor\" = '$arg1'");
    }

    $data = $pdo->query('SELECT * FROM public."Sponsor"');
    echo "<div style=\"font-size:32px; color:#f9e79f; text-align: center; margin-top: 30px; 
  font-family: 'Montserrat', sans-serif;
  \">" . "Спонсоры" . "</div>";
    echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
    echo "<td>";
    echo "Sponsor";
    echo "</td>";
    echo "<td>";
    echo "Total Investment";
    echo "</td>";;
    echo "</table>";

    foreach ($data as $row) {
        echo "<table class='simple-little-table' style=\"
    text-align: center;\">";
        echo "<td>";
        echo "" . $row['ID_Sponsor'] . "";
        echo "</td>";
        echo "<td>";
        echo "" . $row['Total_Investment'] . "";
        echo "</td>";
        echo "</table>";
    }
    ?>