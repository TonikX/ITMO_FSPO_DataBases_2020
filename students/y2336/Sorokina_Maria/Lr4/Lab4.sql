
-- Таблица животные

CREATE TABLE public.animal (
    view_animal text NOT NULL,
    date_animal date NOT NULL,
    sex_animal text NOT NULL,
    name_animal text NOT NULL,
    id_animal integer NOT NULL
);


-- Таблица птицы

CREATE TABLE public.bird (
    id_animal integer NOT NULL,
    view_bird text NOT NULL,
    name_bird text NOT NULL,
    data_here date NOT NULL,
    data_there date NOT NULL,
    sex_bird text NOT NULL,
    city_winter text NOT NULL,
    data_bird date NOT NULL,
    plase_winter text NOT NULL
);


-- Таблица места проживания животного

CREATE TABLE public.choice_habital (
    id_animal integer NOT NULL,
    name_habital text NOT NULL,
    optimal_habitat text NOT NULL
);

-- Таблица работников зоопарка

CREATE TABLE public.employee (
    id_employee integer NOT NULL,
    date_employee date NOT NULL,
    experience_employee integer NOT NULL
);


-- Таблица кормления

CREATE TABLE public.feeding (
    id_animal integer NOT NULL,
    id_employee integer NOT NULL,
    old_animal integer NOT NULL,
    num_ration integer NOT NULL,
    name_ration "char"[] NOT NULL,
    tip_ration "char"[] NOT NULL,
    podtip_ration "char"[] NOT NULL,
    id_feeding integer NOT NULL,
    "id_placeFeeding" integer NOT NULL,
    id_ration integer NOT NULL
);


-- Таблица зоны обитания

CREATE TABLE public.habital (
    name_habital text NOT NULL,
    location_habital text NOT NULL,
    chatacteristic_habital text NOT NULL
);


-- Таблица млекопитающих

CREATE TABLE public.mammal (
    date_mammal date NOT NULL,
    sex_mammal text NOT NULL,
    name_mammal text NOT NULL,
    view_mammal text NOT NULL,
    id_animal integer NOT NULL
);


-- Таблица места кормления

CREATE TABLE public."placeFeeding" (
    "time_placeFeeding" time with time zone NOT NULL,
    "id_placeFeeding" integer NOT NULL
);



-- Таблица рациона

CREATE TABLE public.ration (
    old_animal integer NOT NULL,
    health_animal "char"[] NOT NULL,
    shift_interval_ration date[] NOT NULL,
    breakfast_animal "char"[] NOT NULL,
    dinner_ration "char"[] NOT NULL,
    late_dinner_animal "char"[] NOT NULL,
    id_ration integer NOT NULL
);


-- Таблица рептилий

CREATE TABLE public.reptile (
    id_animal integer NOT NULL,
    date_reptile date NOT NULL,
    sex_reptile text NOT NULL,
    norm_temp_reptile integer NOT NULL,
    winter_sleep_reptile date NOT NULL,
    view_reptile text NOT NULL,
    name_reptile text NOT NULL
);



COPY PUBLIC.ANIMAL (VIEW_ANIMAL, DATE_ANIMAL, SEX_ANIMAL, NAME_ANIMAL, ID_ANIMAL) FROM STDIN;
CHICKEN  2020-02-27         M      NUFA        12345
CHICKEN	2019-05-26	W	NUFF	12344
KID	         2020-06-30	M	KIIL	         12222
KID	         2020-01-05	M	KUUL	12556
PIG	         2020-01-15	W	LOPA	2315
RABBIT	2018-05-06	W	PEPU	12485
KIT	         2017-09-19	W	ZUUPA	2365
CHICKEN	2020-02-25	W	LIP	         1
CHICKEN	2020-02-23	M	PIP	         2
CHICKEN	2020-02-14	M	ZIP	         22
LIZARD	2020-02-12	M	WIP	         3
LIZARD	2020-02-10	W	VIIP	         4
LIZARD	2020-02-09	M	QIE	         5
LIZARD	2020-02-08	M	SII	         6
LIZARD	2020-02-05	W	MII	         7
KM	         2020-02-27	M	MMM	         11111
\.

