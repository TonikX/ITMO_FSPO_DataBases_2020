--
-- PostgreSQL database dump
--

-- Dumped from database version 11.9
-- Dumped by pg_dump version 11.9

-- Started on 2020-11-03 14:04:30

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

SET SESSION AUTHORIZATION 'postgres';

DROP DATABASE "clinic";
--
-- TOC entry 2858 (class 1262 OID 16393)
-- Name: clinic; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE "clinic" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Russian_Russia.1251' LC_CTYPE = 'Russian_Russia.1251';


\connect "clinic"

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

SET SESSION AUTHORIZATION 'postgres';

--
-- TOC entry 2859 (class 0 OID 0)
-- Dependencies: 2858
-- Name: DATABASE "clinic"; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE "clinic" IS 'A database of a private clinic. Tells about doctors, patients, cabinets, appointments, payments, doctor''s schedule.';


--
-- TOC entry 6 (class 2615 OID 16394)
-- Name: clinic; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA "clinic";


--
-- TOC entry 2860 (class 0 OID 0)
-- Dependencies: 6
-- Name: SCHEMA "clinic"; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA "clinic" IS 'A database of a private clinic. Tells about doctors, patients, cabinets, appointments, payments, doctor''s schedule.';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 198 (class 1259 OID 16403)
-- Name: appointment; Type: TABLE; Schema: clinic; Owner: postgres
--

CREATE TABLE "clinic"."appointment" (
    "a_id" integer NOT NULL,
    "a_doctor" integer NOT NULL,
    "a_patient" integer NOT NULL,
    "a_cabinet" integer NOT NULL,
    "a_date" "date" NOT NULL,
    "a_payment" integer NOT NULL,
    "a_time_start" time without time zone NOT NULL,
    "a_time_end" time without time zone NOT NULL,
    "a_diagnosis" "text",
    "a_recepy" "text"
);


--
-- TOC entry 2862 (class 0 OID 0)
-- Dependencies: 198
-- Name: TABLE "appointment"; Type: COMMENT; Schema: clinic; Owner: postgres
--

COMMENT ON TABLE "clinic"."appointment" IS 'A table for all of the appontments.';


--
-- TOC entry 199 (class 1259 OID 16411)
-- Name: cabinet; Type: TABLE; Schema: clinic; Owner: postgres
--

CREATE TABLE "clinic"."cabinet" (
    "c_number" integer NOT NULL,
    "c_wt_start" time without time zone NOT NULL,
    "c_wt_end" time without time zone NOT NULL,
    "c_phone_num" integer NOT NULL
);


--
-- TOC entry 2863 (class 0 OID 0)
-- Dependencies: 199
-- Name: TABLE "cabinet"; Type: COMMENT; Schema: clinic; Owner: postgres
--

COMMENT ON TABLE "clinic"."cabinet" IS 'A table for all the things cabinet related.';


--
-- TOC entry 197 (class 1259 OID 16395)
-- Name: doctor; Type: TABLE; Schema: clinic; Owner: postgres
--

CREATE TABLE "clinic"."doctor" (
    "d_id" integer NOT NULL,
    "d_full_name" "text" NOT NULL,
    "d_gender" boolean NOT NULL,
    "d_dob" "date" NOT NULL,
    "d_education" "text" NOT NULL,
    "d_profession" "text" NOT NULL,
    "d_phone_num" integer NOT NULL,
    "d_address" "text" NOT NULL
);


--
-- TOC entry 2864 (class 0 OID 0)
-- Dependencies: 197
-- Name: TABLE "doctor"; Type: COMMENT; Schema: clinic; Owner: postgres
--

COMMENT ON TABLE "clinic"."doctor" IS 'Information about the clinic''s doctors.';


--
-- TOC entry 200 (class 1259 OID 16416)
-- Name: medical_card; Type: TABLE; Schema: clinic; Owner: postgres
--

CREATE TABLE "clinic"."medical_card" (
    "mc_id" integer NOT NULL,
    "mc_full_name" "text" NOT NULL,
    "mc_gender" boolean NOT NULL,
    "mc_dob" "date" NOT NULL,
    "mc_address" "text" NOT NULL,
    "mc_phone_num" integer NOT NULL
);


