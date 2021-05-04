CREATE DATABASE uwin_iwin
  WITH ENCODING='UTF8'
       CONNECTION LIMIT=-1;


CREATE TABLE public.users
(
    "ipkUserID" serial NOT NULL,
    "strUsername" character varying(250),
    "strPassword" character varying(250),
    "strFirstName" character varying(250),
    "strSurname" character varying(250),
    "bEnabled" boolean,
    PRIMARY KEY ("ipkUserID")
);

CREATE TABLE public.deals
(
    "ipkDealID" serial NOT NULL,
    "iUserID" integer,
    "strClientName" character varying(250),
    "fRandValue" double precision,
    "dtTransactionDate" date,
    PRIMARY KEY ("ipkDealID"),
    CONSTRAINT "iUserID_fk" FOREIGN KEY ("iUserID")
        REFERENCES public.users ("ipkUserID") MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE
        NOT VALID
);

COMMENT ON CONSTRAINT "iUserID_fk" ON public.deals
    IS 'references the users table – the user involved with the deal';

ALTER TABLE public.users
    ADD CONSTRAINT "strUsername_unq" UNIQUE ("strUsername");