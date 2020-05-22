
/*Вывести id редактора и id книги, с которой он работал*/
select "Book"."id_ed","Book"."id_book" from public."Book", public." Editor" where "Book"."id_ed" = " Editor"."id_ed" group by "Book"."id_ed", "Book"."id_book"


/*Вывести все данные из таблицы "Book, где id_книги>1 или id_редактора=2"*/
select * from public."Book" where ("id_book">1 or "id_ed"=2)

/*Вывести разницу в днях выпуска книги"*/
select current_date - "Дата-выпуска" as "Разница_в_днях",current_date,"Дата-выпуска" from public."Book"

/*Вывести тираж и id_книги через нижнеее подчеркивание"*/
select "Тираж" || '___' || "id_book","Тираж","id_book" from pub-lic."Book";

/*Вывести книги и тираж книг, где id_книги > 1*/
select distinct "id_book","Тираж" from public."Book" where "id_book" in (select "id_book" from public."Book" where "id_book" > 1);

/*Вывести максимальное id_редактора в таблице "Editor"*/
Select distinct max("id_ed") from public." Editor";

/*Вывести максимальное id_редактора и его ФИО в таблице "Editor"*/
select max("id_ed"),"ФИО" from public." Editor" group by "id_ed" having max("id_ed") > 1;

/*Вывести id_редактора(не равный 1 и 3) и его ФИО в таблице "Editor"*/
select distinct "id_ed","ФИО" from public." Editor" where "id_ed" = any (select "id_ed" from public." Editor" where "id_ed" != 1 and "id_ed" != 3);

/*Вывести id_книги, у которой тираж>200"*/
select "id_book" from public."Book" where "Тираж" >= 200

/*Вывести id_редактора*/
Select "id_ed" from public." Editor" union select "id_au" from pub-lic."Author"
