--
-- NOTE:
--
-- File paths need to be edited. Search for $$PATH$$ and
-- replace it with the path to the directory containing
-- the extracted data files.
--
--
-- PostgreSQL database dump
--

-- Dumped from database version 11.9
-- Dumped by pg_dump version 11.9

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE rogulev;
--
-- Name: rogulev; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE rogulev WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Russian_Russia.1251' LC_CTYPE = 'Russian_Russia.1251';


ALTER DATABASE rogulev OWNER TO postgres;

\connect rogulev

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: gostinitsa; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA gostinitsa;


ALTER SCHEMA gostinitsa OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: Админ гостиницы; Type: TABLE; Schema: gostinitsa; Owner: postgres
--

CREATE TABLE gostinitsa."Админ гостиницы" (
    "ФИО Админа" text NOT NULL,
    "Должность" text,
    "Время работы" integer,
    "Образование" text,
    "Номер паспорта" integer
);


ALTER TABLE gostinitsa."Админ гостиницы" OWNER TO postgres;

--
-- Name: Договор найма; Type: TABLE; Schema: gostinitsa; Owner: postgres
--

CREATE TABLE gostinitsa."Договор найма" (
    "ФИО Служащего" text NOT NULL,
    "ФИО Админа" text NOT NULL,
    "Статус работы" text,
    "Зарплата" integer
);


ALTER TABLE gostinitsa."Договор найма" OWNER TO postgres;

--
-- Name: Договор проживания; Type: TABLE; Schema: gostinitsa; Owner: postgres
--

CREATE TABLE gostinitsa."Договор проживания" (
    "ФИО Проживающего" text NOT NULL,
    "ФИО Админа" text NOT NULL,
    "Номер" integer NOT NULL,
    "Номер договора" integer,
    "Номер паспорта" integer,
    "Статус проживания" text,
    "Дата начала проживания" date,
    "Время проживания" integer,
    "Стоимость" integer
);


ALTER TABLE gostinitsa."Договор проживания" OWNER TO postgres;

--
-- Name: Заказ; Type: TABLE; Schema: gostinitsa; Owner: postgres
--

CREATE TABLE gostinitsa."Заказ" (
    "ФИО Проживаюещго" text NOT NULL,
    "ФИО Админа" text NOT NULL,
    "ФИО Служащего" text NOT NULL,
    "Номер" integer NOT NULL,
    "Дата заказа" date,
    "Дата для выполнения" date,
    "Описание" text
);


ALTER TABLE gostinitsa."Заказ" OWNER TO postgres;

--
-- Name: Номер; Type: TABLE; Schema: gostinitsa; Owner: postgres
--

CREATE TABLE gostinitsa."Номер" (
    "Номер" integer NOT NULL,
    "Стоимость" integer
);


ALTER TABLE gostinitsa."Номер" OWNER TO postgres;

--
-- Name: Проживающий; Type: TABLE; Schema: gostinitsa; Owner: postgres
--

CREATE TABLE gostinitsa."Проживающий" (
    "ФИО Проживающего" text NOT NULL,
    "Номер паспорта" integer,
    "Город" text,
    "Дата поселения" date,
    "Время жительства" integer
);


ALTER TABLE gostinitsa."Проживающий" OWNER TO postgres;

--
-- Name: Расписание уборки; Type: TABLE; Schema: gostinitsa; Owner: postgres
--

CREATE TABLE gostinitsa."Расписание уборки" (
    "ФИО Админа" text NOT NULL,
    "ФИО Служащего" text NOT NULL,
    "День недели уборки" integer,
    "Этаж уборки" integer,
    "Дата уборки" date,
    "Время уборки" integer
);


ALTER TABLE gostinitsa."Расписание уборки" OWNER TO postgres;

--
-- Name: Служащий; Type: TABLE; Schema: gostinitsa; Owner: postgres
--

CREATE TABLE gostinitsa."Служащий" (
    "ФИО Служащего" text NOT NULL,
    "Стаж" integer,
    "Должность" text,
    "Номер паспорта" integer
);


ALTER TABLE gostinitsa."Служащий" OWNER TO postgres;

--
-- Name: Уборка; Type: TABLE; Schema: gostinitsa; Owner: postgres
--

CREATE TABLE gostinitsa."Уборка" (
    "Номер" text NOT NULL,
    "ФИО Админа" text NOT NULL,
    "ФИО Служащего" text NOT NULL,
    "Состояние" text,
    "Дата начала" date,
    "Время уборки" integer
);


ALTER TABLE gostinitsa."Уборка" OWNER TO postgres;

--
-- Data for Name: Админ гостиницы; Type: TABLE DATA; Schema: gostinitsa; Owner: postgres
--

COPY gostinitsa."Админ гостиницы" ("ФИО Админа", "Должность", "Время работы", "Образование", "Номер паспорта") FROM stdin;
\.
COPY gostinitsa."Админ гостиницы" ("ФИО Админа", "Должность", "Время работы", "Образование", "Номер паспорта") FROM '$$PATH$$/2853.dat';

--
-- Data for Name: Договор найма; Type: TABLE DATA; Schema: gostinitsa; Owner: postgres
--

