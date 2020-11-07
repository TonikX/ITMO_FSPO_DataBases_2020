<?php

include './include/bd.php';
include './include/fetchBd.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
</head>
<body>
  <table>
    <caption>Результаты семестра по химии с оценкой выше 3</caption>
    <th>Студент</th>
    <th>Учитель</th>
    <th>Предмет</th>
    <th>Дата</th>
    <th>Оценка</th>
    <?php echo fetchTableData('select * from hr."Exam" where hr."Exam"."Discipline_name"=\'Химия\' AND hr."Exam"."score">3')?>
  </table>
  <hr>
  <table>
    <caption>Имена и фамилии студентов в верхнем регистре</caption>
    <th>Имя</th>
    <th>Фамилия</th>
    <?php echo fetchTableData('select UPPER(hr."Student"."Name") as "Имя", UPPER(hr."Student"."Surname") as "Фамилия" from hr."Student";')?>
  </table>
  <hr>
  <table>
    <caption>Номера кабинетов, которые привязаны хотя бы к одному учителю</caption>
    <th>Номер кабинета</th>
    <?php echo fetchTableData('select * from hr."Cabinet" where hr."Cabinet"."Cabinet_number"=any(select hr."Teacher"."Cabinet_number" from hr."Teacher")')?>
  </table>
  <hr>
  <table>
    <caption>Учителя младше 40 лет</caption>
    <th>Код учителя</th>
    <th>Имя</th>
    <th>Фамилии</th>
    <th>Возраст</th>
    <th>Пол</th>
    <th>Номер кабинета</th>
    <th>Номер расписания</th>
    <?php echo fetchTableData('select * from hr."Teacher" where "Age" < 40')?>
  </table>
  <hr>
  <table>
    <caption>Максимальная возраст у учителей</caption>
    <th>Возраст</th>
    <?php echo fetchTableData('select distinct MAX("Age") as "Возраст" from hr."Teacher"')?>
  </table>
</body>
</html>
