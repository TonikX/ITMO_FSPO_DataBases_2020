/*1.	Выбор значений, заданных атрибутов из более, чем двух таблиц, с сортировкой – от 1 балла*/
/*Вывод номер диеты, id курицы*/
select "id_kuritsi", dieta."nomer_dieti" from public."kuritsi",public."dieta" where "kuritsi"."nomer_dieti" = "dieta"."nomer_dieti" group by "die-ta"."nomer_dieti","kuritsi"."id_kuritsi";

/*2.	Использование условий WHERE, состоящих из более, чем одного условия – от 1 балла;*/
/*Вывод Номер диеты и название птицефабрики где номер_диеты = 2 или 1 и название = Петровск*/
select "nomer_dieti","nazv_pticefabriki" from public."dieta", pub-lic."pticefabrika" where ("nomer_dieti" = 2 or "nomer_dieti" = 1) and "nazv_pticefabriki" = 'Petrovsk'; 

/*3.	Использование функций для работы с датами – от 2 баллов;*/
/* Вывод разницы в днях между текущей датой и датой кормления куриц*/
select  "vrema_kormleniya" - current_date as "Последняя кормежка", cur-rent_date,"vrema_kormleniya"  from "kormlenie";

/*4.	Использование строковых функций – от 3 баллов;*/
/*Вывод id курицы и номера диеты*/
select 'курицы -' || "id_kuritsi" || '  диеты -' || "nomer_dieti" as "номер ку-рицы и номер ее диеты","id_kuritsi","nomer_dieti" from "kormlenie"; 

/*5.	запрос с использованием подзапросов – от 2 баллов (многострочный подзапрос - от 3 баллов);*/
/*Вывод Номера диеты > 1*/
select distinct "nomer_dieti" from public."dieta" where "nomer_dieti" in (select "nomer_dieti" from public."dieta" where "nomer_dieti" > 1); 

/*6.	вычисление групповой (агрегатной) функции – от 1 балла (с несколькими таблицами – от 3 баллов);*/
/*Вывод максимальный номер диеты*/
select distinct max("nomer_dieti") from public."dieta";

/*7.	вычисление групповой (агрегатной) функции с условием HAVING – от 2 баллов;*/
/*Вывод Номера диеты > 1*/
select "nomer_dieti" from public."dieta" group by "nomer_dieti" having "nomer_dieti" > 1; 

/*8.	использование предикатов EXISTS, ALL, SOME и ANY - от 4 баллов;*/
/*Вывод номер диеты не равный 1 или 3 и содержание диеты*/
select distinct "nomer_dieti","soderj_dieti" from public."dieta" where "nomer_dieti" = any (select "nomer_dieti" from public."dieta" where "nomer_dieti" != 1 and "nomer_dieti" != 3); 

/*9.	использование запросов с операциями реляционной алгебры (объединение, пересечение и т.д.) - от 3 баллов;*/
/*Вывод название породы с производительностью > 200 */
select "proizvoditelnost","nazvanie_porodi" from public."Poroda" where "proizvoditelnost" > 200; 

/*10.	использование объединений запросов (inner join и т.д.) - от 3 баллов.*/
/*Вывод номер диеты и производительность в одном столбце*/
Select "nomer_dieti" from public."dieta" union select "proizvoditelnost" from public."Poroda";