COPY gostinitsa."Договор найма" ("ФИО Служащего", "ФИО Админа", "Статус работы", "Зарплата") FROM stdin;
\.
COPY gostinitsa."Договор найма" ("ФИО Служащего", "ФИО Админа", "Статус работы", "Зарплата") FROM '$$PATH$$/2854.dat';

--
-- Data for Name: Договор проживания; Type: TABLE DATA; Schema: gostinitsa; Owner: postgres
--

COPY gostinitsa."Договор проживания" ("ФИО Проживающего", "ФИО Админа", "Номер", "Номер договора", "Номер паспорта", "Статус проживания", "Дата начала проживания", "Время проживания", "Стоимость") FROM stdin;
\.
COPY gostinitsa."Договор проживания" ("ФИО Проживающего", "ФИО Админа", "Номер", "Номер договора", "Номер паспорта", "Статус проживания", "Дата начала проживания", "Время проживания", "Стоимость") FROM '$$PATH$$/2858.dat';

--
-- Data for Name: Заказ; Type: TABLE DATA; Schema: gostinitsa; Owner: postgres
--

COPY gostinitsa."Заказ" ("ФИО Проживаюещго", "ФИО Админа", "ФИО Служащего", "Номер", "Дата заказа", "Дата для выполнения", "Описание") FROM stdin;
\.
COPY gostinitsa."Заказ" ("ФИО Проживаюещго", "ФИО Админа", "ФИО Служащего", "Номер", "Дата заказа", "Дата для выполнения", "Описание") FROM '$$PATH$$/2859.dat';

--
-- Data for Name: Номер; Type: TABLE DATA; Schema: gostinitsa; Owner: postgres
--

COPY gostinitsa."Номер" ("Номер", "Стоимость") FROM stdin;
\.
COPY gostinitsa."Номер" ("Номер", "Стоимость") FROM '$$PATH$$/2857.dat';

--
-- Data for Name: Проживающий; Type: TABLE DATA; Schema: gostinitsa; Owner: postgres
--

COPY gostinitsa."Проживающий" ("ФИО Проживающего", "Номер паспорта", "Город", "Дата поселения", "Время жительства") FROM stdin;
\.
COPY gostinitsa."Проживающий" ("ФИО Проживающего", "Номер паспорта", "Город", "Дата поселения", "Время жительства") FROM '$$PATH$$/2856.dat';

--
-- Data for Name: Расписание уборки; Type: TABLE DATA; Schema: gostinitsa; Owner: postgres
--

COPY gostinitsa."Расписание уборки" ("ФИО Админа", "ФИО Служащего", "День недели уборки", "Этаж уборки", "Дата уборки", "Время уборки") FROM stdin;
\.
COPY gostinitsa."Расписание уборки" ("ФИО Админа", "ФИО Служащего", "День недели уборки", "Этаж уборки", "Дата уборки", "Время уборки") FROM '$$PATH$$/2860.dat';

--
-- Data for Name: Служащий; Type: TABLE DATA; Schema: gostinitsa; Owner: postgres
--

COPY gostinitsa."Служащий" ("ФИО Служащего", "Стаж", "Должность", "Номер паспорта") FROM stdin;
\.
COPY gostinitsa."Служащий" ("ФИО Служащего", "Стаж", "Должность", "Номер паспорта") FROM '$$PATH$$/2855.dat';

--
-- Data for Name: Уборка; Type: TABLE DATA; Schema: gostinitsa; Owner: postgres
--

COPY gostinitsa."Уборка" ("Номер", "ФИО Админа", "ФИО Служащего", "Состояние", "Дата начала", "Время уборки") FROM stdin;
\.
COPY gostinitsa."Уборка" ("Номер", "ФИО Админа", "ФИО Служащего", "Состояние", "Дата начала", "Время уборки") FROM '$$PATH$$/2861.dat';

--
-- Name: Админ гостиницы Админ гостиницы2_pkey; Type: CONSTRAINT; Schema: gostinitsa; Owner: postgres
--

ALTER TABLE ONLY gostinitsa."Админ гостиницы"
    ADD CONSTRAINT "Админ гостиницы2_pkey" PRIMARY KEY ("ФИО Админа");


--
-- Name: Номер Номер_pkey; Type: CONSTRAINT; Schema: gostinitsa; Owner: postgres
--

ALTER TABLE ONLY gostinitsa."Номер"
    ADD CONSTRAINT "Номер_pkey" PRIMARY KEY ("Номер");


--
-- Name: Проживающий Проживающий_pkey; Type: CONSTRAINT; Schema: gostinitsa; Owner: postgres
--

ALTER TABLE ONLY gostinitsa."Проживающий"
    ADD CONSTRAINT "Проживающий_pkey" PRIMARY KEY ("ФИО Проживающего");


--
-- Name: Служащий Служащий_pkey; Type: CONSTRAINT; Schema: gostinitsa; Owner: postgres
--

ALTER TABLE ONLY gostinitsa."Служащий"
    ADD CONSTRAINT "Служащий_pkey" PRIMARY KEY ("ФИО Служащего");


--
-- PostgreSQL database dump complete
--