COPY PUBLIC.BIRD (ID_ANIMAL, VIEW_BIRD, NAME_BIRD, DATA_HERE, DATA_THERE, SEX_BIRD, CITY_WINTER, DATA_BIRD, PLASE_WINTER) FROM STDIN;
1 CHICKEN LIP 2020-05-05 2020-09-05 W KOLPINO 2020-02-25 RUSSIA                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   2	  CHICKEN	          PIP	      2020-05-05	       2020-09-05	        M	  SPB	          2020-02-23	RUSSIA
22	          CHICKEN	   ZIP 	2020-05-05	2020-09-05	M	MSK	2020-02-14	RUSSIA
12345	CHICKEN	   NUFA	2020-05-05	2020-09-05	M	MSK	2020-02-27	RUSSIA
12344	CHICKEN	   NUFF	2020-05-05	2020-09-05	W	MSK	2019-05-26	RUSSIA
\.

COPY PUBLIC.CHOICE_HABITAL (ID_ANIMAL, NAME_HABITAL, OPTIMAL_HABITAT) FROM STDIN;
12345        HH             MSK
12344	HHH	         MSK
12222	HHHH	SPB
12556	HHHHH	MSK
2315	         HHHHHH	MSK
12485	HH	         MSK
2365	         HHH	         MSK
1	         HHHH        SPB
2	         HHHHH	MSK
22	         HHHHHH	SPB
3	         HH	         MSK
4	         HHH	         MSK
5	         HHHH	MSK
6	         HHHHH	SPB
7	         HHHHHH	SPB
\.

COPY PUBLIC.EMPLOYEE (ID_EMPLOYEE, DATE_EMPLOYEE, EXPERIENCE_EMPLOYEE) FROM STDIN;
55     2000-12-15         2                                                                                                                                                                                                                                                                                                                                                                           56	1985-05-21	3
57	2000-03-02	4
58	1999-02-06	6
59	1998-03-02	1
\.

COPY PUBLIC.FEEDING (ID_ANIMAL, ID_EMPLOYEE, OLD_ANIMAL, NUM_RATION, NAME_RATION, TIP_RATION, PODTIP_RATION, ID_FEEDING, "ID_PLACEFEEDING", ID_RATION) FROM STDIN;

12345        55     2       99     {A}     {B}    {1}     1       1       99                                                                                                                                                                                                                                                                                                                                                                                                                               12344	55	2	99	{A}	{B}	{1}	2	2	99
12222	55	1	99	{A}	{B}	{1}	3	3	99
12556	56	2	98	{A}	{B}	{1}	4	4	98
2315	         56	3	98	{A}	{B}	{1}	5	5	98
12485	56	5	98	{A}	{B}	{1}	6	1	98
2365	         57	15	97	{A}	{B}	{1}	7	2	98
1	         57	1	97	{A}	{B}	{1}	8	3	95
2	         57	5	97	{A}	{B}	{1}	9	4	95
22	         58	2	96	{A}	{B}	{1}	10	5	95
3	         58	1	96	{A}	{B}	{1}	11	4	96
4	         58	1	96	{A}	{B}	{1}	12	5	96
5	         59	1	95	{A}	{B}	{1}	13	3	97
6	         59	1	95	{A}	{B}	{1}	14	2	97
7	         59	1	95	{A}	{B}	{1}	15	1	96
\.

COPY PUBLIC.HABITAL (NAME_HABITAL, LOCATION_HABITAL, CHATACTERISTIC_HABITAL) FROM STDIN;
HH            MSK          TEXT HHHHMM
HHH	        SPB	        TEXT HM
HHHH	KOLPINO	TEXT MM
HHHHH	MSK	         TEXT HMM
HHHHHH	MSK	         TEXT HMMM
\.

COPY PUBLIC.MAMMAL (DATE_MAMMAL, SEX_MAMMAL, NAME_MAMMAL, VIEW_MAMMAL, ID_ANIMAL) FROM STDIN;