--
-- TOC entry 2865 (class 0 OID 0)
-- Dependencies: 200
-- Name: TABLE "medical_card"; Type: COMMENT; Schema: clinic; Owner: postgres
--

COMMENT ON TABLE "clinic"."medical_card" IS 'Info about the patient in the medical card.';


--
-- TOC entry 201 (class 1259 OID 16424)
-- Name: payment; Type: TABLE; Schema: clinic; Owner: postgres
--

CREATE TABLE "clinic"."payment" (
    "p_id" integer NOT NULL,
    "p_sum" integer NOT NULL,
    "p_date_opened" "date" NOT NULL,
    "p_date_closed" "date"
);


--
-- TOC entry 202 (class 1259 OID 16429)
-- Name: schedule; Type: TABLE; Schema: clinic; Owner: postgres
--

CREATE TABLE "clinic"."schedule" (
    "mn_start" time without time zone,
    "mn_end" time without time zone,
    "tu_start" time without time zone,
    "tu_end" time without time zone,
    "wed_start" time without time zone,
    "wed_end" time without time zone,
    "th_start" time without time zone,
    "th_end" time without time zone,
    "fr_start" time without time zone,
    "fr_end" time without time zone,
    "sat_start" time without time zone,
    "sat_end" time without time zone,
    "sun_start" time without time zone,
    "sun_end" time without time zone,
    "doctor" integer NOT NULL
);


--
-- TOC entry 2866 (class 0 OID 0)
-- Dependencies: 202
-- Name: TABLE "schedule"; Type: COMMENT; Schema: clinic; Owner: postgres
--

COMMENT ON TABLE "clinic"."schedule" IS 'Doctor''s shedule.';


--
-- TOC entry 2848 (class 0 OID 16403)
-- Dependencies: 198
-- Data for Name: appointment; Type: TABLE DATA; Schema: clinic; Owner: postgres
--

INSERT INTO "clinic"."appointment" ("a_id", "a_doctor", "a_patient", "a_cabinet", "a_date", "a_payment", "a_time_start", "a_time_end", "a_diagnosis", "a_recepy") VALUES (2, 1, 5, 5, '2020-02-02', 2, '09:30:00', '11:30:00', 'Depression', 'sdshjtrol');
INSERT INTO "clinic"."appointment" ("a_id", "a_doctor", "a_patient", "a_cabinet", "a_date", "a_payment", "a_time_start", "a_time_end", "a_diagnosis", "a_recepy") VALUES (3, 6, 2, 1, '2020-02-02', 3, '10:00:00', '11:00:00', NULL, NULL);
INSERT INTO "clinic"."appointment" ("a_id", "a_doctor", "a_patient", "a_cabinet", "a_date", "a_payment", "a_time_start", "a_time_end", "a_diagnosis", "a_recepy") VALUES (6, 8, 3, 4, '2020-02-05', 6, '10:00:00', '11:00:00', 'acne', 'cream');
INSERT INTO "clinic"."appointment" ("a_id", "a_doctor", "a_patient", "a_cabinet", "a_date", "a_payment", "a_time_start", "a_time_end", "a_diagnosis", "a_recepy") VALUES (5, 5, 8, 8, '2020-02-04', 5, '10:00:00', '11:00:00', 'anxiety', 'pills');
INSERT INTO "clinic"."appointment" ("a_id", "a_doctor", "a_patient", "a_cabinet", "a_date", "a_payment", "a_time_start", "a_time_end", "a_diagnosis", "a_recepy") VALUES (1, 2, 1, 5, '2020-02-01', 1, '10:00:00', '11:00:00', 'chlamidia', NULL);
INSERT INTO "clinic"."appointment" ("a_id", "a_doctor", "a_patient", "a_cabinet", "a_date", "a_payment", "a_time_start", "a_time_end", "a_diagnosis", "a_recepy") VALUES (7, 7, 7, 7, '2020-02-05', 7, '12:00:00', '12:30:00', 'miosis', 'drops');
INSERT INTO "clinic"."appointment" ("a_id", "a_doctor", "a_patient", "a_cabinet", "a_date", "a_payment", "a_time_start", "a_time_end", "a_diagnosis", "a_recepy") VALUES (8, 8, 3, 5, '2020-02-06', 8, '11:00:00', '13:00:00', 'vitiligo', NULL);
INSERT INTO "clinic"."appointment" ("a_id", "a_doctor", "a_patient", "a_cabinet", "a_date", "a_payment", "a_time_start", "a_time_end", "a_diagnosis", "a_recepy") VALUES (4, 3, 3, 2, '2020-02-03', 4, '09:30:00', '11:30:00', 'miosis', 'glasses');


