<?php 

include './include/bd.php';
include './include/fetchBd.php';

if(isset($_POST['group_number'])) {
  $number = $_POST['group_number'];

  $sql = "insert into hr.\"Group\" values ($number)";

  $query = $pdo->prepare($sql);
  $result = $query->execute();
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Добавление</title>
  <style>
    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-top: 5px;
    }

    input[type='submit'] {
      width: fit-content;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <a href='index.php'>На главную</a>
  <table>
    <caption>Группы</caption>
    <th>Номер</th>
    <?php echo fetchTableData('select * from hr."Group"') ?>
  </table>

  <form method="POST">
    <h3>Введите данные для добавления</h3>
    <label>
      Номер группы
      <input type="text" name="group_number" placeholder="Номер группы" required>
    </label>

    <input type="submit" value="Добавить">
  </form>
</body>
</html>