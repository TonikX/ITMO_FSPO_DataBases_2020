<?php
    require_once "./Database.php";

    $db = Database::getInstance();

    $query = 'SELECT DISTINCT * FROM public."Book" WHERE NOT "Shifr_knigi" =  ANY(SELECT pk."Shifr_knigi" FROM public."Poluchenie_knigi" pk)';

    $data = $db->query($query)->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Library</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
            <h1 class="container-title">Информация о книгах, которые ещё никогда не брали в библиотеке</h1>

            <div class="table">
                <div class="row table-heading">
                    <div class="value">Shifr_knigi</div>
                    <div class="value">Name</div>
                    <div class="value">Author</div>
                    <div class="value">Publishing_house</div>
                    <div class="value">Year_publishing</div>
                    <div class="value">Section</div>
                    <div class="value">Chislo_exempl_v_kajdom_zale</div>
                </div>

                <?php foreach ($data as $row): ?>
                    <div class="row">
                        <div class="value"><?php echo $row['Shifr_knigi'];?></div>
                        <div class="value"><?php echo $row['Name'];?></div>
                        <div class="value"><?php echo $row['Author'];?></div>
                        <div class="value"><?php echo $row['Publishing_house'];?></div>
                        <div class="value"><?php echo $row['Year_publishing'];?></div>
                        <div class="value"><?php echo $row['Section'];?></div>
                        <div class="value"><?php echo $row['Chislo_exempl_v_kajdom_zale'];?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>
