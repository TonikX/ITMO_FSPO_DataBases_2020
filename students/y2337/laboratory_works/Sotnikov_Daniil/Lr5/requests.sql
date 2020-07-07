select "Company"."Name", "Company_worker"."Full_name" from public."
Company", public."Company_worker" where "Company"."ID_company"="
Company_worker"."ID_company" order by "Company_
worker"."Full_name"

select * from public."Company_worker" where ("ID_Company_worker">1
and "ID_company"<3)


select current_date - "Incident_day" as "Разница_в_днях",current_date,"Incident_
day" from public."Insurance_case"


select "Company"."Name" || '-' || "Company_worker"."Full_name" as "Company-
name","Company_worker"."Passport_data" from public."Company",
public."Company_worker" where "Company"."ID_company"="Company_
worker"."ID_company" order by "Company_worker"."Full_name"


select * from public."Company_worker" where ("ID_Company_worker">1
and "ID_company" in (select "ID_company" from public."Company" where
"ID_company"<3))

Select distinct max("ID_company") from public."Company";


select max("Company"."ID_company"),"Name" from public."Company"
group by "Company"."ID_company" having max("Company"."ID_company")
> 1


select * from public."Company_worker" where ("ID_Company_worker">1
and "ID_company" = any (select "ID_company" from public."Company"


select "ID_Insurance_case" from public."Insurance_case" where "Number_
of_injured" >= 200;

select "Full_name" from public."Insurance_agent" union select "Full_name"
from public."Company_worker"