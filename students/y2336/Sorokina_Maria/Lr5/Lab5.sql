Запрос №1: вывести Id, вид и дату рождения всех млекопитающих, родившихся раньше 2016 года. Использовать объединение таблиц через inner join.
Sql – запрос: select "id_animal", "view_animal", "date_animal" from public."animal" inner join "mammal" using ("id_animal") where (select extract (year from "date_animal")) > 2016


Запрос №2: Вывести всех животных мужского пола, имя которых начинется на ‘c’
Sql – запрос: select * from public."animal" where "view_animal" like 'c%' and "sex_animal" = 'm'


Запрос №3: Вывести Id всех рабочих и Id накормленных ими животных со стажем больше 2 лет, которые кормили млекопитающих, родившихся позже 2016 года.
Sql – запрос: select distinct a."id_employee", a."experience_employee", b."id_animal" from public."employee" a  inner join "feeding" b using ("id_employee")  inner join "mammal" c using ("id_animal")  where a."experience_employee" > 2 and (select extract (year from c."date_mammal")) > 2016


Запрос №4: Вывести всех животных женского пола, родившихся после 2015 года.
Sql – запрос: select * from public."animal" a where (select extract (year from a."date_animal")) > 2015 and a."sex_animal" = 'w'


Запрос №5: Вывести Id и вид животных, которых хотя бы раз кормил работник зоопарка с Id 55.
Sql – запрос: select a."id_animal", a."view_animal" from public."animal" a  where exists (select 1 from public."feeding" b where a."id_animal" = b."id_animal" and b."id_employee" = 55) order by "id_animal"


Запрос №6: Вывести id, дату рождения и температуру тела рептилий, которые родились позже 2019 года и имеют температуру тела меньше 38.
Sql – запрос: select b."id_animal", b."date_reptile", b."norm_temp_reptile" from public."animal" a inner join "reptile" b using ("id_animal") where b."norm_temp_reptile" < 38 and (select extract(year from b."date_reptile")) > 2019


Запрос №7: Вывести id зон обитания, которые находятся в Москве и все id животных и их виды женского пола, которые живут там.
Sql – запрос: select a."name_habital", b."id_animal", b."view_animal" from public."choice_habital" a inner join "animal" b using ("id_animal")  where b."sex_animal" = 'w' and a."optimal_habitat" = 'MSK'


Запрос №8: Вывести всех птиц, которые зимуют в Колпино и совершают перелеты на протяжении менее 5 месяцев.
Sql – запрос: select b."id_animal", b."data_here", b."data_there", b."city_winter" from public."animal" a inner join "bird" b using ("id_animal") where b."city_winter" = 'Kolpino' and ((select extract(month from b."data_there")) - (select extract(month from b."data_here"))) < 5


Запрос №9: Вывести имена и пол млекопитающих, если оно мужского пола и имя начинается на K.
Sql – запрос: select name_mammal, sex_mammal from public."mammal" where sex_mammal = 'm' and name_mammal like 'K%'


Запрос №10: Вывести вид и имя куриц, зимующих в Москве и имя которых начинается на N.
Sql – запрос: select view_bird, name_bird from bird where name_bird like 'N%' and view_bird = 'chicken' and city_winter = 'MSK'
