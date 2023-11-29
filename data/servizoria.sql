--
-- PostgreSQL database dump
--

-- Dumped from database version 15.5 (Debian 15.5-0+deb12u1)
-- Dumped by pg_dump version 15.5 (Debian 15.5-0+deb12u1)

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: city; Type: TABLE; Schema: public; Owner: spring
--

CREATE TABLE public.city (
    id integer NOT NULL,
    name character varying(255),
    region_id integer NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL
);


ALTER TABLE public.city OWNER TO spring;

--
-- Name: city_id_seq; Type: SEQUENCE; Schema: public; Owner: spring
--

CREATE SEQUENCE public.city_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.city_id_seq OWNER TO spring;

--
-- Name: city_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: spring
--

ALTER SEQUENCE public.city_id_seq OWNED BY public.city.id;


--
-- Name: migration; Type: TABLE; Schema: public; Owner: spring
--

CREATE TABLE public.migration (
    version character varying(180) NOT NULL,
    apply_time integer
);


ALTER TABLE public.migration OWNER TO spring;

--
-- Name: region; Type: TABLE; Schema: public; Owner: spring
--

CREATE TABLE public.region (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL
);


ALTER TABLE public.region OWNER TO spring;

--
-- Name: region_id_seq; Type: SEQUENCE; Schema: public; Owner: spring
--

CREATE SEQUENCE public.region_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.region_id_seq OWNER TO spring;

--
-- Name: region_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: spring
--

ALTER SEQUENCE public.region_id_seq OWNED BY public.region.id;


--
-- Name: survey; Type: TABLE; Schema: public; Owner: spring
--

CREATE TABLE public.survey (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    city_id integer NOT NULL,
    rating smallint NOT NULL,
    gender smallint NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL,
    comment text NOT NULL
);


ALTER TABLE public.survey OWNER TO spring;

--
-- Name: survey_id_seq; Type: SEQUENCE; Schema: public; Owner: spring
--

CREATE SEQUENCE public.survey_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.survey_id_seq OWNER TO spring;

--
-- Name: survey_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: spring
--

ALTER SEQUENCE public.survey_id_seq OWNED BY public.survey.id;


--
-- Name: user; Type: TABLE; Schema: public; Owner: spring
--

