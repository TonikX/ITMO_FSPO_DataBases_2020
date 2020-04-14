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

-- Dumped from database version 11.7
-- Dumped by pg_dump version 11.7

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

DROP DATABASE "Birzha";
--
-- Name: Birzha; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE "Birzha" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';


ALTER DATABASE "Birzha" OWNER TO postgres;

\connect "Birzha"

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
-- Name: adminpack; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION adminpack; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: Auction; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Auction" (
    id integer NOT NULL,
    consignment_id integer NOT NULL,
    agent_id integer NOT NULL,
    status character varying(30) NOT NULL,
    additional_terms text,
    total_price double precision
);


ALTER TABLE public."Auction" OWNER TO postgres;

--
-- Name: Broker; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Broker" (
    id integer NOT NULL,
    name character varying(30) NOT NULL,
    bureu_id integer,
    percent double precision
);


ALTER TABLE public."Broker" OWNER TO postgres;

--
-- Name: BrokersBureu; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."BrokersBureu" (
    id integer NOT NULL,
    name character varying(30) NOT NULL
);


ALTER TABLE public."BrokersBureu" OWNER TO postgres;

--
-- Name: Consignment; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Consignment" (
    id integer NOT NULL,
    broker_id integer NOT NULL,
    total_price double precision NOT NULL
);


ALTER TABLE public."Consignment" OWNER TO postgres;

--
-- Name: Contract; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Contract" (
    id integer NOT NULL,
    agent_id integer NOT NULL,
    status character varying(30) NOT NULL,
    auction_id integer
);


ALTER TABLE public."Contract" OWNER TO postgres;

--
-- Name: ExchangesAgent; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."ExchangesAgent" (
    id integer NOT NULL,
    name character varying(30) NOT NULL
);


ALTER TABLE public."ExchangesAgent" OWNER TO postgres;

--
-- Name: Firm; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Firm" (
    id integer NOT NULL,
    name character varying(30) NOT NULL
);


ALTER TABLE public."Firm" OWNER TO postgres;

--
-- Name: Product; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Product" (
    id integer NOT NULL,
    name character varying(30) NOT NULL,
    production_date date,
    best_before_date date,
    shipment_date date,
    firm_id integer
);


ALTER TABLE public."Product" OWNER TO postgres;

--
-- Name: Product-Consignment; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Product-Consignment" (
    product_id integer NOT NULL,
    consignment_id integer NOT NULL,
    quantity integer NOT NULL,
    price_for_unit double precision NOT NULL
);


ALTER TABLE public."Product-Consignment" OWNER TO postgres;

--
-- Data for Name: Auction; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Auction" (id, consignment_id, agent_id, status, additional_terms, total_price) FROM stdin;
\.
COPY public."Auction" (id, consignment_id, agent_id, status, additional_terms, total_price) FROM '$$PATH$$/2874.dat';

--
-- Data for Name: Broker; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Broker" (id, name, bureu_id, percent) FROM stdin;
\.
COPY public."Broker" (id, name, bureu_id, percent) FROM '$$PATH$$/2875.dat';

--
-- Data for Name: BrokersBureu; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."BrokersBureu" (id, name) FROM stdin;
\.
COPY public."BrokersBureu" (id, name) FROM '$$PATH$$/2876.dat';

--
-- Data for Name: Consignment; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Consignment" (id, broker_id, total_price) FROM stdin;
\.
COPY public."Consignment" (id, broker_id, total_price) FROM '$$PATH$$/2877.dat';

--
-- Data for Name: Contract; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Contract" (id, agent_id, status, auction_id) FROM stdin;
\.
COPY public."Contract" (id, agent_id, status, auction_id) FROM '$$PATH$$/2878.dat';

--
-- Data for Name: ExchangesAgent; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."ExchangesAgent" (id, name) FROM stdin;
\.
COPY public."ExchangesAgent" (id, name) FROM '$$PATH$$/2879.dat';

--
-- Data for Name: Firm; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Firm" (id, name) FROM stdin;
\.
COPY public."Firm" (id, name) FROM '$$PATH$$/2880.dat';

--
-- Data for Name: Product; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Product" (id, name, production_date, best_before_date, shipment_date, firm_id) FROM stdin;
\.
COPY public."Product" (id, name, production_date, best_before_date, shipment_date, firm_id) FROM '$$PATH$$/2881.dat';

--
-- Data for Name: Product-Consignment; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Product-Consignment" (product_id, consignment_id, quantity, price_for_unit) FROM stdin;
\.
COPY public."Product-Consignment" (product_id, consignment_id, quantity, price_for_unit) FROM '$$PATH$$/2882.dat';

