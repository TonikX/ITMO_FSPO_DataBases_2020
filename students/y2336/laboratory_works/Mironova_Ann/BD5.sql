--
-- PostgreSQL database dump
--

-- Dumped from database version 11.7
-- Dumped by pg_dump version 11.7

-- Started on 2020-04-23 18:52:22

--СОЗДАНИЕ СТРУКТУРЫ ТАБЛИЦ
CREATE TABLE public."Vacancy" (
    "ID_Vacancy" integer NOT NULL,
    "ConditionVacancies" text NOT NULL,
    "NumberDays" integer NOT NULL,
    "Requirements" text NOT NULL,
    "Salary" integer NOT NULL,
    "ID_Employer" integer NOT NULL
);

CREATE TABLE PUBLIC." COURSE" (
    "ID_COURSE" INTEGER NOT NULL,
    "DISCHARGBYMASTEREDPROFESSIONS" TEXT,
    "COURSEPRICE" INTEGER,
    "ID_PROFESSION" INTEGER
);
 
 CREATE TABLE PUBLIC." JOBSEEKER" (
    " LASTSALARY" INTEGER NOT NULL,
    " JOBSUBMISSIONDATE" DATE,
    "ID_JOBSEEKER" INTEGER NOT NULL,
    "FULLNAME" TEXT NOT NULL,
    "CONTACTDETAILS" TEXT
);
     
       
  CREATE TABLE PUBLIC."ALLOWANCE" (
    " BENEFITRATE" INTEGER NOT NULL,
    "BENEFITSTARTINFORMATION" DATE,
    "BENEFITFINISHINFORMATION" DATE,
    "ID_ALLOWANCE" INTEGER NOT NULL,
    "ID_JOBSEEKER" INTEGER NOT NULL
);
 ¬  
      
     
CREATE TABLE PUBLIC."EMPLOYER" (
    "ID_EMPLOYER" INTEGER NOT NULL,
    "DATA" TEXT,
    "FIELDOFACTIVITY" TEXT,
    "REVIEWS" TEXT
);
 
       
    
CREATE TABLE PUBLIC."PROFESSION" (
    "ID_PROFESSION" INTEGER NOT NULL,
    "SPECIALTY" TEXT NOT NULL
);
     
       
     
 CREATE TABLE PUBLIC."SUMMARY" (
    "ID_SUMMARY" INTEGER NOT NULL,
    "DESIREDPOSITION" TEXT,
    "DESIREDSALARY" TEXT,
    " EDUCATION" TEXT,
    "ID_JOBSEEKER" INTEGER NOT NULL
);

--СОЗДАНИЕ ПЕРВИЧНЫХ И ВНЕШНИХ КЛЮЧЕЙ КЛЮЧЕЙ
ALTER TABLE ONLY PUBLIC."PROFESSION"
ADD CONSTRAINT "    ID_PROFESSION" PRIMARY KEY ("ID_PROFESSION") INCLUDE ("ID_PROFESSION");
ALTER TABLE ONLY PUBLIC."PROFESSION" DROP CONSTRAINT "     ID_PROFESSION";
ALTER TABLE ONLY PUBLIC." COURSE"
ADD CONSTRAINT " COURSE_PKEY" PRIMARY KEY ("ID_COURSE");
ALTER TABLE ONLY PUBLIC." COURSE" DROP CONSTRAINT " COURSE_PKEY";
ALTER TABLE ONLY PUBLIC."ALLOWANCE"
ADD CONSTRAINT "ALLOWANCE_PKEY" PRIMARY KEY ("ID_ALLOWANCE");
ALTER TABLE ONLY PUBLIC."ALLOWANCE" DROP CONSTRAINT "ALLOWANCE_PKEY";
ADD CONSTRAINT "EMPLOYER_PKEY" PRIMARY KEY ("ID_EMPLOYER");
ALTER TABLE ONLY PUBLIC."EMPLOYER" DROP CONSTRAINT "EMPLOYER_PKEY";
ALTER TABLE ONLY PUBLIC."SUMMARY"
ADD CONSTRAINT "ID_SUMMARY" PRIMARY KEY ("ID_SUMMARY");
ALTER TABLE ONLY PUBLIC."SUMMARY" DROP CONSTRAINT "ID_SUMMARY";
ALTER TABLE ONLY PUBLIC." JOBSEEKER"
ADD CONSTRAINT "JOBSEEKER_PKEY" PRIMARY KEY ("ID_JOBSEEKER");
ALTER TABLE ONLY PUBLIC." JOBSEEKER" DROP CONSTRAINT "JOBSEEKER_PKEY";
ALTER TABLE ONLY PUBLIC."VACANCY"
ADD CONSTRAINT "VACANCY_PKEY" PRIMARY KEY ("ID_VACANCY");
ALTER TABLE ONLY PUBLIC."VACANCY" DROP CONSTRAINT "VACANCY_PKEY";
ALTER TABLE ONLY PUBLIC."VACANCY"