2020-06-30         M      KILL           KID           12222
2020-01-05	M	KUUL	KID	        12556
2020-01-15	W	LOPA	PIG	        2315
2018-05-06	W	PEPU	RABBIT    12485
2017-09-19	W	ZUUPA	KIT	        2365
\.

COPY PUBLIC."PLACEFEEDING" ("TIME_PLACEFEEDING", "ID_PLACEFEEDING") FROM STDIN;

23:00:00+14:59   1
20:00:00+14:59	2
22:00:00+14:59	3
22:00:00+14:59	4
22:00:00+14:59	5
\.

COPY PUBLIC.RATION (OLD_ANIMAL, HEALTH_ANIMAL, SHIFT_INTERVAL_RATION, BREAKFAST_ANIMAL, DINNER_RATION, LATE_DINNER_ANIMAL, ID_RATION) FROM STDIN;

11     {A}     {2020-02-02}      {Q}    {Y}    {J}     99
10	{B}	{2020-02-22}	{W}	{U}	{H}	98
10	{F}	{2020-02-12}	{E}	{I}	{G}	97
15	{L}	{2020-03-02}	{R}	{O}	{S}	96
15	{P}	{2020-03-03}	{T}	{K}	{X}	95
\.

COPY PUBLIC.REPTILE (ID_ANIMAL, DATE_REPTILE, SEX_REPTILE, NORM_TEMP_REPTILE, WIN-TER_SLEEP_REPTILE, VIEW_REPTILE, NAME_REPTILE) FROM STDIN;

3       2020-02-12         M      37     2020-02-01         LIZARD     WIP
4	2020-02-10	W	37	2020-02-01	LIZARD	VIIP
5	2020-02-09	M	37	2020-02-01	LIZARD	QIE
6	2020-02-08	M	38	2020-02-01	LIZARD	SII
7	2020-02-05	W	37	2020-02-01	LIZARD	MII
\.

ALTER TABLE public.reptile OWNER TO postgres;

--
-- Data for Name: animal; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.animal (view_animal, date_animal, sex_animal, name_animal, id_animal) FROM stdin;
\.
COPY public.animal (view_animal, date_animal, sex_animal, name_animal, id_animal) FROM '$$PATH$$/2877.dat';

--
-- Data for Name: bird; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.bird (id_animal, view_bird, name_bird, data_here, data_there, sex_bird, city_winter, data_bird, plase_winter) FROM stdin;
\.
COPY public.bird (id_animal, view_bird, name_bird, data_here, data_there, sex_bird, city_winter, data_bird, plase_winter) FROM '$$PATH$$/2878.dat';

--
-- Data for Name: choice_habital; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.choice_habital (id_animal, name_habital, optimal_habitat) FROM stdin;
\.
COPY public.choice_habital (id_animal, name_habital, optimal_habitat) FROM '$$PATH$$/2879.dat';

--
-- Data for Name: employee; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.employee (id_employee, date_employee, experience_employee) FROM stdin;
\.
COPY public.employee (id_employee, date_employee, experience_employee) FROM '$$PATH$$/2880.dat';

--
-- Data for Name: feeding; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.feeding (id_animal, id_employee, old_animal, num_ration, name_ration, tip_ration, podtip_ration, id_feeding, "id_placeFeeding", id_ration) FROM stdin;
\.
COPY public.feeding (id_animal, id_employee, old_animal, num_ration, name_ration, tip_ration, podtip_ration, id_feeding, "id_placeFeeding", id_ration) FROM '$$PATH$$/2881.dat';

--
-- Data for Name: habital; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.habital (name_habital, location_habital, chatacteristic_habital) FROM stdin;
\.
COPY public.habital (name_habital, location_habital, chatacteristic_habital) FROM '$$PATH$$/2882.dat';

--
-- Data for Name: mammal; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.mammal (date_mammal, sex_mammal, name_mammal, view_mammal, id_animal) FROM stdin;
\.
COPY public.mammal (date_mammal, sex_mammal, name_mammal, view_mammal, id_animal) FROM '$$PATH$$/2883.dat';

