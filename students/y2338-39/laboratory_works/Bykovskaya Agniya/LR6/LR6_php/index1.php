<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title> Library</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
        <?php

        $dbuser = 'postgres';
        $dbpass = '1234';
        $host = 'localhost';
        $dbname = 'Biblioteka';
        $db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");

        $query = "select * from book order by shifr_knigi";
        $result = pg_query($db, $query);
        for ($data=[]; $count = pg_fetch_assoc($result); $data[] = $count);

        ?>
        <div class="container">
          <h5> Books</h5>
        <table class="table-striped" frame="border">
          <thead>
            <tr>
                <th>Shifr_knigi</th>
                <th>Name</th>
                <th>Author</th>
                <th>Publishing_house</th>
                <th>Year_publishing</th>
                <th>Section</th>
                <th>Chislo_exempl_v_kajdom_zale</th>
              </tr>
        </thead>

    <?php foreach ($data as $row) { ?>
        <tbody>
                <tr>
                  <td><?php echo $row['shifr_knigi'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['author'];?></td>
                  <td><?php echo $row['publishing_house'];?></td>
                  <td><?php echo $row['year_publishing'];?></td>
                  <td><?php echo $row['section'];?></td>
                  <td><?php echo $row['chislo_exempl_v_kajdom_zale'];?></td>
                  <td><a href="Edit.php?ed=<?php echo $row['shifr_knigi'];?>" class="btn btn-info"> Edit</a></td>
                  <td><a href="Delete.php?del=<?php echo $row['shifr_knigi'];?>" class="btn btn-danger"> Delete</a></td>

                </tr>
                </tbody>

              <?php } ?>

                  <tr>
                    <form action="Create.php" method="post">
                      <td><input type="number" class="form-control" placeholder = "Shifr_knigi" name = "shifr_knigi"></td>
                      <td><input type="text" class="form-control" placeholder = "Name" name = "name"></td>
                      <td><input type="text" class="form-control" placeholder = "Author" name = "author"></td>
                      <td><input type="text" class="form-control" placeholder = "Publishing_house" name = "publishing_house"></td>
                      <td><input type="date" class="form-control" placeholder = "Year_publishing" name = "year_publishing"></td>
                      <td><input type="text" class="form-control" placeholder = "Section" name = "section"></td>
                      <td><input type="number" class="form-control" placeholder = "Chislo_exempl_v_kajdom_zale" name = "chislo_exempl_v_kajdom_zale"></td>
                      <td><input type="submit" class="btn btn-success" value="create" name="sub"></td>
                    </form>
                  </tr>

        </table>

</div>


  <div class="child">
    <h5> Запросы</h5>
    <table class="table-striped" frame="border">
  <form action="Data1.php" method="post">
    <td><button class="btn btn-info btn-lg btn-block" type="submit" name="data1">Data1</button></td>
  </form>
  <form action="Data2.php" method="post">
    <td><button class="btn btn-info btn-lg btn-block" type="submit" name="data2">Data2</button></td>
  </form>
  <form action="Data3.php" method="post">
    <td><button class="btn btn-info btn-lg btn-block" type="submit" name="data3">Data3</button></td>
  </form>
  <form action="Data4.php" method="post">
    <td><button class="btn btn-info btn-lg btn-block" type="submit" name="data4">Data4</button></td>
  </form>
  <form action="Data5.php" method="post">
    <td><button class="btn btn-info btn-lg btn-block" type="submit" name="data5">Data5</button></td>
  </form>
    </table>
    </div>

</body>
</html>
