Вывести ФИО хозяина, кличку и возраст собаки, имя хозяина которой начинается на I, возраст меньше 5 лет и которая хоть раз выступала на ринге с номером 1

SELECT h.familiya, h.imya, h.otchestvo, s.klichka, s.age FROM "Sobaka" s, "Hozyain" h 
	WHERE h.id_hozyain=s.id_hozyain AND h.imya LIKE 'I%' AND s.age < 5
	AND EXISTS(SELECT 1 FROM "Vistuplenie" v WHERE v.id_sobaka=s.id_sobaka AND v.id_ring=1);

Вывести кличку первой из самых старших собак

SELECT s.klichka FROM "Sobaka" s
	WHERE s.age=(SELECT MAX(age) FROM "Sobaka") LIMIT 1;

Вывести кличку и даты прививок и непройденного медосмотра собаки, разница между датой прививки и медосмотра которой минимальна

SELECT s.klichka, s.data_privivki, m.data_medosmotra, m.result FROM "Medosmotr" m, "Sobaka" s
	WHERE s.id_sobaka = m.id_sobaka AND m.result='-'
	ORDER BY abs(s.data_privivki-m.data_medosmotra) ASC LIMIT 1;

Вывести номер, тип и максимальную сумму оплаты участия в выставке человека, чья собака хоть раз не прошла медосмотр, для каждой выставки

SELECT o.id_vistavka, v.tip_vistavka, MAX(o.summa_oplati) FROM "Oplata" o
	INNER JOIN "Vistavka" v ON o.id_vistavka=v.id_vistavka
	WHERE EXISTS(SELECT 1 FROM "Medosmotr" m WHERE m.id_hozyain=o.id_hozyain AND m.result='-')
	GROUP BY o.id_vistavka, v.tip_vistavka;

Вывести все породы собак, которые принадлежат хотя бы одной собаке, хозяин которой родился в 1995 году или позже

SELECT p.nazvanie_poroda FROM "Poroda" p
	WHERE EXISTS (SELECT 1 FROM "Sobaka" s WHERE s.id_poroda=p.id_poroda AND
				 (SELECT h.data_rozhdeniya FROM "Hozyain" h WHERE h.id_hozyain=s.id_hozyain)>'1995-01-01');

Вывести клички собак и время их выступления на выставках, сумма спонсирования которых превышает 500000 рублей

SELECT s.klichka, t.vremya FROM "Vistuplenie" t, "Sobaka" s
	WHERE t.id_sobaka=s.id_sobaka AND 
	EXISTS(SELECT 1 FROM "Sponsirovanie_vistavki" sv
		   WHERE sv.id_vistavka = t.id_vistavka 
		   GROUP BY sv.id_vistavka 
		   HAVING SUM(sv.summa_sponsirovaniya)>500000);

Вывести ФИО и даты рождения спонсоров, которые спонсировали выставки в общем более чем на 400000 рублей

SELECT n.familiya, n.imya, n.otchestvo, n.data_rozhdeniya FROM "Sponsor" n
	WHERE (SELECT SUM(summa_sponsirovaniya) FROM "Sponsirovanie_vistavki" sv 
		   WHERE n.id_sposnor=sv.id_sponsor)>400000;

Вывести клички и средние оценки собак по всем выступлениям, если средняя оценка собаки не менее 8.5

SELECT s.klichka, SUM(oe.ocenka)/COUNT(oe.ocenka) FROM "Sobaka" s
	INNER JOIN "Vistuplenie" v ON s.id_sobaka=v.id_sobaka
	INNER JOIN "Ocenka_Experta" oe ON oe.id_vistuplenia=v.id_vistuplenie
	GROUP BY s.klichka
	HAVING SUM(oe.ocenka)/COUNT(oe.ocenka)>=8.5;

Вывести кличку собаки, название клуба и его номер для всех собак, которых хотя бы раз оценивал эксперт, состоящий в том же клубе, что и собака

SELECT DISTINCT c.nazvanie_club, s.klichka, c.id_club FROM "Club" c 
	INNER JOIN "Sobaka" s ON s.id_club = c.id_club
	WHERE EXISTS (SELECT 1 FROM "Ocenka_Experta" oe WHERE (SELECT e.id_klub FROM "Expert" e WHERE e.id_expert=oe.id_experta)=s.id_club);

Вывести номера и названия клубов, у которых нет ни одного эксперта

SELECT c.id_club, c.nazvanie_club FROM "Club" c
	WHERE NOT EXISTS(SELECT 1 FROM "Expert" e WHERE e.id_klub=c.id_club);
