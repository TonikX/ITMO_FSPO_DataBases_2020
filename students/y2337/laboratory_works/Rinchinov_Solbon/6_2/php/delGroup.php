<?php 

include './include/bd.php';
include './include/fetchBd.php';

if(isset($_POST['group'])) {
  $number = $_POST['group'];

  $sql = "delete from hr.\"Group\" where \"Group_number\"=$number";

  $query = $pdo->prepare($sql);
  $result = $query->execute();
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Удаление</title>
</head>
<body>
  <a href='index.php'>На главную</a>
  <table>
    <caption>Группы</caption>
    <th>Номер</th>
    <?php echo fetchTableData('select * from hr."Group"') ?>
  </table>

  <form method="POST">
    <h3>Введите данные для удаления</h3>
    <label>
      Номер группы
      <input type="text" name="group" placeholder="Номер группы" required>
    </label>

    <input type="submit" value="Удалить">
  </form>
</body>
</html>