--
-- TOC entry 2849 (class 0 OID 16411)
-- Dependencies: 199
-- Data for Name: cabinet; Type: TABLE DATA; Schema: clinic; Owner: postgres
--

INSERT INTO "clinic"."cabinet" ("c_number", "c_wt_start", "c_wt_end", "c_phone_num") VALUES (1, '10:30:00', '17:45:00', 1111111);
INSERT INTO "clinic"."cabinet" ("c_number", "c_wt_start", "c_wt_end", "c_phone_num") VALUES (2, '08:00:00', '20:45:00', 2222222);
INSERT INTO "clinic"."cabinet" ("c_number", "c_wt_start", "c_wt_end", "c_phone_num") VALUES (3, '09:15:00', '20:45:00', 3333333);
INSERT INTO "clinic"."cabinet" ("c_number", "c_wt_start", "c_wt_end", "c_phone_num") VALUES (4, '11:30:00', '18:45:00', 4444444);
INSERT INTO "clinic"."cabinet" ("c_number", "c_wt_start", "c_wt_end", "c_phone_num") VALUES (5, '09:15:00', '20:45:00', 5555555);
INSERT INTO "clinic"."cabinet" ("c_number", "c_wt_start", "c_wt_end", "c_phone_num") VALUES (6, '11:30:00', '18:45:00', 6666666);
INSERT INTO "clinic"."cabinet" ("c_number", "c_wt_start", "c_wt_end", "c_phone_num") VALUES (7, '09:15:00', '20:45:00', 7777777);
INSERT INTO "clinic"."cabinet" ("c_number", "c_wt_start", "c_wt_end", "c_phone_num") VALUES (8, '11:30:00', '18:45:00', 8888888);


--
-- TOC entry 2847 (class 0 OID 16395)
-- Dependencies: 197
-- Data for Name: doctor; Type: TABLE DATA; Schema: clinic; Owner: postgres
--

INSERT INTO "clinic"."doctor" ("d_id", "d_full_name", "d_gender", "d_dob", "d_education", "d_profession", "d_phone_num", "d_address") VALUES (1, 'Doctor 1', true, '1978-01-01', '8 years', 'psychologyst', 1265522, 'Street 5 home 5 flat 5');
INSERT INTO "clinic"."doctor" ("d_id", "d_full_name", "d_gender", "d_dob", "d_education", "d_profession", "d_phone_num", "d_address") VALUES (2, 'Doctor 2', false, '1983-03-03', '10 years', 'gynecologist', 1234244, 'Street 6 home 6 flat 6');
INSERT INTO "clinic"."doctor" ("d_id", "d_full_name", "d_gender", "d_dob", "d_education", "d_profession", "d_phone_num", "d_address") VALUES (3, 'Doctor 3', false, '1989-04-01', '6 years', 'optometrist', 5623447, 'Street 7 home 7 flat 7');
INSERT INTO "clinic"."doctor" ("d_id", "d_full_name", "d_gender", "d_dob", "d_education", "d_profession", "d_phone_num", "d_address") VALUES (4, 'Doctor 4', true, '1967-09-02', '12 years', 'endocrinologist', 1238899, 'Street 8 home 8 flat 8');
INSERT INTO "clinic"."doctor" ("d_id", "d_full_name", "d_gender", "d_dob", "d_education", "d_profession", "d_phone_num", "d_address") VALUES (5, 'Doctor 5', true, '1977-01-01', '8 years', 'psychologyst', 1265521, 'Street 5 home 5 flat 4');
INSERT INTO "clinic"."doctor" ("d_id", "d_full_name", "d_gender", "d_dob", "d_education", "d_profession", "d_phone_num", "d_address") VALUES (6, 'Doctor 6', false, '1982-03-03', '10 years', 'gynecologist', 1234243, 'Street 6 home 6 flat 5');
INSERT INTO "clinic"."doctor" ("d_id", "d_full_name", "d_gender", "d_dob", "d_education", "d_profession", "d_phone_num", "d_address") VALUES (7, 'Doctor 7', false, '1988-04-01', '6 years', 'optometrist', 5623446, 'Street 7 home 7 flat 6');
INSERT INTO "clinic"."doctor" ("d_id", "d_full_name", "d_gender", "d_dob", "d_education", "d_profession", "d_phone_num", "d_address") VALUES (8, 'Doctor 8', true, '1966-09-02', '12 years', 'endocrinologist', 1238898, 'Street 8 home 8 flat 7');


