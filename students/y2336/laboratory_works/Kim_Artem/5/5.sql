*1.	Выбор значений, заданных атрибутов из более, чем двух таблиц, с сортировкой – от 1 балла*/
/*Вывод номер диеты, id курицы*/
select "id», diet."number_diet" from public."chicken",public."diet" where "chicken». «number diet" = "diet"."number_diet" group by "di-et"."number_diet","chivken"."id "; 

/*2.	Использование условий WHERE, состоящих из более, чем одного условия – от 1 балла;*/
/*Вывод Номер диеты и название птицефабрики где номер_диеты = 2 или 1 и название = Лирск*/
select "number_diet","  name_farm  " from public."diet", public."farm" where ("number_diet" = 2 or "number_d iet" = 1) and "name_farm" = Lirsk  ; 

/*3.	Использование функций для работы с датами – от 2 баллов;*/
/* Вывод разницы в днях между текущей датой и датой кормления куриц*/
select  " time_eat - current_date as "Крайнее кормление", cur-rent_date,"time_eat"  from "kormlenie"; 

/*4.	Использование строковых функций – от 3 баллов;*/
/*Вывод id курицы и номера диеты*/
select 'курицы -' || "id " || '  диеты -' || "number_diet" as "номер курицы и номер ее диеты","id ","number_diet" from "eat";  

/*5.	запрос с использованием подзапросов – от 2 баллов (многострочный подзапрос - от 3 баллов);*/
/*Вывод Номера диеты > 1*/
select distinct "number_diet" from public."diet" where "number_diet" in (select "number_diet" from public."diet" where "number_diet" > 1);

/*6.	вычисление групповой (агрегатной) функции – от 1 балла (с несколькими таблицами – от 3 баллов);*/
/*Вывод максимальный номер диеты*/
Select distinct max("number_diet") from public."diet";

/*7.	вычисление групповой (агрегатной) функции с условием HAVING – от 2 баллов;*/
/*Вывод Номера диеты > 1*/
select "number_diet" from public."diet" group by "number_diet" having "number_diet" > 1; 

/*8.	использование предикатов EXISTS, ALL, SOME и ANY - от 4 баллов;*/
/*Вывод номер диеты не равный 1 или 3 и содержание диеты*/
select distinct "number_diet","  content_diet  " from public."diet" where "number_diet" = any (select "number_diet" from public."diet" where "number_diet" != 1 and "number_diet" != 3); 

/*9.	использование запросов с операциями реляционной алгебры (объединение, пересечение и т.д.) - от 3 баллов;*/
/*Вывод название породы с производительностью > 200 */
select "performance"," name " from public."breed" where " performance " > 200;

/*10.	использование объединений запросов (inner join и т.д.) - от 3 баллов.*/
/*Вывод номер диеты и производительность в одном столбце*/
Select "number_diet" from public."diet" union select " performance " from public."breed"; 