--
-- Data for Name: placeFeeding; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."placeFeeding" ("time_placeFeeding", "id_placeFeeding") FROM stdin;
\.
COPY public."placeFeeding" ("time_placeFeeding", "id_placeFeeding") FROM '$$PATH$$/2884.dat';

--
-- Data for Name: ration; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ration (old_animal, health_animal, shift_interval_ration, breakfast_animal, dinner_ration, late_dinner_animal, id_ration) FROM stdin;
\.
COPY public.ration (old_animal, health_animal, shift_interval_ration, breakfast_animal, dinner_ration, late_dinner_animal, id_ration) FROM '$$PATH$$/2885.dat';

--
-- Data for Name: reptile; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.reptile (id_animal, date_reptile, sex_reptile, norm_temp_reptile, winter_sleep_reptile, view_reptile, name_reptile) FROM stdin;
\.
COPY public.reptile (id_animal, date_reptile, sex_reptile, norm_temp_reptile, winter_sleep_reptile, view_reptile, name_reptile) FROM '$$PATH$$/2886.dat';

--
-- Name: animal animal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.animal
    ADD CONSTRAINT animal_pkey PRIMARY KEY (id_animal);


--
-- Name: bird bird_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bird
    ADD CONSTRAINT bird_pkey PRIMARY KEY (id_animal);


--
-- Name: choice_habital choice_habital_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.choice_habital
    ADD CONSTRAINT choice_habital_pkey PRIMARY KEY (id_animal);


--
-- Name: employee employee_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employee
    ADD CONSTRAINT employee_pkey PRIMARY KEY (id_employee);


--
-- Name: feeding feeding_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.feeding
    ADD CONSTRAINT feeding_pkey PRIMARY KEY (id_feeding);


--
-- Name: habital habital_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.habital
    ADD CONSTRAINT habital_pkey PRIMARY KEY (name_habital);


--
-- Name: mammal mammal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mammal
    ADD CONSTRAINT mammal_pkey PRIMARY KEY (id_animal);


--
-- Name: placeFeeding placeFeeding_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."placeFeeding"
    ADD CONSTRAINT "placeFeeding_pkey" PRIMARY KEY ("id_placeFeeding");


--
-- Name: ration ration_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ration
    ADD CONSTRAINT ration_pkey PRIMARY KEY (id_ration);


--
-- Name: reptile reptile_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reptile
    ADD CONSTRAINT reptile_pkey PRIMARY KEY (id_animal);


--
-- Name: mammal id_animal; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mammal
    ADD CONSTRAINT id_animal FOREIGN KEY (id_animal) REFERENCES public.animal(id_animal);


--
-- Name: bird id_animal; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bird
    ADD CONSTRAINT id_animal FOREIGN KEY (id_animal) REFERENCES public.animal(id_animal);


--
-- Name: reptile id_animal; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reptile
    ADD CONSTRAINT id_animal FOREIGN KEY (id_animal) REFERENCES public.animal(id_animal);


--
-- Name: choice_habital id_animal; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.choice_habital
    ADD CONSTRAINT id_animal FOREIGN KEY (id_animal) REFERENCES public.animal(id_animal);


--
-- Name: feeding id_animal; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.feeding
    ADD CONSTRAINT id_animal FOREIGN KEY (id_animal) REFERENCES public.animal(id_animal);


--
-- Name: feeding id_emloyee; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.feeding
    ADD CONSTRAINT id_emloyee FOREIGN KEY (id_employee) REFERENCES public.employee(id_employee);


--
-- Name: feeding id_placeFeeding; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.feeding
    ADD CONSTRAINT "id_placeFeeding" FOREIGN KEY ("id_placeFeeding") REFERENCES public."placeFeeding"("id_placeFeeding");


--
-- Name: feeding id_ration; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.feeding
    ADD CONSTRAINT id_ration FOREIGN KEY (id_ration) REFERENCES public.ration(id_ration);


--
-- Name: choice_habital name_habital; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.choice_habital
    ADD CONSTRAINT name_habital FOREIGN KEY (name_habital) REFERENCES public.habital(name_habital);


--
-- PostgreSQL database dump complete
--