--
-- Name: Auction Auction_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Auction"
    ADD CONSTRAINT "Auction_pkey" PRIMARY KEY (id);


--
-- Name: Broker Broker_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Broker"
    ADD CONSTRAINT "Broker_pkey" PRIMARY KEY (id);


--
-- Name: BrokersBureu BrokersBureu_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."BrokersBureu"
    ADD CONSTRAINT "BrokersBureu_pkey" PRIMARY KEY (id);


--
-- Name: Consignment Consignment_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Consignment"
    ADD CONSTRAINT "Consignment_pkey" PRIMARY KEY (id);


--
-- Name: Contract Contract_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Contract"
    ADD CONSTRAINT "Contract_pkey" PRIMARY KEY (id);


--
-- Name: ExchangesAgent ExchangesAgent_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."ExchangesAgent"
    ADD CONSTRAINT "ExchangesAgent_pkey" PRIMARY KEY (id);


--
-- Name: Firm Firm_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Firm"
    ADD CONSTRAINT "Firm_pkey" PRIMARY KEY (id);


--
-- Name: Product-Consignment Product-Consignment_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Product-Consignment"
    ADD CONSTRAINT "Product-Consignment_pkey" PRIMARY KEY (product_id, consignment_id);


--
-- Name: Product Product_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Product"
    ADD CONSTRAINT "Product_pkey" PRIMARY KEY (id);


--
-- Name: fki_Agent(FK); Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "fki_Agent(FK)" ON public."Auction" USING btree (agent_id);


--
-- Name: fki_Consignment(FK); Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "fki_Consignment(FK)" ON public."Auction" USING btree (consignment_id);


--
-- Name: fki_ConsignmentsBroker(FK); Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "fki_ConsignmentsBroker(FK)" ON public."Consignment" USING btree (broker_id);


--
-- Name: fki_ContractToAgent(FK); Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "fki_ContractToAgent(FK)" ON public."Contract" USING btree (agent_id);


--
-- Name: fki_ContractToAuction; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "fki_ContractToAuction" ON public."Contract" USING btree (auction_id);


--
-- Name: fki_broker_to_bureu; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_broker_to_bureu ON public."Broker" USING btree (bureu_id);


--
-- Name: fki_consignment(FK); Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "fki_consignment(FK)" ON public."Product-Consignment" USING btree (consignment_id);


--
-- Name: fki_product(FK); Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "fki_product(FK)" ON public."Product-Consignment" USING btree (product_id);


--
-- Name: fki_product_to_firm; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_product_to_firm ON public."Product" USING btree (firm_id);


--
-- Name: Auction Agent(FK); Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Auction"
    ADD CONSTRAINT "Agent(FK)" FOREIGN KEY (agent_id) REFERENCES public."ExchangesAgent"(id) NOT VALID;


--
-- Name: Auction Consignment(FK); Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Auction"
    ADD CONSTRAINT "Consignment(FK)" FOREIGN KEY (consignment_id) REFERENCES public."Consignment"(id) NOT VALID;


--
-- Name: Consignment ConsignmentsBroker(FK); Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Consignment"
    ADD CONSTRAINT "ConsignmentsBroker(FK)" FOREIGN KEY (broker_id) REFERENCES public."Broker"(id) NOT VALID;


--
-- Name: Contract ContractToAgent(FK); Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Contract"
    ADD CONSTRAINT "ContractToAgent(FK)" FOREIGN KEY (agent_id) REFERENCES public."ExchangesAgent"(id) NOT VALID;


--
-- Name: Contract ContractToAuction; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Contract"
    ADD CONSTRAINT "ContractToAuction" FOREIGN KEY (auction_id) REFERENCES public."Auction"(id) NOT VALID;


--
-- Name: Broker broker_to_bureu; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Broker"
    ADD CONSTRAINT broker_to_bureu FOREIGN KEY (bureu_id) REFERENCES public."BrokersBureu"(id) NOT VALID;


--
-- Name: Product-Consignment consignment(FK); Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Product-Consignment"
    ADD CONSTRAINT "consignment(FK)" FOREIGN KEY (consignment_id) REFERENCES public."Consignment"(id) NOT VALID;


--
-- Name: Product-Consignment product(FK); Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Product-Consignment"
    ADD CONSTRAINT "product(FK)" FOREIGN KEY (product_id) REFERENCES public."Product"(id) NOT VALID;


--
-- Name: Product product_to_firm; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Product"
    ADD CONSTRAINT product_to_firm FOREIGN KEY (firm_id) REFERENCES public."Firm"(id) NOT VALID;


--
-- PostgreSQL database dump complete
--

