<?php
  require_once "./Database.php";

  $db = Database::getInstance();

  if (isset($_GET['del'])) {
    $query = 'DELETE FROM public."Book" WHERE "Shifr_knigi" = :shifr_knigi';
    $db->query($query, [':shifr_knigi' => $_GET['del']]);
  }

  header('Location: ./index1.php');