--
-- TOC entry 2850 (class 0 OID 16416)
-- Dependencies: 200
-- Data for Name: medical_card; Type: TABLE DATA; Schema: clinic; Owner: postgres
--

INSERT INTO "clinic"."medical_card" ("mc_id", "mc_full_name", "mc_gender", "mc_dob", "mc_address", "mc_phone_num") VALUES (1, 'Patient 1', true, '1990-12-20', 'Street 1 home 1 flat 1', 1532789);
INSERT INTO "clinic"."medical_card" ("mc_id", "mc_full_name", "mc_gender", "mc_dob", "mc_address", "mc_phone_num") VALUES (2, 'Patient 2', true, '1990-10-20', 'Street 2 home 1 flat 1', 1532718);
INSERT INTO "clinic"."medical_card" ("mc_id", "mc_full_name", "mc_gender", "mc_dob", "mc_address", "mc_phone_num") VALUES (4, 'Patient 4', false, '2001-02-20', 'Street 4 home 1 flat 1', 3445119);
INSERT INTO "clinic"."medical_card" ("mc_id", "mc_full_name", "mc_gender", "mc_dob", "mc_address", "mc_phone_num") VALUES (6, 'Patient 6', false, '1970-04-13', 'Street 11 home 11 flat 1', 3482328);
INSERT INTO "clinic"."medical_card" ("mc_id", "mc_full_name", "mc_gender", "mc_dob", "mc_address", "mc_phone_num") VALUES (7, 'Patient 7', true, '1964-11-10', 'Street 9 home 2 flat 1', 4321000);
INSERT INTO "clinic"."medical_card" ("mc_id", "mc_full_name", "mc_gender", "mc_dob", "mc_address", "mc_phone_num") VALUES (8, 'Patient 8', false, '1994-09-05', 'Street 13 home 1 flat 1', 3432899);
INSERT INTO "clinic"."medical_card" ("mc_id", "mc_full_name", "mc_gender", "mc_dob", "mc_address", "mc_phone_num") VALUES (5, 'Patient 5', false, '1988-12-20', 'Street 10 home 1 flat 1', 1532727);
INSERT INTO "clinic"."medical_card" ("mc_id", "mc_full_name", "mc_gender", "mc_dob", "mc_address", "mc_phone_num") VALUES (3, 'Patient 3', false, '1969-01-01', 'Street 3 home 1 flat 1', 1532234);


--
-- TOC entry 2851 (class 0 OID 16424)
-- Dependencies: 201
-- Data for Name: payment; Type: TABLE DATA; Schema: clinic; Owner: postgres
--

INSERT INTO "clinic"."payment" ("p_id", "p_sum", "p_date_opened", "p_date_closed") VALUES (1, 1000, '2020-02-01', '2020-02-01');
INSERT INTO "clinic"."payment" ("p_id", "p_sum", "p_date_opened", "p_date_closed") VALUES (2, 3000, '2020-02-02', '2020-02-05');
INSERT INTO "clinic"."payment" ("p_id", "p_sum", "p_date_opened", "p_date_closed") VALUES (3, 500, '2020-02-02', '2020-02-02');
INSERT INTO "clinic"."payment" ("p_id", "p_sum", "p_date_opened", "p_date_closed") VALUES (4, 1000, '2020-02-03', '2020-02-05');
INSERT INTO "clinic"."payment" ("p_id", "p_sum", "p_date_opened", "p_date_closed") VALUES (6, 600, '2020-02-05', '2020-02-12');
INSERT INTO "clinic"."payment" ("p_id", "p_sum", "p_date_opened", "p_date_closed") VALUES (7, 3000, '2020-02-05', '2020-03-01');
INSERT INTO "clinic"."payment" ("p_id", "p_sum", "p_date_opened", "p_date_closed") VALUES (5, 3000, '2020-02-04', '2020-02-15');
INSERT INTO "clinic"."payment" ("p_id", "p_sum", "p_date_opened", "p_date_closed") VALUES (8, 1000, '2020-02-06', NULL);


