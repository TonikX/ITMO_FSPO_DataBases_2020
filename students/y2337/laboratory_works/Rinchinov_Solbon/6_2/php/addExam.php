<?php 

include './include/bd.php';
include './include/fetchBd.php';

if(isset($_POST['student_code']) && isset($_POST['teacher_code']) && isset($_POST['discipline_name']) && isset($_POST['score']) && isset($_POST['date'])) {
  $s_code = $_POST['student_code'];
  $t_code = $_POST['teacher_code'];
  $discipline = $_POST['discipline_name'];
  $d = $_POST['date'];
  $score = $_POST['score'];

  $sql = "insert into hr.\"Exam\" values ($s_code, $t_code, '$discipline', '$d', $score)";

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
    <caption>Результаты</caption>
    <th>Код студента</th>
    <th>Код учителя</th>
    <th>Предмет</th>
    <th>Дата</th>
    <th>Оценка</th>
    <?php echo fetchTableData('select * from hr."Exam"') ?>
  </table>

  <form method="POST">
    <h3>Введите данные для добавления</h3>
    <label>
      Код студента
      <input type="text" name="student_code" placeholder="Код студента" required>
    </label>

    <label>
      Код учителя
      <input type="text" name="teacher_code" placeholder="Код учителя" required>
    </label>

    <label>
      Предмет
      <input type="text" name="discipline_name" placeholder="Название предмета" required>
    </label>

    <label>
      Дата
      <input type="text" name="date" placeholder="Дата" required>
    </label>

    <label>
      Оценка
      <input type="text" name="score" placeholder="Оценка" required>
    </label>

    <input type="submit" value="Добавить">
  </form>
</body>
</html>