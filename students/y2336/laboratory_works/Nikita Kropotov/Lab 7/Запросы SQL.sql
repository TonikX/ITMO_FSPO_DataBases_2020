/*Получить всех клиентов*/
SELECT * FROM "Client";

/*Вывести все агентства и сгруппировать их по названию*/
SELECT "Agency_ID", "Distribution_agency" FROM "ADVERTISING AGENCY" GROUP BY "Agency_ID", "Distribution_agency";

/*Вывести клиента с номером 65823*/
SELECT * from public."Client" WHERE ("ID_client" = 65823);

/*Вывести ID платёжного счёта оплаченного «2019-02-13»*/
SELECT "ID_invoice_payment", "Payment_time" FROM "payment" WHERE "Payment_time" = '2019-02-13' GROUP BY "Payment_time", "ID_invoice_payment";

/*Проверить количество цифр номера телефона клиента у ID_client = 65823*/
Length
SELECT length("Phone_number_client"), "ID_client" FROM "Client" where "ID_client" = '65823';

/*Вывести заказ использующий материал с ID_material = 9483*/
SELECT "Order_id", "Material"."ID_material" FROM "Order_Zakaz", "Material" WHERE "Material"."ID_material" = "Order_Zakaz"."ID_material" AND "Material"."ID_material" = (SELECT "ID_material" FROM "Material" WHERE "ID_material"= '9483') GROUP BY "Order_id", "Materi-al"."ID_material";

/*Вывести ID заказа, ID материала с максимальной ценой*/
MAX
SELECT "price_material", "Material"."ID_material", "Or-der_Zakaz"."Order_id" FROM "Material", "Order_Zakaz" where "Materi-al"."ID_material" = "Order_Zakaz"."ID_material" AND "price_material" = (SE-LECT MAX("price_material") FROM "Material") GROUP BY "Or-der_Zakaz"."Order_id", "Material"."ID_material";

/*Вывести ID заказов максимальная цена которых больше 1000*/
HAVING MAX
SELECT max("cost"), "Order_Zakaz"."Order_id" FROM "Order_Zakaz" GROUP BY "Order_Zakaz"."Order_id" HAVING MAX("cost")>'1000';

/*Вывести ID материала с типом «видео» И ценой больше 210*/
SELECT "ID_material", "type_material", "price_material" FROM "Materi-al" WHERE "type_material" = 'video' AND "price_material" > '210';

/*Вывести ID заказов, ID материалов, если хотя бы в одном используется ID_material = 9483*/
EXISTS
SELECT "Order_id", "Material"."ID_material" FROM "Order_Zakaz", "Material" WHERE EXISTS (SELECT "ID_material" FROM "Material" WHERE "ID_material"= '9483') AND "Material"."ID_material" = "Or-der_Zakaz"."ID_material" GROUP BY "Order_id", "Material"."ID_material";

/*Вывести материал, который используется в одном из заказов*/
ALL
SELECT *FROM "Material" WHERE "ID_material" = ALL (SELECT "ID_material" FROM "Order_Zakaz" where "ID_material"= '9483');

/*Вывести заказы, которые имеют статус выполнения «ОЖИДАНИЕ» и название услуги «создание баннера»*/
UNION
SELECT * FROM "Order_Zakaz" WHERE "Order_Status" = 'WAITING'
UNION
SELECT * FROM "Order_Zakaz" WHERE "Name_of_advertising_services" = 'banner creation';

/*Вывести исполнителей, у которых есть заказ*/
IN
SELECT "Order_Zakaz"."ID_Executor" FROM "Order_Zakaz" WHERE "Order_Zakaz"."ID_Executor" IN (SELECT "Executor"."ID_Executor" FROM "Executor");

/*Вывести исполнителя, у которого нет заказов*/
NOT IN
SELECT "Executor"."ID_Executor" FROM "Executor" WHERE "Execu-tor"."ID_Executor" NOT IN (SELECT "Order_Zakaz"."ID_Executor" FROM "Order_Zakaz");

/*Вывести заказ и счёт оплаты, который имеет статус выполнения заказа «ПРИОСТАНОВЛЕН»*/
INNER JOIN
SELECT * FROM payment INNER JOIN "Order_Zakaz" ON pay-ment."ID_invoice_payment" = "Order_Zakaz"."ID_invoice_payment" WHERE "Order_Zakaz"."Order_Status" = 'PAUSE';