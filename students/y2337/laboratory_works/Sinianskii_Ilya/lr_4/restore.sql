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

-- Dumped from database version 10.14
-- Dumped by pg_dump version 10.14

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

ALTER TABLE ONLY "Библиотека"."Запись_в_зал" DROP CONSTRAINT "Номер_читательского_билета";
ALTER TABLE ONLY "Библиотека"."Взятие_книги_в_зал" DROP CONSTRAINT "Номер_читательского_билета";
ALTER TABLE ONLY "Библиотека"."Взятие_книги_домой" DROP CONSTRAINT "Номер_читательского_билета";
ALTER TABLE ONLY "Библиотека"."Запись_в_зал" DROP CONSTRAINT "Номер_зала__";
ALTER TABLE ONLY "Библиотека"."Закрепленные_книги" DROP CONSTRAINT "Номер_зала";
ALTER TABLE ONLY "Библиотека"."Взятие_книги_в_зал" DROP CONSTRAINT "Номер_зала";
ALTER TABLE ONLY "Библиотека"."Взятие_книги_в_зал" DROP CONSTRAINT "ID_экземпляра_";
ALTER TABLE ONLY "Библиотека"."Закрепленные_книги" DROP CONSTRAINT "ID_экземпляра";
ALTER TABLE ONLY "Библиотека"."Взятие_книги_домой" DROP CONSTRAINT "ID_экземпляра";
ALTER TABLE ONLY "Библиотека"."Экземпляр " DROP CONSTRAINT "ID_книги";
DROP INDEX "Библиотека"."fki_Номер_читательского_билета__";
DROP INDEX "Библиотека"."fki_Номер_читательского_билета_";
DROP INDEX "Библиотека"."fki_Номер_читательского_билета";
DROP INDEX "Библиотека"."fki_Номер_зала__";
DROP INDEX "Библиотека"."fki_Номер_зала_";
DROP INDEX "Библиотека"."fki_Номер_зала";
DROP INDEX "Библиотека"."fki_ID_экземпляра__";
DROP INDEX "Библиотека"."fki_ID_экземпляра_";
DROP INDEX "Библиотека"."fki_ID_экземпляра";
DROP INDEX "Библиотека"."fki_ID_книги";
ALTER TABLE ONLY "Библиотека"."Экземпляр " DROP CONSTRAINT "Экземпляр _pkey";
ALTER TABLE ONLY "Библиотека"."Читатели" DROP CONSTRAINT "Читатели_pkey";
ALTER TABLE ONLY "Библиотека"."Читальные_залы" DROP CONSTRAINT "Читальные_залы_pkey";
ALTER TABLE ONLY "Библиотека"."Книги" DROP CONSTRAINT "Книги_pkey";
ALTER TABLE ONLY "Библиотека"."Запись_в_зал" DROP CONSTRAINT "Запись_в_зал_pkey";
ALTER TABLE ONLY "Библиотека"."Закрепленные_книги" DROP CONSTRAINT "Закрепленные_книги_pkey";
ALTER TABLE ONLY "Библиотека"."Взятие_книги_домой" DROP CONSTRAINT "Взятие_книги_домой_pkey";
ALTER TABLE ONLY "Библиотека"."Взятие_книги_в_зал" DROP CONSTRAINT "Взятие_книги_в_зал_pkey";
DROP TABLE "Библиотека"."Экземпляр ";
DROP TABLE "Библиотека"."Читатели";
DROP TABLE "Библиотека"."Читальные_залы";
DROP TABLE "Библиотека"."Книги";
DROP TABLE "Библиотека"."Запись_в_зал";
DROP TABLE "Библиотека"."Закрепленные_книги";
DROP TABLE "Библиотека"."Взятие_книги_домой";
DROP TABLE "Библиотека"."Взятие_книги_в_зал";
DROP EXTENSION plpgsql;
DROP SCHEMA "Библиотека";
DROP SCHEMA public;
--
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- Name: Библиотека; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA "Библиотека";


ALTER SCHEMA "Библиотека" OWNER TO postgres;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: Взятие_книги_в_зал; Type: TABLE; Schema: Библиотека; Owner: postgres
--

