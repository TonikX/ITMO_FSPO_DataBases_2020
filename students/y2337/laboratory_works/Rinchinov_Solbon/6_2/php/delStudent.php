<?php 

include './include/bd.php';
include './include/fetchBd.php';

if(isset($_POST['code'])) {
  $code = $_POST['code'];

  $sql = "delete from hr.\"Student\" where \"Student_code\"=$code";

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
    <caption>Студенты</caption>
    <th>Код_студента</th>
    <th>Имя</th>
    <th>Фамилия</th>
    <th>Возраст</th>
    <th>Пол</th>
    <th>Номер группы</th>
    <?php echo fetchTableData('select * from hr."Student"') ?>
  </table>

  <form method="POST">
    <h3>Введите данные для удаления</h3>
    <label>
      Код студента
      <input type="text" name="code" placeholder="Код студента" required>
    </label>

    <input type="submit" value="Удалить">
  </form>
</body>
</html>