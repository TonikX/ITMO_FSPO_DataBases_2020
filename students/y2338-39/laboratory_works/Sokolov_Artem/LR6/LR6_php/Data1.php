<?php
    require_once "./Database.php";

    $db = Database::getInstance();

    $query = '
        SELECT "Shifr_knigi", "Name", "Author", "Year_publishing"
        FROM public."Book"
        WHERE "Year_publishing" BETWEEN :first_date AND :end_date
    ';

    $data = $db->query($query, [
        ':first_date' => "1951-07-16",
        ':end_date' => "1960-07-11"
    ])->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title> Library</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div class="container">
            <h1 class="container-title">
                Информация о книгах, которые были опубликованы в период с 16.07.1951 по 11.07.1960
            </h1>

            <div class="table">
                <div class="row table-heading">
                    <div class="value">Shifr_knigi</div>
                    <div class="value">Name</div>
                    <div class="value">Author</div>
                    <div class="value">Year_publishing</div>
                </div>

                <?php foreach ($data as $row): ?>
                    <div class="row">
                        <div class="value"><?php echo $row['Shifr_knigi']; ?></div>
                        <div class="value"><?php echo $row['Name']; ?></div>
                        <div class="value"><?php echo $row['Author']; ?></div>
                        <div class="value"><?php echo $row['Year_publishing']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>