CREATE TABLE "Библиотека"."Взятие_книги_в_зал" (
    "Номер_читательского_билета" integer NOT NULL,
    "Номер_зала" integer NOT NULL,
    "ID_экземпляра" integer NOT NULL,
    "Дата_взятия_книги" date NOT NULL,
    "Дата_возвращения_книги" date,
    "ID_операции" integer NOT NULL
);


ALTER TABLE "Библиотека"."Взятие_книги_в_зал" OWNER TO postgres;

--
-- Name: Взятие_книги_домой; Type: TABLE; Schema: Библиотека; Owner: postgres
--

CREATE TABLE "Библиотека"."Взятие_книги_домой" (
    "Номер_читательского_билета" integer NOT NULL,
    "ID_экземпляра" integer NOT NULL,
    "Дата_взятия_книги" date NOT NULL,
    "Дата предполагаемого_возвращения_" date NOT NULL,
    "Дата фактического_возвращения_кни" date,
    "ID_операции" integer NOT NULL
);


ALTER TABLE "Библиотека"."Взятие_книги_домой" OWNER TO postgres;

--
-- Name: Закрепленные_книги; Type: TABLE; Schema: Библиотека; Owner: postgres
--

CREATE TABLE "Библиотека"."Закрепленные_книги" (
    "Номер_зала" integer NOT NULL,
    "ID_экземпляра" integer NOT NULL,
    "Дата_закрепления" date NOT NULL,
    "Дата_взятия_книги" date NOT NULL,
    "Дата_возвращения_книги" date,
    "ID_операции" integer NOT NULL
);


ALTER TABLE "Библиотека"."Закрепленные_книги" OWNER TO postgres;

--
-- Name: Запись_в_зал; Type: TABLE; Schema: Библиотека; Owner: postgres
--

CREATE TABLE "Библиотека"."Запись_в_зал" (
    "Номер_читательского_билета" integer NOT NULL,
    "Номер_зала" integer NOT NULL,
    "Время_записи_в_зал" date NOT NULL,
    "Время_посещения_зала" date,
    "ID_операции" integer NOT NULL
);


ALTER TABLE "Библиотека"."Запись_в_зал" OWNER TO postgres;

--
-- Name: Книги; Type: TABLE; Schema: Библиотека; Owner: postgres
--

CREATE TABLE "Библиотека"."Книги" (
    "ID_Книги" integer NOT NULL,
    "Год_издания" integer NOT NULL,
    "Раздел" integer NOT NULL,
    "Число_экземпляров" integer NOT NULL,
    "Автор" text NOT NULL,
    "Название" text NOT NULL,
    "Издательство" text NOT NULL,
    "Шифр_книги " text NOT NULL,
    "Дата_закрепления" date NOT NULL
);


ALTER TABLE "Библиотека"."Книги" OWNER TO postgres;

--
-- Name: TABLE "Книги"; Type: COMMENT; Schema: Библиотека; Owner: postgres
--

COMMENT ON TABLE "Библиотека"."Книги" IS 'Список всех видов книг';


--
-- Name: Читальные_залы; Type: TABLE; Schema: Библиотека; Owner: postgres
--

CREATE TABLE "Библиотека"."Читальные_залы" (
    "Номер_зала" integer NOT NULL,
    "Вместимость" integer NOT NULL,
    "Название " text NOT NULL
);


ALTER TABLE "Библиотека"."Читальные_залы" OWNER TO postgres;

--
-- Name: TABLE "Читальные_залы"; Type: COMMENT; Schema: Библиотека; Owner: postgres
--

COMMENT ON TABLE "Библиотека"."Читальные_залы" IS 'Список читальных залов';


--
-- Name: Читатели; Type: TABLE; Schema: Библиотека; Owner: postgres
--

CREATE TABLE "Библиотека"."Читатели" (
    "Наличие_ученой_степени" boolean NOT NULL,
    "Номер_читательского_билета" integer NOT NULL,
    "Номер_паспорта" integer NOT NULL,
    "Образование" text,
    "ФИО" text[] NOT NULL,
    "Дата_рождения" date NOT NULL,
    "Адрес" text[] NOT NULL,
    "Номер_телефона" numeric NOT NULL
);


ALTER TABLE "Библиотека"."Читатели" OWNER TO postgres;

--
-- Name: TABLE "Читатели"; Type: COMMENT; Schema: Библиотека; Owner: postgres
--

