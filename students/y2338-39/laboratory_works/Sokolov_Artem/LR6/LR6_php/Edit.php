<?php
    require_once "./Database.php";

    if (isset($_GET['ed'])) {
        $db = Database::getInstance();

        $sql = '
            SELECT * 
            FROM public."Book" as book
            WHERE book."Shifr_knigi" = :id
        ';

        $data = $db->query($sql, [
                ':id' => $_GET['ed']
        ])->fetch();
    }
?>


<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1 class="container-title">Изменение данных</h1>
        <?php if (isset( $_GET['ed'])): ?>

        <div class="table">
            <form action="Change.php" method="post" class="row">
                <input type="hidden" name="shifr_knigi" value="<?php echo $_GET['ed']; ?>">

                <div class="value">
                    <input type="text" class="text-input" placeholder = "Name" name="name" value="<?= $data['Name'] ?>">
                </div>

                <div class="value">
                    <input type="text" class="text-input" placeholder = "Author" name = "author" value="<?= $data['Author'] ?>">
                </div>

                <div class="value">
                    <input type="text" class="text-input" placeholder = "Publishing_house" name = "publishing_house" value="<?= $data['Publishing_house'] ?>">
                </div>

                <div class="value">
                    <input type="date" class="text-input" placeholder = "Year_publishing" name = "year_publishing" value="<?= $data['Year_publishing'] ?>">
                </div>

                <div class="value">
                    <input type="text" class="text-input" placeholder = "Section" name = "section" value="<?= $data['Section'] ?>">
                </div>

                <div class="value">
                    <input type="number" class="text-input" placeholder = "Chislo_exempl_v_kajdom_zale" name = "chislo_exempl_v_kajdom_zale" value="<?= $data['Chislo_exempl_v_kajdom_zale'] ?>">
                </div>

                <div class="value">
                    <input type="submit" class="btn btn-success" value="Edit" name="edit">
                </div>
            </form>
        </div>
        <?php endif; ?>
    </div>
</body>
