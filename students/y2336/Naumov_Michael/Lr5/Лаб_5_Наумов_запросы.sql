/*Вывести всех альпинистов:*/
select "name_climber" from "climber";

/*Вывести все клубы из Санкт-Петербурга:*/
select "name_club" from "club" where "city_club"[1]='S';

/*Вывести самую высокую вершину*/
select "name_peak", "hight_peak" from "peak" where "hight_peak"=(select max("hight_peak") from "peak");

/*Вывести самую низкую вершину в России*/
select "name_peak", "hight_peak" from "peak" 
where "hight_peak"=(
	select min("hight_peak") 
	from "peak" as p, "mountain" as m 
	where p."id_mountain"=m."id_mountain" and "country_mountain"[1]='R'
);

/*Вывести количество несштатных ситуаций за последний год и сгруппировать по типу*/
select "type_situation", count(*) from "emergancy_situation" where "time_situation" between '00:00' and '12:00' group by "type_situation";

/*Вывести количество контрактов по гидам(гид-агенство) и сортировать по увеличению стажа*/
select "name_cicerone", count(*) from "cicerone" as c, "contract_cicerone" as cc where c."id_cicerone"=cc."id_cicerone" group by c."id_cicerone" order by "work_experience";

/*Вывести суммапные выплаты страховых по альпинистам*/
select "name_climber", sum("sum_reimbursement") as reimbursement  
from "climber" as c, "insurance_contract" as ic, "insurance_case" as i_case 
where c."id_climber"=ic."id_climber" and ic."id_insurance_contract"=i_case."id_insurance_contract" group by c."id_climber" order by reimbursement desc;

/*Вывести маршрут, на котором чаще всего происходят нестшатные ситуации*/
select "name_route" 
from "route" as r 
where (
	(select count(*) 
	 from "climbing" as c, "emergancy_situation" as es 
	 where r."id_route"=c."id_route" and c."id_climbing"=es."id_climbing")
)=(
	select max(c_es) from
	(
		select count(*)  as c_es
		from "route" as rt, "climbing" as c, "emergancy_situation" as es 
		where rt."id_route"=c."id_route" and c."id_climbing"=es."id_climbing" group by rt."id_route"
	) foo
);

/*Вывести группы, которые ходили на самую высокую вершину*/
select g."id_group" from "group" as g, "climbing" as c, "route" as r, "peak" as p 
where r."Id_peak"=p."id_peak" and r."id_route"=c."id_route" and g."id_group"=c."id_group" and "hight_peak" = (
	select max("hight_peak") from "route" as rt, "peak" as pk where rt."Id_peak"=pk."id_peak"
);

/*Вывести среднюю высоту вершин находящихся в России*/
select avg("hight_peak") from "peak" inner join "mountain" using(id_mountain) where "country_mountain"[1]='R'; 