COMMENT ON TABLE "Библиотека"."Читатели" IS 'Список читателей';


--
-- Name: Экземпляр ; Type: TABLE; Schema: Библиотека; Owner: postgres
--

CREATE TABLE "Библиотека"."Экземпляр " (
    "ID_Экземпляра" integer NOT NULL,
    "ID_книги" integer NOT NULL,
    "Состояние_экземпляров " text NOT NULL
);


ALTER TABLE "Библиотека"."Экземпляр " OWNER TO postgres;

--
-- Name: TABLE "Экземпляр "; Type: COMMENT; Schema: Библиотека; Owner: postgres
--

COMMENT ON TABLE "Библиотека"."Экземпляр " IS 'Список экземпляров книг, у одной книги может быть несколько экземпляров';


--
-- Data for Name: Взятие_книги_в_зал; Type: TABLE DATA; Schema: Библиотека; Owner: postgres
--

COPY "Библиотека"."Взятие_книги_в_зал" ("Номер_читательского_билета", "Номер_зала", "ID_экземпляра", "Дата_взятия_книги", "Дата_возвращения_книги", "ID_операции") FROM stdin;
\.
COPY "Библиотека"."Взятие_книги_в_зал" ("Номер_читательского_билета", "Номер_зала", "ID_экземпляра", "Дата_взятия_книги", "Дата_возвращения_книги", "ID_операции") FROM '$$PATH$$/2863.dat';

--
-- Data for Name: Взятие_книги_домой; Type: TABLE DATA; Schema: Библиотека; Owner: postgres
--

COPY "Библиотека"."Взятие_книги_домой" ("Номер_читательского_билета", "ID_экземпляра", "Дата_взятия_книги", "Дата предполагаемого_возвращения_", "Дата фактического_возвращения_кни", "ID_операции") FROM stdin;
\.
COPY "Библиотека"."Взятие_книги_домой" ("Номер_читательского_билета", "ID_экземпляра", "Дата_взятия_книги", "Дата предполагаемого_возвращения_", "Дата фактического_возвращения_кни", "ID_операции") FROM '$$PATH$$/2862.dat';

--
-- Data for Name: Закрепленные_книги; Type: TABLE DATA; Schema: Библиотека; Owner: postgres
--

COPY "Библиотека"."Закрепленные_книги" ("Номер_зала", "ID_экземпляра", "Дата_закрепления", "Дата_взятия_книги", "Дата_возвращения_книги", "ID_операции") FROM stdin;
\.
COPY "Библиотека"."Закрепленные_книги" ("Номер_зала", "ID_экземпляра", "Дата_закрепления", "Дата_взятия_книги", "Дата_возвращения_книги", "ID_операции") FROM '$$PATH$$/2864.dat';

--
-- Data for Name: Запись_в_зал; Type: TABLE DATA; Schema: Библиотека; Owner: postgres
--

COPY "Библиотека"."Запись_в_зал" ("Номер_читательского_билета", "Номер_зала", "Время_записи_в_зал", "Время_посещения_зала", "ID_операции") FROM stdin;
\.
COPY "Библиотека"."Запись_в_зал" ("Номер_читательского_билета", "Номер_зала", "Время_записи_в_зал", "Время_посещения_зала", "ID_операции") FROM '$$PATH$$/2865.dat';

--
-- Data for Name: Книги; Type: TABLE DATA; Schema: Библиотека; Owner: postgres
--

COPY "Библиотека"."Книги" ("ID_Книги", "Год_издания", "Раздел", "Число_экземпляров", "Автор", "Название", "Издательство", "Шифр_книги ", "Дата_закрепления") FROM stdin;
\.
COPY "Библиотека"."Книги" ("ID_Книги", "Год_издания", "Раздел", "Число_экземпляров", "Автор", "Название", "Издательство", "Шифр_книги ", "Дата_закрепления") FROM '$$PATH$$/2858.dat';

--
-- Data for Name: Читальные_залы; Type: TABLE DATA; Schema: Библиотека; Owner: postgres
--

COPY "Библиотека"."Читальные_залы" ("Номер_зала", "Вместимость", "Название ") FROM stdin;
\.
COPY "Библиотека"."Читальные_залы" ("Номер_зала", "Вместимость", "Название ") FROM '$$PATH$$/2861.dat';