CREATE TABLE public."user" (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    auth_key character varying(32) NOT NULL,
    password_hash character varying(255) NOT NULL,
    password_reset_token character varying(255),
    email character varying(255) NOT NULL,
    status smallint DEFAULT 10 NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL,
    verification_token character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public."user" OWNER TO spring;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: spring
--

CREATE SEQUENCE public.user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO spring;

--
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: spring
--

ALTER SEQUENCE public.user_id_seq OWNED BY public."user".id;


--
-- Name: city id; Type: DEFAULT; Schema: public; Owner: spring
--

ALTER TABLE ONLY public.city ALTER COLUMN id SET DEFAULT nextval('public.city_id_seq'::regclass);


--
-- Name: region id; Type: DEFAULT; Schema: public; Owner: spring
--

ALTER TABLE ONLY public.region ALTER COLUMN id SET DEFAULT nextval('public.region_id_seq'::regclass);


--
-- Name: survey id; Type: DEFAULT; Schema: public; Owner: spring
--

ALTER TABLE ONLY public.survey ALTER COLUMN id SET DEFAULT nextval('public.survey_id_seq'::regclass);


--
-- Name: user id; Type: DEFAULT; Schema: public; Owner: spring
--

ALTER TABLE ONLY public."user" ALTER COLUMN id SET DEFAULT nextval('public.user_id_seq'::regclass);


--
-- Data for Name: city; Type: TABLE DATA; Schema: public; Owner: spring
--

COPY public.city (id, name, region_id, created_at, updated_at) FROM stdin;
1	Бор	5	1701249481	1701249481
2	Бор	2	1701249499	1701249499
3	Саров	5	1701249541	1701249541
4	Ярославль	4	1701249576	1701249576
5	Данилов	4	1701249593	1701249593
6	Гатчина	2	1701249617	1701249617
7	Всеволожск	2	1701249661	1701249661
8	Химки	1	1701249696	1701249696
9	Истра	1	1701249727	1701249727
\.


--
-- Data for Name: migration; Type: TABLE DATA; Schema: public; Owner: spring
--

COPY public.migration (version, apply_time) FROM stdin;
m000000_000000_base	1701249233
m130524_201442_init	1701249235
m190124_110200_add_verification_token_column_to_user_table	1701249235
m231128_184759_create_table_tbl_region	1701249235
m231128_184806_create_table_tbl_city	1701249235
m231128_185642_create_table_tbl_survey	1701249235
m231128_224248_add_admin_user	1701249237
\.


--
-- Data for Name: region; Type: TABLE DATA; Schema: public; Owner: spring
--

COPY public.region (id, name, created_at, updated_at) FROM stdin;
1	Московская область	1701249340	1701249340
2	Ленинградская область	1701249354	1701249354
3	Брянская область	1701249406	1701249406
4	Ярославская область	1701249422	1701249422
5	Нижегородская область	1701249443	1701249443
\.


--
-- Data for Name: survey; Type: TABLE DATA; Schema: public; Owner: spring
--

COPY public.survey (id, name, email, phone, city_id, rating, gender, created_at, updated_at, comment) FROM stdin;
3	test3	test3@example.com	78789787987	5	8	1	1701250853	1701250853	test3
4	test1	test1@example.com	77876787678	6	2	1	1701250941	1701250941	test1
5	test2	test2@exaple.com	78789778797	6	9	2	1701250968	1701250968	test2
6	test4	test4@example.com	78787897987	3	8	2	1701251424	1701251424	test4
7	test5	test5@example.com	78797787977	2	7	1	1701251466	1701251466	test5
8	test6@example.com	test6@example.com	77678678676	8	4	2	1701251565	1701251565	test6
9	test7	test7@example.com	78787897879	9	2	1	1701251596	1701251596	test7
\.


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: spring
--

COPY public."user" (id, username, auth_key, password_hash, password_reset_token, email, status, created_at, updated_at, verification_token) FROM stdin;
1	admin	QNOixbygiPZfnUd4CqYczUluEsvG5xAI	$2y$13$4Aks7QaY8aQrg0aLf5j.k.OELw/10iI3iu1bCLlvekz1sR3RypSW6	\N	admin@example.com	10	1701249237	1701249237	\N
\.


--
-- Name: city_id_seq; Type: SEQUENCE SET; Schema: public; Owner: spring
--

SELECT pg_catalog.setval('public.city_id_seq', 9, true);


--
-- Name: region_id_seq; Type: SEQUENCE SET; Schema: public; Owner: spring
--

SELECT pg_catalog.setval('public.region_id_seq', 5, true);


--
-- Name: survey_id_seq; Type: SEQUENCE SET; Schema: public; Owner: spring
--

SELECT pg_catalog.setval('public.survey_id_seq', 9, true);


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: spring
--

SELECT pg_catalog.setval('public.user_id_seq', 1, true);


--
-- Name: city city_pkey; Type: CONSTRAINT; Schema: public; Owner: spring
--

ALTER TABLE ONLY public.city
    ADD CONSTRAINT city_pkey PRIMARY KEY (id);


--
-- Name: migration migration_pkey; Type: CONSTRAINT; Schema: public; Owner: spring
--

ALTER TABLE ONLY public.migration
    ADD CONSTRAINT migration_pkey PRIMARY KEY (version);


--
-- Name: region region_name_key; Type: CONSTRAINT; Schema: public; Owner: spring
--

ALTER TABLE ONLY public.region
    ADD CONSTRAINT region_name_key UNIQUE (name);


--
-- Name: region region_pkey; Type: CONSTRAINT; Schema: public; Owner: spring
--

ALTER TABLE ONLY public.region
    ADD CONSTRAINT region_pkey PRIMARY KEY (id);


--
-- Name: survey survey_pkey; Type: CONSTRAINT; Schema: public; Owner: spring
--

ALTER TABLE ONLY public.survey
    ADD CONSTRAINT survey_pkey PRIMARY KEY (id);


--
-- Name: user user_email_key; Type: CONSTRAINT; Schema: public; Owner: spring
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_email_key UNIQUE (email);


--
-- Name: user user_password_reset_token_key; Type: CONSTRAINT; Schema: public; Owner: spring
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_password_reset_token_key UNIQUE (password_reset_token);


--
-- Name: user user_pkey; Type: CONSTRAINT; Schema: public; Owner: spring
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- Name: user user_username_key; Type: CONSTRAINT; Schema: public; Owner: spring
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_username_key UNIQUE (username);


--
-- Name: city_name_region_id_ukey; Type: INDEX; Schema: public; Owner: spring
--

CREATE UNIQUE INDEX city_name_region_id_ukey ON public.city USING btree (name, region_id);


--
-- Name: city site_region_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: spring
--

ALTER TABLE ONLY public.city
    ADD CONSTRAINT site_region_id_fk FOREIGN KEY (region_id) REFERENCES public.region(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: survey survey_city_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: spring
--

ALTER TABLE ONLY public.survey
    ADD CONSTRAINT survey_city_id_fk FOREIGN KEY (city_id) REFERENCES public.city(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

