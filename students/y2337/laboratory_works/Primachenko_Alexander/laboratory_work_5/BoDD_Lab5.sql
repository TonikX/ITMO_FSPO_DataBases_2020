/*Запрос 1. Вывести имена брокеров, их процент и бюро, в которых они состоят. Отсортировать результат по проценту в порядке возрастания.*/
select "Broker".name, "BrokersBureu".name, "Broker".percent
from public."Broker", public."BrokersBureu"
where "Broker".bureu_id = "BrokersBureu".id
order by "Broker".percent asc


/*Запрос 2. Вывести названия всех продуктов, доставленных до истечения срока годности.*/
select "Product".name, "Product".production_date, "Product".best_before_date, "Product".shipment_date
from public."Product"
where "Product".shipment_date is not null and "Product".shipment_date < "Product".best_before_date


/*Запрос 3. Вывести все просроченные товары, которые не были доставлены, вместе с тем временем, что они пролежали на складе на момент 17 мая 2020 года.*/
select "Product".name, "Product".production_date, "Product".best_before_date, age("Product".best_before_date)
from public."Product"
where "Product".best_before_date is not null and "Product".shipment_date is null 


/*Запрос 4. Вывести имена всех представителей биржи в верхнем регистре.*/
SELECT upper("ExchangesAgent".name) as "Name"
FROM public."ExchangesAgent"


/*Запрос 5. Вывести брокеров чей процент, что они отдают бюро, ниже среднего.*/
SELECT "Broker".name as "Name", "Broker".percent as "%"
FROM public."Broker"
WHERE "Broker".percent < (SELECT AVG("Broker".percent)
						  FROM public."Broker")


/*Запрос 6. Вывести наименование продукта, который стоит больше всего единиц за штуку, среди всех сделок. Также вывести эту цену.*/
SELECT "Product".name as "Name", (SELECT max("Product-Consignment".price_for_unit)
								  FROM public."Product-Consignment") as "Max Price"
FROM public."Product-Consignment", public."Product"
WHERE "Product-Consignment".price_for_unit = (SELECT max("Product-Consignment".price_for_unit)
											  FROM public."Product-Consignment")
											  	  and "Product-Consignment".product_id = "Product".id 


/*Запрос 7. Отобразить ID сделки и стоимость самого дорогого товара оттуда, но выводить нужно только те позиции, где самый дорогой товар стоит меньше 500.*/
SELECT "Product-Consignment".consignment_id, max("Product-Consignment".price_for_unit)
FROM public."Product-Consignment"
GROUP BY "Product-Consignment".consignment_id
HAVING max("Product-Consignment".price_for_unit) < 500


/*Запрос 8. Вывести Представителей Биржи, у которых полностью совпадает имя с каким-либо из Брокеров, и, соответственно, наоборот.*/
SELECT "ExchangesAgent".name as "Name"
FROM public."ExchangesAgent"
WHERE "ExchangesAgent".name = ANY(SELECT "Broker".name
								  FROM public."Broker")


/*Запрос 9. Вывести всех людей занесённых в базу данных «Биржа». Представленные в базе люди – Представители Биржы и Брокеры. Стоит заметить, что в предыдущем запросе было найдено, что есть люди являющиеся и брокерами, и представителями биржи.*/
SELECT "ExchangesAgent".name as "Name"
FROM public."ExchangesAgent"
WHERE "ExchangesAgent".name not in (SELECT "Broker".name
									FROM public."Broker")
UNION
SELECT "Broker".name as "Name"
FROM public."Broker"


/*Запрос 10. Вывести наименование самого дорогого товара из каждой сделки. Также вывести ID сделки.*/
SELECT "Product".name, "Product-Consignment".consignment_id, "Product-Consignment".price_for_unit
FROM public."Product-Consignment"
LEFT JOIN "Product"
ON "Product-Consignment".product_id = "Product".id
WHERE "Product-Consignment".price_for_unit in (SELECT MAX("Product-Consignment".price_for_unit)
											   FROM public."Product-Consignment"
											   GROUP BY "Product-Consignment".consignment_id)