--
-- Data for Name: Читатели; Type: TABLE DATA; Schema: Библиотека; Owner: postgres
--

COPY "Библиотека"."Читатели" ("Наличие_ученой_степени", "Номер_читательского_билета", "Номер_паспорта", "Образование", "ФИО", "Дата_рождения", "Адрес", "Номер_телефона") FROM stdin;
\.
COPY "Библиотека"."Читатели" ("Наличие_ученой_степени", "Номер_читательского_билета", "Номер_паспорта", "Образование", "ФИО", "Дата_рождения", "Адрес", "Номер_телефона") FROM '$$PATH$$/2860.dat';

--
-- Data for Name: Экземпляр ; Type: TABLE DATA; Schema: Библиотека; Owner: postgres
--

COPY "Библиотека"."Экземпляр " ("ID_Экземпляра", "ID_книги", "Состояние_экземпляров ") FROM stdin;
\.
COPY "Библиотека"."Экземпляр " ("ID_Экземпляра", "ID_книги", "Состояние_экземпляров ") FROM '$$PATH$$/2859.dat';

--
-- Name: Взятие_книги_в_зал Взятие_книги_в_зал_pkey; Type: CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Взятие_книги_в_зал"
    ADD CONSTRAINT "Взятие_книги_в_зал_pkey" PRIMARY KEY ("ID_операции");


--
-- Name: Взятие_книги_домой Взятие_книги_домой_pkey; Type: CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Взятие_книги_домой"
    ADD CONSTRAINT "Взятие_книги_домой_pkey" PRIMARY KEY ("ID_операции");


--
-- Name: Закрепленные_книги Закрепленные_книги_pkey; Type: CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Закрепленные_книги"
    ADD CONSTRAINT "Закрепленные_книги_pkey" PRIMARY KEY ("ID_операции");


--
-- Name: Запись_в_зал Запись_в_зал_pkey; Type: CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Запись_в_зал"
    ADD CONSTRAINT "Запись_в_зал_pkey" PRIMARY KEY ("ID_операции");


--
-- Name: Книги Книги_pkey; Type: CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Книги"
    ADD CONSTRAINT "Книги_pkey" PRIMARY KEY ("ID_Книги");


--
-- Name: Читальные_залы Читальные_залы_pkey; Type: CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Читальные_залы"
    ADD CONSTRAINT "Читальные_залы_pkey" PRIMARY KEY ("Номер_зала");


--
-- Name: Читатели Читатели_pkey; Type: CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Читатели"
    ADD CONSTRAINT "Читатели_pkey" PRIMARY KEY ("Номер_читательского_билета");


--
-- Name: Экземпляр  Экземпляр _pkey; Type: CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Экземпляр "
    ADD CONSTRAINT "Экземпляр _pkey" PRIMARY KEY ("ID_Экземпляра");


--
-- Name: fki_ID_книги; Type: INDEX; Schema: Библиотека; Owner: postgres
--

CREATE INDEX "fki_ID_книги" ON "Библиотека"."Экземпляр " USING btree ("ID_книги");


--
-- Name: fki_ID_экземпляра; Type: INDEX; Schema: Библиотека; Owner: postgres
--

CREATE INDEX "fki_ID_экземпляра" ON "Библиотека"."Взятие_книги_домой" USING btree ("ID_экземпляра");


--
-- Name: fki_ID_экземпляра_; Type: INDEX; Schema: Библиотека; Owner: postgres
--

CREATE INDEX "fki_ID_экземпляра_" ON "Библиотека"."Взятие_книги_в_зал" USING btree ("ID_экземпляра");


--
-- Name: fki_ID_экземпляра__; Type: INDEX; Schema: Библиотека; Owner: postgres
--

CREATE INDEX "fki_ID_экземпляра__" ON "Библиотека"."Закрепленные_книги" USING btree ("ID_экземпляра");


--
-- Name: fki_Номер_зала; Type: INDEX; Schema: Библиотека; Owner: postgres
--

CREATE INDEX "fki_Номер_зала" ON "Библиотека"."Взятие_книги_в_зал" USING btree ("Номер_зала");


--
-- Name: fki_Номер_зала_; Type: INDEX; Schema: Библиотека; Owner: postgres
--

CREATE INDEX "fki_Номер_зала_" ON "Библиотека"."Закрепленные_книги" USING btree ("Номер_зала");