ADD CONSTRAINT "ID_EMPLOYER" FOREIGN KEY ("ID_EMPLOYER") REFERENCES PUBLIC.
"EMPLOYER"("ID_EMPLOYER");
ALTER TABLE ONLY PUBLIC."VACANCY" DROP CONSTRAINT "ID_EMPLOYER";
ALTER TABLE ONLY PUBLIC."ALLOWANCE"
ADD CONSTRAINT "ID_JOBSEEKER" FOREIGN KEY ("ID_JOBSEEKER") REFERENCES PUBLIC."JOBSEEKER"("ID_JOBSEEKER");
ALTER TABLE ONLY PUBLIC."ALLOWANCE" DROP CONSTRAINT "ID_JOBSEEKER";
ALTER TABLE ONLY PUBLIC."SUMMARY"
ADD CONSTRAINT "ID_JOBSEEKER" FOREIGN KEY ("ID_JOBSEEKER") REFERENCES PUBLIC."JOBSEEKER"("ID_JOBSEEKER");
ALTER TABLE ONLY PUBLIC."SUMMARY" DROP CONSTRAINT "ID_JOBSEEKER"; 
ALTER TABLE ONLY PUBLIC." COURSE"
ADD CONSTRAINT "ID_PROFESSION" FOREIGN KEY ("ID_PROFESSION") REFERENCES PUBLIC."PROFESSION"("ID_PROFESSION");
ALTER TABLE ONLY PUBLIC." COURSE" DROP CONSTRAINT "ID_PROFESSION";

--ЗАПОЛНЕНИЕ ТАБЛИЦ
COPY PUBLIC." COURSE" ("ID_COURSE", "DISCHARGBYMASTEREDPROFESSIONS", "COURSEPRICE", "ID_PROFESSION") FROM STDIN;

3  	MECHANIC        12000   1
2       JOURNALIST      5000    2
4       LAWYER  	6000    3
1       JOURNALIST      8500    3
5       NURSE   	3000    4
6       PHOTOGRAPHER    15000   5
\.

COPY PUBLIC." JOBSEEKER" (" LASTSALARY", " JOBSUBMISSIONDATE", "ID_JOBSEEKER", "FULLNAME", "CONTACTDETAILS") FROM STDIN;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  15000 2000-10-25      1       ALEKSANDR       DARK ANGEL
23000   2009-01-20      2       ANDREY  BUMPERBUTT
44000   2009-10-15      3       ARKADY   DANA
7800    2010-01-05      4       ARTUR   ASDEENNER
67600   2011-11-21      5       BORIS   BUEHNER
45000   2009-09-12      6       VADIM   TROFHOLZ
12000   2000-12-08      7       VALENTIN         LEMOON
16000   2001-10-24      8       GENNADY BUEHNER1
24000   2004-11-05      9       GENNADY BUNBUTT
25000   2009-10-23      10      DENIS    LEMOON2
\.
COPY PUBLIC."ALLOWANCE" (" BENEFITRATE", "BENEFITSTARTINFORMATION", "BENEFITFINISHINFORMATION", "ID_ALLOWANCE", "ID_JOBSEEKER") FROM STDIN;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          1    RETAIL GROUP ENGINEER        GOOD
2       EVRAZ   DOCTOR  	GOOD
3       UCRUSAL ACCOUNTANT      BAD
4       VEON    ACCOUNTANT      BAD
5       DNS     CASHIER 	GOOD
6       MAJOR   ACCOUNTANT      GOOD
\.
COPY PUBLIC."PROFESSION" ("ID_PROFESSION", "SPECIALTY") FROM STDIN;
                                                                                                                                                                                                                                                                                                                                                                           1       ACCOUNTANT
2       BUILDER
3       COOK
4       DESIGNER
5       DRIVER
6       ENGINEER
\.
COPY PUBLIC."SUMMARY" ("ID_SUMMARY", "DESIREDPOSITION", "DESIREDSALARY", " EDUCATION", "ID_JOBSEEKER") FROM STDIN;
                                                                                                                                                                                                                                                                                                                                                                                                                                                            1       JUNIOR MANAGER  10000   HIGHER EDUCATION        2
2       CEO     56000   HIGHER EDUCATION        3
3       MD      90000   HIGHER EDUCATION        1
4       CEO     79000   SECONDARY EDUCATION     1
5       MD      35000   HIGHER EDUCATION        5
6       CEO     50000   SECONDARY EDUCATION     6
7       MIDDLE MANAGER  30000   HIGHER EDUCATION        4
8       CAO     25000   HIGHER EDUCATION        3
9       MD      75000   HIGHER EDUCATION        4
10      JUNIOR MANAGER  20000   SECONDARY EDUCATION     6
\.


