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

-- Dumped from database version 11.2
-- Dumped by pg_dump version 11.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE "Sorokina_zoo";
--
-- Name: Sorokina_zoo; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE "Sorokina_zoo" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Russian_Russia.1251' LC_CTYPE = 'Russian_Russia.1251';


ALTER DATABASE "Sorokina_zoo" OWNER TO postgres;

\connect "Sorokina_zoo"

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: animal; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.animal (
    view_animal text NOT NULL,
    date_animal date NOT NULL,
    sex_animal text NOT NULL,
    name_animal text NOT NULL,
    id_animal integer NOT NULL
);


ALTER TABLE public.animal OWNER TO postgres;

--
-- Name: bird; Type: TABLE; Schema: public; Owner: postgres
--

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


ALTER TABLE public.bird OWNER TO postgres;

--
-- Name: choice_habital; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.choice_habital (
    id_animal integer NOT NULL,
    name_habital text NOT NULL,
    optimal_habitat text NOT NULL
);


ALTER TABLE public.choice_habital OWNER TO postgres;

--
-- Name: employee; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.employee (
    id_employee integer NOT NULL,
    date_employee date NOT NULL,
    experience_employee integer NOT NULL
);


ALTER TABLE public.employee OWNER TO postgres;

--
-- Name: feeding; Type: TABLE; Schema: public; Owner: postgres
--

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


ALTER TABLE public.feeding OWNER TO postgres;

--
-- Name: habital; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.habital (
    name_habital text NOT NULL,
    location_habital text NOT NULL,
    chatacteristic_habital text NOT NULL
);


ALTER TABLE public.habital OWNER TO postgres;

--
-- Name: mammal; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.mammal (
    date_mammal date NOT NULL,
    sex_mammal text NOT NULL,
    name_mammal text NOT NULL,
    view_mammal text NOT NULL,
    id_animal integer NOT NULL
);


ALTER TABLE public.mammal OWNER TO postgres;

--
-- Name: placeFeeding; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."placeFeeding" (
    "time_placeFeeding" time with time zone NOT NULL,
    "id_placeFeeding" integer NOT NULL
);


ALTER TABLE public."placeFeeding" OWNER TO postgres;

--
-- Name: ration; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ration (
    old_animal integer NOT NULL,
    health_animal "char"[] NOT NULL,
    shift_interval_ration date[] NOT NULL,
    breakfast_animal "char"[] NOT NULL,
    dinner_ration "char"[] NOT NULL,
    late_dinner_animal "char"[] NOT NULL,
    id_ration integer NOT NULL
);


ALTER TABLE public.ration OWNER TO postgres;

--
-- Name: reptile; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.reptile (
    id_animal integer NOT NULL,
    date_reptile date NOT NULL,
    sex_reptile text NOT NULL,
    norm_temp_reptile integer NOT NULL,
    winter_sleep_reptile date NOT NULL,
    view_reptile text NOT NULL,
    name_reptile text NOT NULL
);


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

