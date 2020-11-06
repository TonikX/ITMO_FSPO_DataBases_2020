<?php
    require_once "./Database.php";

    $db = Database::getInstance();

    $sql = 'SELECT * FROM public."Book"';

    $data = $db->query($sql)->fetchAll();
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
            <h1 class="container-title">Books</h1>

            <div class="table">
                <div class="row table-heading">
                    <div class="value">Id книги</div>
                    <div class="value">Наименование</div>
                    <div class="value">Автор</div>
                    <div class="value">Издательство</div>
                    <div class="value">Год публикации</div>
                    <div class="value">Секция</div>
                    <div class="value">Число экземпляров</div>
                    <div class="value">Действие</div>
                    <div class="value">Действие</div>
                </div>

                <form class="row" action="Create.php" method="post">
                    <div class="value"><input type="number" class="text-input" placeholder = "Shifr_knigi" name = "shifr_knigi"></div>
                    <div class="value"><input type="text" class="text-input" placeholder = "Name" name = "name"></div>
                    <div class="value"><input type="text" class="text-input" placeholder = "Author" name = "author"></div>
                    <div class="value"><input type="text" class="text-input" placeholder = "Publishing_house" name = "publishing_house"></div>
                    <div class="value"><input type="date" class="text-input" placeholder = "Year_publishing" name = "year_publishing"></div>
                    <div class="value"><input type="text" class="text-input" placeholder = "Section" name = "section"></div>
                    <div class="value"><input type="number" class="text-input" placeholder = "Chislo_exempl_v_kajdom_zale" name = "chislo_exempl_v_kajdom_zale"></div>
                    <div class="value"><input type="submit" class="btn btn-success" value="create" name="sub"></div>
                    <div class="value"></div>
                </form>

                <?php foreach ($data as $row): ?>
                    <div class="row">
                        <div class="value"><?php echo $row['Shifr_knigi'];?></div>
                        <div class="value"><?php echo $row['Name'];?></div>
                        <div class="value"><?php echo $row['Author'];?></div>
                        <div class="value"><?php echo $row['Publishing_house'];?></div>
                        <div class="value"><?php echo $row['Year_publishing'];?></div>
                        <div class="value"><?php echo $row['Section'];?></div>
                        <div class="value"><?php echo $row['Chislo_exempl_v_kajdom_zale'];?></div>
                        <div class="value"><a href="Edit.php?ed=<?php echo $row['Shifr_knigi'];?>" class="btn btn-success"> Edit</a></div>
                        <div class="value"><a href="Delete.php?del=<?php echo $row['Shifr_knigi'];?>" class="btn btn-error"> Delete</a></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <h1 class="container-title">Requests</h1>

            <div class="table">
                <div class="row">
                    <div class="value">
                        <a href="Data1.php" class="btn btn-info">Data1</a>
                    </div>
                    <div class="value">
                        <a href="Data2.php" class="btn btn-info">Data2</a>
                    </div>
                    <div class="value">
                        <a href="Data3.php" class="btn btn-info">Data3</a>
                    </div>
                    <div class="value">
                        <a href="Data4.php" class="btn btn-info">Data4</a>
                    </div>
                    <div class="value">
                        <a href="Data5.php" class="btn btn-info">Data5</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
