<?php 

include './include/bd.php';
include './include/fetchBd.php';

if(isset($_POST['student_code']) && isset($_POST['teacher_code']) && isset($_POST['discipline_name'])) {
  $sql = 'delete from hr."Exam" where "Student_code"='.$_POST['student_code'].' AND "Teacher_code"='.$_POST['teacher_code'].' AND "Discipline_name"=\''.$_POST['discipline_name'].'\'';

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
    <caption>Результаты</caption>
    <th>Код студента</th>
    <th>Код учителя</th>
    <th>Предмет</th>
    <th>Дата</th>
    <th>Оценка</th>
    <?php echo fetchTableData('select * from hr."Exam"') ?>
  </table>

  <form method="POST">
    <h3>Введите данные для удаления</h3>
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

    <input type="submit" value="Удалить">
  </form>
</body>
</html>