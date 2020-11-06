<?php
   require_once "./Database.php";

   if (isset($_POST['edit'])){
      $db = Database::getInstance();

      $shifrKnigi = $_POST['shifr_knigi'] ?? null;
      $name = $_POST['name'] ?? null;
      $author = $_POST['author'] ?? null;
      $publishingHouse = $_POST['publishing_house'] ?? null;
      $yearPublishing = $_POST['year_publishing'] ?? null;
      $section = $_POST['section'] ?? null;
      $examplesPerRoom = $_POST['chislo_exempl_v_kajdom_zale'] ?? null;

      $query = '
         UPDATE public."Book" as book
         SET "Name" = :name, "Author" = :author, "Publishing_house" = :pub_house, "Year_publishing" = :pub_year, "Section" = :section , "Chislo_exempl_v_kajdom_zale" = :examples
        WHERE book."Shifr_knigi" = :shifr_knigi
      ';

      $db->query($query, [
          ':name' => $name,
          ':author' => $author,
          ':pub_house' => $publishingHouse,
          ':pub_year' => $yearPublishing,
          ':section' => $section,
          ':examples' => $examplesPerRoom,
          ':shifr_knigi' => $shifrKnigi
      ]);
   }

   header('Location: ./index1.php');
?>
