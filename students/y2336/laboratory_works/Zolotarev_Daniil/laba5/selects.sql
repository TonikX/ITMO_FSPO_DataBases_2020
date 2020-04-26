-- 1 запрос
SELECT "Author_Book" FROM public."Book" WHERE ("Pages_Book" > 100); 

-- 2 запрос
SELECT "Name_Book" FROM public."Book" INNER JOIN public."Publisher" ON
"Book"."ID_Book" = "Publisher"."ID_book" WHERE ("Publications_per_month" = 12);  

-- 3 запрос
SELECT "Author"."FIO_auuthor" FROM public."Contract" INNER JOIN 
public."Author" ON "Author"."ID_author" = "Contract"."ID_author" INNER JOIN 
public."Manager" ON "Contract"."ID_manager" = "Manager"."ID_manager" where 
Manager"."Stage_manager" > 2;

-- 4 запрос
SELECT * FROM public."Book"; 

-- 5 запрос
SELECT "ID_publication", "Publication_date" FROM public."Publisher" 
GROUP BY "Publication_date", "ID_publication";

 -- 6 запрос
SELECT * FROM public."Contract" where "Payment_authors" = 15000;

-- 7 запрос
SELECT "FIO_manager" FROM public."Remarks" NATURAL JOIN 
public."Manager" where "Remark_row" = 4; 

-- 8 запрос
SELECT "Author"."ID_author" FROM public."Author" WHERE "ID_author" IN 
(SELECT "Contract"."ID_author" FROM public."Contract" ); 

-- 9 запрос
SELECT "Manager"."ID_manager" FROM public."Manager" WHERE
ID_manager" NOT IN (SELECT "Contract"."ID_manager" FROM public."Contract" ); 

-- 10 запрос
SELECT "Name_Book", "Pages_Book" FROM public."Book", public."Publisher" 
where "Book"."ID_Book" = "Publisher"."ID_book" AND "Publications_per_quart" = 
(SELECT MAX("Publications_per_quart") FROM public."Publisher"); 

-- 11 запрос
SELECT MAX("Pages_Book"), "ID_Book" FROM public."Book" 
GROUP BY "ID_Book" HAVING MAX("Pages_Book") > '50'; 

-- 12 запрос
SELECT "ID_author" FROM public."Contract" WHERE 
"Sequence_authors" = 'no' AND "Payment_authors" > '10000'; 

 -- 13 запрос
SELECT "Book"."ID_Book", "ID_publication" FROM public."Book", public."Publisher" 
WHERE EXISTS (SELECT "ID_Book" FROM public."Book" WHERE "ID_publication" = 2) 
AND "Book"."ID_Book" = "Publisher"."ID_publication" 
GROUP BY "ID_Book", "ID_publication";

-- 14 запрос 
SELECT * FROM public."Contract" WHERE "Count_authors" = 1 UNION 
SELECT * FROM public."Contract" WHERE "Payment_authors" > 2000; 

 