--
-- TOC entry 2852 (class 0 OID 16429)
-- Dependencies: 202
-- Data for Name: schedule; Type: TABLE DATA; Schema: clinic; Owner: postgres
--

INSERT INTO "clinic"."schedule" ("mn_start", "mn_end", "tu_start", "tu_end", "wed_start", "wed_end", "th_start", "th_end", "fr_start", "fr_end", "sat_start", "sat_end", "sun_start", "sun_end", "doctor") VALUES ('08:00:00', '19:00:00', NULL, NULL, '10:00:00', '19:00:00', NULL, NULL, NULL, NULL, '08:00:00', '19:00:00', NULL, NULL, 1);
INSERT INTO "clinic"."schedule" ("mn_start", "mn_end", "tu_start", "tu_end", "wed_start", "wed_end", "th_start", "th_end", "fr_start", "fr_end", "sat_start", "sat_end", "sun_start", "sun_end", "doctor") VALUES ('11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', NULL, NULL, NULL, NULL, 2);
INSERT INTO "clinic"."schedule" ("mn_start", "mn_end", "tu_start", "tu_end", "wed_start", "wed_end", "th_start", "th_end", "fr_start", "fr_end", "sat_start", "sat_end", "sun_start", "sun_end", "doctor") VALUES ('11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', NULL, NULL, NULL, NULL, 3);
INSERT INTO "clinic"."schedule" ("mn_start", "mn_end", "tu_start", "tu_end", "wed_start", "wed_end", "th_start", "th_end", "fr_start", "fr_end", "sat_start", "sat_end", "sun_start", "sun_end", "doctor") VALUES ('11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', NULL, NULL, NULL, NULL, 4);
INSERT INTO "clinic"."schedule" ("mn_start", "mn_end", "tu_start", "tu_end", "wed_start", "wed_end", "th_start", "th_end", "fr_start", "fr_end", "sat_start", "sat_end", "sun_start", "sun_end", "doctor") VALUES ('11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', NULL, NULL, NULL, NULL, 5);
INSERT INTO "clinic"."schedule" ("mn_start", "mn_end", "tu_start", "tu_end", "wed_start", "wed_end", "th_start", "th_end", "fr_start", "fr_end", "sat_start", "sat_end", "sun_start", "sun_end", "doctor") VALUES ('11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', NULL, NULL, NULL, NULL, 6);
INSERT INTO "clinic"."schedule" ("mn_start", "mn_end", "tu_start", "tu_end", "wed_start", "wed_end", "th_start", "th_end", "fr_start", "fr_end", "sat_start", "sat_end", "sun_start", "sun_end", "doctor") VALUES ('11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', '11:00:00', '19:00:00', NULL, NULL, NULL, NULL, 7);
INSERT INTO "clinic"."schedule" ("mn_start", "mn_end", "tu_start", "tu_end", "wed_start", "wed_end", "th_start", "th_end", "fr_start", "fr_end", "sat_start", "sat_end", "sun_start", "sun_end", "doctor") VALUES ('08:00:00', '19:00:00', NULL, NULL, '10:00:00', '19:00:00', NULL, NULL, NULL, NULL, '08:00:00', '19:00:00', NULL, NULL, 8);


--
-- TOC entry 2710 (class 2606 OID 16410)
-- Name: appointment appointment_pkey; Type: CONSTRAINT; Schema: clinic; Owner: postgres
--

ALTER TABLE ONLY "clinic"."appointment"
    ADD CONSTRAINT "appointment_pkey" PRIMARY KEY ("a_id");


--
-- TOC entry 2714 (class 2606 OID 16415)
-- Name: cabinet cabinet_pkey; Type: CONSTRAINT; Schema: clinic; Owner: postgres
--

