<?php
    require_once "./Database.php";

    if (isset($_POST['sub'])) {
        $db = Database::getInstance();

        $shifrKnigi = $_POST['shifr_knigi'] ?? null;
        $name = $_POST['name'] ?? null;
        $author = $_POST['author'] ?? null;
        $publishingHouse = $_POST['publishing_house'] ?? null;
        $yearPublishing = $_POST['year_publishing'] ?? null;
        $section = $_POST['section'] ?? null;
        $examplesPerRoom = $_POST['chislo_exempl_v_kajdom_zale'] ?? null;

        $query = '
            INSERT INTO public."Book" 
            VALUES(:shifr_knigi, :name, :author, :pub_house, :pub_year, :section , :examples)
        ';

        $exec = $db->query($query, [
            ':shifr_knigi' => $shifrKnigi,
            ':name' => $name,
            ':author' => $author,
            ':pub_house' => $publishingHouse,
            ':pub_year' => $yearPublishing,
            ':section' => $section,
            ':examples' => $examplesPerRoom
        ]);
    }

    header('Location: ./index1.php');
?>