--
-- Name: fki_Номер_зала__; Type: INDEX; Schema: Библиотека; Owner: postgres
--

CREATE INDEX "fki_Номер_зала__" ON "Библиотека"."Запись_в_зал" USING btree ("Номер_зала");


--
-- Name: fki_Номер_читательского_билета; Type: INDEX; Schema: Библиотека; Owner: postgres
--

CREATE INDEX "fki_Номер_читательского_билета" ON "Библиотека"."Взятие_книги_домой" USING btree ("Номер_читательского_билета");


--
-- Name: fki_Номер_читательского_билета_; Type: INDEX; Schema: Библиотека; Owner: postgres
--

CREATE INDEX "fki_Номер_читательского_билета_" ON "Библиотека"."Взятие_книги_в_зал" USING btree ("Номер_читательского_билета");


--
-- Name: fki_Номер_читательского_билета__; Type: INDEX; Schema: Библиотека; Owner: postgres
--

CREATE INDEX "fki_Номер_читательского_билета__" ON "Библиотека"."Запись_в_зал" USING btree ("Номер_читательского_билета");


--
-- Name: Экземпляр  ID_книги; Type: FK CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Экземпляр "
    ADD CONSTRAINT "ID_книги" FOREIGN KEY ("ID_книги") REFERENCES "Библиотека"."Книги"("ID_Книги");


--
-- Name: Взятие_книги_домой ID_экземпляра; Type: FK CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Взятие_книги_домой"
    ADD CONSTRAINT "ID_экземпляра" FOREIGN KEY ("ID_экземпляра") REFERENCES "Библиотека"."Экземпляр "("ID_Экземпляра");


--
-- Name: Закрепленные_книги ID_экземпляра; Type: FK CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Закрепленные_книги"
    ADD CONSTRAINT "ID_экземпляра" FOREIGN KEY ("ID_экземпляра") REFERENCES "Библиотека"."Экземпляр "("ID_Экземпляра");


--
-- Name: Взятие_книги_в_зал ID_экземпляра_; Type: FK CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Взятие_книги_в_зал"
    ADD CONSTRAINT "ID_экземпляра_" FOREIGN KEY ("ID_экземпляра") REFERENCES "Библиотека"."Экземпляр "("ID_Экземпляра");


--
-- Name: Взятие_книги_в_зал Номер_зала; Type: FK CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Взятие_книги_в_зал"
    ADD CONSTRAINT "Номер_зала" FOREIGN KEY ("Номер_зала") REFERENCES "Библиотека"."Читальные_залы"("Номер_зала");


--
-- Name: Закрепленные_книги Номер_зала; Type: FK CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Закрепленные_книги"
    ADD CONSTRAINT "Номер_зала" FOREIGN KEY ("Номер_зала") REFERENCES "Библиотека"."Читальные_залы"("Номер_зала");


--
-- Name: Запись_в_зал Номер_зала__; Type: FK CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Запись_в_зал"
    ADD CONSTRAINT "Номер_зала__" FOREIGN KEY ("Номер_зала") REFERENCES "Библиотека"."Читальные_залы"("Номер_зала");


--
-- Name: Взятие_книги_домой Номер_читательского_билета; Type: FK CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Взятие_книги_домой"
    ADD CONSTRAINT "Номер_читательского_билета" FOREIGN KEY ("Номер_читательского_билета") REFERENCES "Библиотека"."Читатели"("Номер_читательского_билета") NOT VALID;


--
-- Name: Взятие_книги_в_зал Номер_читательского_билета; Type: FK CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Взятие_книги_в_зал"
    ADD CONSTRAINT "Номер_читательского_билета" FOREIGN KEY ("Номер_читательского_билета") REFERENCES "Библиотека"."Читатели"("Номер_читательского_билета");


--
-- Name: Запись_в_зал Номер_читательского_билета; Type: FK CONSTRAINT; Schema: Библиотека; Owner: postgres
--

ALTER TABLE ONLY "Библиотека"."Запись_в_зал"
    ADD CONSTRAINT "Номер_читательского_билета" FOREIGN KEY ("Номер_читательского_билета") REFERENCES "Библиотека"."Читатели"("Номер_читательского_билета");


--
-- PostgreSQL database dump complete
--

