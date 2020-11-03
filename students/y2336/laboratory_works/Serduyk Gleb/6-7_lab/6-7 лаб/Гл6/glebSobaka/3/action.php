<link rel="stylesheet" href="assets/style.php">

<body style='background: #1b2631'>
    <?php
    $arg1 = $_POST['ID_Expert'];
    $arg3 = $_POST['Full_Name'];
    $arg4 = $_POST['Ring_Num'];
    $arg5 = $_POST['Club_Title'];
    $arg2 = $_POST['action'];
    $dbuser = 'postgres';
    $dbpass = '1234';
    $host = 'localhost';
    $dbname = 'qwerty';
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    if ($arg2 == "add") {
        $pdo->query("INSERT INTO public.\"Expert\" VALUES ('$arg1','$arg3', '$arg4', '$arg5')");
    } else if ($arg2 == "delete") {
        $pdo->query("DELETE from public.\"Expert\" where \"ID_Expert\" = '$arg1'");
    } else if ($arg2 == "edit") {
        $pdo->query("UPDATE public.\"Expert\" SET \"Full_Name\" = '$arg3', \"Ring_Num\" = '$arg4', \"Club_Title\" = '$arg5'
    where \"ID_Expert\" = '$arg1'");
    }

    $data = $pdo->query('SELECT * FROM public."Expert"');
    echo "<div style=\"font-size:32px; color:#f9e79f; text-align: center; margin-top: 30px; 
  font-family: 'Montserrat', sans-serif;
  \">" . "Эксперты" . "</div>";
    echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
    echo "<td>";
    echo "Id Expert";
    echo "</td>";;
    echo "<td>";
    echo "Name";
    echo "</td>";
    echo "<td>";
    echo "Ring Num";
    echo "</td>";
    echo "<td>";
    echo "Club Title";
    echo "</td>";
    echo "</table>";

    foreach ($data as $row) {
        echo "<table class='simple-little-table' style=\"
    text-align: center;\">";
        echo "<td>";
        echo "" . $row['ID_Expert'] . "";
        echo "</td>";
        echo "<td>";
        echo "" . $row['Full_Name'] . "";
        echo "</td>";
        echo "<td>";
        echo "" . $row['Ring_Num'] . "";
        echo "</td>";
        echo "<td>";
        echo "" . $row['Club_Title'] . "";
        echo "</td>";
        echo "</table>";
    }
    echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . "." . "</div>";

    ?>