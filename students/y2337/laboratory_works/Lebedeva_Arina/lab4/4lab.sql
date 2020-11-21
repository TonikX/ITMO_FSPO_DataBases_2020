-- Table: public.Журнал

-- DROP TABLE public."Журнал";

CREATE TABLE public."Журнал"
(
    "id_учителя" integer NOT NULL,
    "№класса" text COLLATE pg_catalog."default" NOT NULL,
    "предмет" text COLLATE pg_catalog."default" NOT NULL,
    "id_ученика" integer NOT NULL,
    "оценка" integer,
    "id_урока" integer NOT NULL,
    CONSTRAINT "Урок" FOREIGN KEY ("id_урока")
        REFERENCES public."Урок" ("id_урока") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID,
    CONSTRAINT "класс" FOREIGN KEY ("№класса")
        REFERENCES public."Класс" ("№класса") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Журнал"
    OWNER to admin;
CREATE TABLE public."Кабинет"
(
    "№каб" integer NOT NULL,
    "вместимость" integer NOT NULL,
    CONSTRAINT "Кабинет_pkey" PRIMARY KEY ("№каб")
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Кабинет"
    OWNER to admin;

CREATE TABLE public."Класс"
(
    "№класса" text COLLATE pg_catalog."default" NOT NULL,
    "классное_руководство" integer NOT NULL,
    "журнал" text COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT "Класс_pkey" PRIMARY KEY ("№класса")
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Класс"
    OWNER to admin;
CREATE TABLE public."Урок"
(
    "предмет" text COLLATE pg_catalog."default" NOT NULL,
    "id_учителя" integer NOT NULL,
    "№каб" integer NOT NULL,
    "id_урока" integer NOT NULL,
    "дата" date NOT NULL,
    "№ урока" integer NOT NULL,
    CONSTRAINT "Урок_pkey" PRIMARY KEY ("id_урока"),
    CONSTRAINT "Учитель" FOREIGN KEY ("id_учителя")
        REFERENCES public."учитель" ("id_учителя") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID,
    CONSTRAINT "каб" FOREIGN KEY ("№каб")
        REFERENCES public."Кабинет" ("№каб") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Урок"
    OWNER to admin;
CREATE TABLE public."Ученик"
(
    "id_ученика" integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 0 MINVALUE 0 MAXVALUE 2147483647 CACHE 1 ),
    "пол" text COLLATE pg_catalog."default" NOT NULL,
    "№класса" text COLLATE pg_catalog."default" NOT NULL,
    "Фамилия" text COLLATE pg_catalog."default" NOT NULL,
    "Имя" text COLLATE pg_catalog."default" NOT NULL,
    "Отчество" text COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT "Ученик_pkey" PRIMARY KEY ("id_ученика"),
    CONSTRAINT "№класса" FOREIGN KEY ("№класса")
        REFERENCES public."Класс" ("№класса") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Ученик"
    OWNER to admin;
CREATE TABLE public."предмет"
(
    "вид" text COLLATE pg_catalog."default" NOT NULL,
    "id_предмета" integer NOT NULL,
    "предмет" text COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT "id_предмет" PRIMARY KEY ("id_предмета")
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."предмет"
    OWNER to admin;
CREATE TABLE public."учитель"
(
    "id_учителя" integer NOT NULL,
    "ФИО" text COLLATE pg_catalog."default" NOT NULL,
    "предмет" text COLLATE pg_catalog."default" NOT NULL,
    "классное_руководство" text COLLATE pg_catalog."default" NOT NULL,
    "id_предмета" integer NOT NULL,
    CONSTRAINT "учитель_pkey" PRIMARY KEY ("id_учителя"),
    CONSTRAINT "предмет" FOREIGN KEY ("id_предмета")
        REFERENCES public."предмет" ("id_предмета") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."учитель"
    OWNER to admin;