COPY public."Vacancy" ("ID_Vacancy", "ConditionVacancies", "NumberDays", "Requirements", "Salary", "ID_Employer") FROM stdin;
12	Full time work	10	Accountant	33000	1
13	Full time work	23	Builder	100000	2
11	Full time work	45	Cashier	14000	3
10	Full time work	1	Designer	56000	4
14	Part time	3	Designer	44000	5
15	Part time	7	Driver	150000	4
16	Part time	5	Driver	75000	4
17	Part time	4	Engineer	60000	2
\.
--ЗАПРОСЫ
--1)Показать список требований в вакансиях, у которых зар-плата больше 15550 и полная занятость дня.
SELECT "Requirements" FROM public."Vacancy" where( "Salary">15500 and "ConditionVacancies"='Part time') Order BY "NumberDays"

--2)Определить работодателей, у которых есть выставленные вакансии
SELECT "ID_Employer" FROM "Employer" INTERSECT SELECT "ID_Employer" FROM "Vacancy" order by "ID_Employer"

--3)Показать отсортированные по возрастанию специальности, где курсы по повышению квалификации относятся к про-фессии Медсестра и цена курсов больше 1000. 
SELECT "Specialty" from public." Course" , pub-lic."Profession" where( "Dischargbymasteredprofessions" = 'Nurse' and "CoursePrice">1000) Order BY "Specialty"

--4)Посчитать количество соискателей, у которых есть посо-бие, которое больше их последней заработной платы
SELECT count(" JobSeeker"."ID_JobSeeker") FROM pub-lic."Allowance", public."Summary", public." JobSeeker" where(" JobSeeker"."ID_JobSeeker"="Allowance"."ID_JobSeeker" and " JobSeeker"."ID_JobSeeker"="Summary"."ID_JobSeeker" and "DesiredSalary" < " BenefitRate")

--5)Показать список работодателей, у которых плохие отзы-вы и объединить с повторениями со списком работодателей, в вакансиях которых частичная занятость
SELECT "ID_Employer" FROM "Employer" where( "Re-views"='Bad')  UNION ALL SELECT "ID_Employer" FROM "Vacancy" where( "ConditionVacancies"='Part time') order by "ID_Employer"

--6)Показать специальности, которые совпадают по с вакан-сиями, у которых количество дней с момента предложения ва-кансии для незакрытых вакансий больше 10
Select "Specialty" from "Profession" where EXISTS ( Select "Requirements" from "Vacancy" where "NumberDays">10)

--7)Показать список специальностей и квалификации, для ко-торых курсы стоят больше 5000
SELECT "Specialty", "Dischargbymasteredprofessions" from public." Course" , public."Profession" where( "Course-Price">5000)  GROUP BY "Specialty", "Dischargbymas-teredprofessions"

--8)Показать работодателей, у которых хорошие отзывы и объединить их с их вакансиями, у которых полная рабочая за-нятость.
SELECT "ID_Employer" FROM "Employer" where( "Re-views"='Good') UNION SELECT "ID_Employer" FROM "Vacan-cy" where( "ConditionVacancies"='Full time work') order by "ID_Employer"

--9)Посчитать количество дней выплат пособий
SELECT "ID_Allowance","BenefitStartInformation","BenefitFinishInformation","BenefitFinishInformation"-"BenefitStartInformation" FROM public."Allowance"

--10)Показать цену курса по повышению квалификации, кото-рую можно получить при специальности Водитель. Отсорти-ровать по названию квалификации
SELECT "Dischargbymasteredprofessions", "CoursePrice" from public." Course" , public."Profession" where( "Specialty" = 'Driver') ORDER BY  "Dischargbymasteredprofessions", "CoursePrice"

--11)Подсчитать количество вакансий, в которых требуется высшее образование и заработная плата от 5000 до 60000.
SELECT count("Vacancy") FROM public."Vacancy" where( "Salary">5000 and "Salary"<60000)

--12)Подсчитать количество выплачиваемых пособий на текущий момент.
SELECT count("Allowance") FROM public."Allowance" where("BenefitFinishInformation"!=NULL)

--13)Посчитать количество дней с момента предложения вакансии для незакрытых вакансий.
SELECT "ID_Vacancy","NumberDays" FROM pub-lic."Vacancy"

--14)Получить все возможные варианты вакансий для соискалей.
SELECT * FROM public."Vacancy"

--15)Выбор профессий соискателей, не представленных в таб-лице Вакансии.
SELECT "Specialty" FROM public."Profession", pub-lic."Vacancy" where "Specialty"!="Requirements" group by "Spe-cialty";


-- TOC entry 2707 (class 2606 OID 16519)
-- Name: Vacancy Vacancy_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Vacancy"
    ADD CONSTRAINT "Vacancy_pkey" PRIMARY KEY ("ID_Vacancy");


--
-- TOC entry 2708 (class 2606 OID 16520)
-- Name: Vacancy 	ID_Employer; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Vacancy"
    ADD CONSTRAINT "	ID_Employer" FOREIGN KEY ("ID_Employer") REFERENCES public."Employer"("ID_Employer");


-- Completed on 2020-04-23 18:52:22

--
-- PostgreSQL database dump complete
--