ALTER TABLE ONLY "clinic"."cabinet"
    ADD CONSTRAINT "cabinet_pkey" PRIMARY KEY ("c_number");


--
-- TOC entry 2708 (class 2606 OID 16402)
-- Name: doctor doctor_pkey; Type: CONSTRAINT; Schema: clinic; Owner: postgres
--

ALTER TABLE ONLY "clinic"."doctor"
    ADD CONSTRAINT "doctor_pkey" PRIMARY KEY ("d_id");


--
-- TOC entry 2716 (class 2606 OID 16423)
-- Name: medical_card medical_card_pkey; Type: CONSTRAINT; Schema: clinic; Owner: postgres
--

ALTER TABLE ONLY "clinic"."medical_card"
    ADD CONSTRAINT "medical_card_pkey" PRIMARY KEY ("mc_id");


--
-- TOC entry 2718 (class 2606 OID 16428)
-- Name: payment payment_pkey; Type: CONSTRAINT; Schema: clinic; Owner: postgres
--

ALTER TABLE ONLY "clinic"."payment"
    ADD CONSTRAINT "payment_pkey" PRIMARY KEY ("p_id");


--
-- TOC entry 2712 (class 2606 OID 16455)
-- Name: appointment payment_unique; Type: CONSTRAINT; Schema: clinic; Owner: postgres
--

ALTER TABLE ONLY "clinic"."appointment"
    ADD CONSTRAINT "payment_unique" UNIQUE ("a_payment");


--
-- TOC entry 2720 (class 2606 OID 16433)
-- Name: schedule schedule_pkey; Type: CONSTRAINT; Schema: clinic; Owner: postgres
--

ALTER TABLE ONLY "clinic"."schedule"
    ADD CONSTRAINT "schedule_pkey" PRIMARY KEY ("doctor");


--
-- TOC entry 2723 (class 2606 OID 16444)
-- Name: appointment a_cabinet_fkey; Type: FK CONSTRAINT; Schema: clinic; Owner: postgres
--

ALTER TABLE ONLY "clinic"."appointment"
    ADD CONSTRAINT "a_cabinet_fkey" FOREIGN KEY ("a_cabinet") REFERENCES "clinic"."cabinet"("c_number") NOT VALID;


--
-- TOC entry 2721 (class 2606 OID 16434)
-- Name: appointment a_doctor_fkey; Type: FK CONSTRAINT; Schema: clinic; Owner: postgres
--

ALTER TABLE ONLY "clinic"."appointment"
    ADD CONSTRAINT "a_doctor_fkey" FOREIGN KEY ("a_doctor") REFERENCES "clinic"."doctor"("d_id") NOT VALID;


--
-- TOC entry 2722 (class 2606 OID 16439)
-- Name: appointment a_patient_fkey; Type: FK CONSTRAINT; Schema: clinic; Owner: postgres
--

ALTER TABLE ONLY "clinic"."appointment"
    ADD CONSTRAINT "a_patient_fkey" FOREIGN KEY ("a_patient") REFERENCES "clinic"."medical_card"("mc_id") NOT VALID;


--
-- TOC entry 2725 (class 2606 OID 16449)
-- Name: schedule doctor_fkey; Type: FK CONSTRAINT; Schema: clinic; Owner: postgres
--

ALTER TABLE ONLY "clinic"."schedule"
    ADD CONSTRAINT "doctor_fkey" FOREIGN KEY ("doctor") REFERENCES "clinic"."doctor"("d_id") NOT VALID;


--
-- TOC entry 2724 (class 2606 OID 16456)
-- Name: payment p_id_fkey; Type: FK CONSTRAINT; Schema: clinic; Owner: postgres
--

ALTER TABLE ONLY "clinic"."payment"
    ADD CONSTRAINT "p_id_fkey" FOREIGN KEY ("p_id") REFERENCES "clinic"."appointment"("a_payment") NOT VALID;


--
-- TOC entry 2861 (class 0 OID 0)
-- Dependencies: 6
-- Name: SCHEMA "clinic"; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON SCHEMA "clinic" TO PUBLIC;


-- Completed on 2020-11-03 14:04:31

--
-- PostgreSQL database dump complete
--

