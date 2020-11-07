<?php 

include './include/bd.php';
include './include/fetchBd.php';

if(isset($_POST['code']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['age']) && isset($_POST['gender']) && isset($_POST['group'])) {
  $code = $_POST['code'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $group = $_POST['group'];

  $sql = "insert into hr.\"Student\" values ($code, '$name', '$surname', $age, '$gender', $group)";

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
    <h3>Введите данные для добавления</h3>
    <label>
      Код студента
      <input type="text" name="code" placeholder="Код студента" required>
    </label>
    <label>
      Имя
      <input type="text" name="name" placeholder="Имя" required>
    </label>
    <label>
      Фамилия
      <input type="text" name="surname" placeholder="Фамилия" required>
    </label>
    <label>
      Возраст
      <input type="text" name="age" placeholder="Возраст" required>
    </label>
    <label>
      Пол
      <input type="text" name="gender" placeholder="Пол" required>
    </label>
    <label>
      Номер группы
      <input type="text" name="group" placeholder="Номер группы" required>
    </label>

    <input type="submit" value="Добавить">
  </form>
</body>
</html>