--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.4
-- Dumped by pg_dump version 9.5.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: departamentos; Type: TABLE; Schema: public; Owner: oficialia
--

CREATE TABLE departamentos (
    id_departamento integer NOT NULL,
    departamento character varying(100) NOT NULL
);


ALTER TABLE departamentos OWNER TO oficialia;

--
-- Name: departamentos_id_departamento_seq; Type: SEQUENCE; Schema: public; Owner: oficialia
--

CREATE SEQUENCE departamentos_id_departamento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE departamentos_id_departamento_seq OWNER TO oficialia;

--
-- Name: departamentos_id_departamento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: oficialia
--

ALTER SEQUENCE departamentos_id_departamento_seq OWNED BY departamentos.id_departamento;


--
-- Name: destinatarios; Type: TABLE; Schema: public; Owner: oficialia
--

CREATE TABLE destinatarios (
    id_destinatario integer NOT NULL,
    id_instruccion integer NOT NULL,
    id_departamento integer NOT NULL,
    fecha_limite date NOT NULL,
    entregado boolean NOT NULL,
    recibe character varying(100) NOT NULL
);


ALTER TABLE destinatarios OWNER TO oficialia;

--
-- Name: COLUMN destinatarios.recibe; Type: COMMENT; Schema: public; Owner: oficialia
--

COMMENT ON COLUMN destinatarios.recibe IS 'nombre de quien recibe el documento';


--
-- Name: destinatarios_id_destinatario_seq; Type: SEQUENCE; Schema: public; Owner: oficialia
--

CREATE SEQUENCE destinatarios_id_destinatario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE destinatarios_id_destinatario_seq OWNER TO oficialia;

--
-- Name: destinatarios_id_destinatario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: oficialia
--

ALTER SEQUENCE destinatarios_id_destinatario_seq OWNED BY destinatarios.id_destinatario;


--
-- Name: documentos; Type: TABLE; Schema: public; Owner: oficialia
--

CREATE TABLE documentos (
    id_documento integer NOT NULL,
    id_formato integer NOT NULL,
    id_tipo_documento integer NOT NULL,
    id_procedencia integer NOT NULL,
    id_destino integer NOT NULL,
    documento character varying(100) NOT NULL,
    folio integer NOT NULL,
    fecha_documento date NOT NULL,
    fecha_recepcion date NOT NULL
);


ALTER TABLE documentos OWNER TO oficialia;

--
-- Name: COLUMN documentos.folio; Type: COMMENT; Schema: public; Owner: oficialia
--

COMMENT ON COLUMN documentos.folio IS 'folio del documento';


--
-- Name: documentos_id_documento_seq; Type: SEQUENCE; Schema: public; Owner: oficialia
--

CREATE SEQUENCE documentos_id_documento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE documentos_id_documento_seq OWNER TO oficialia;

--
-- Name: documentos_id_documento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: oficialia
--

ALTER SEQUENCE documentos_id_documento_seq OWNED BY documentos.id_documento;


--
-- Name: formatos; Type: TABLE; Schema: public; Owner: oficialia
--

CREATE TABLE formatos (
    id_formato integer NOT NULL,
    formato character varying(50) NOT NULL
);


ALTER TABLE formatos OWNER TO oficialia;

--
-- Name: formatos_id_formato_seq; Type: SEQUENCE; Schema: public; Owner: oficialia
--

CREATE SEQUENCE formatos_id_formato_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE formatos_id_formato_seq OWNER TO oficialia;

--
-- Name: formatos_id_formato_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: oficialia
--

ALTER SEQUENCE formatos_id_formato_seq OWNED BY formatos.id_formato;


--
-- Name: instituciones; Type: TABLE; Schema: public; Owner: oficialia
--

CREATE TABLE instituciones (
    id_instituciones integer NOT NULL,
    institucion character varying(100) NOT NULL
);


ALTER TABLE instituciones OWNER TO oficialia;

--
-- Name: instituciones_id_instituciones_seq; Type: SEQUENCE; Schema: public; Owner: oficialia
--

CREATE SEQUENCE instituciones_id_instituciones_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE instituciones_id_instituciones_seq OWNER TO oficialia;

--
-- Name: instituciones_id_instituciones_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: oficialia
--

ALTER SEQUENCE instituciones_id_instituciones_seq OWNED BY instituciones.id_instituciones;


--
-- Name: instrucciones; Type: TABLE; Schema: public; Owner: oficialia
--

CREATE TABLE instrucciones (
    id_instruccion integer NOT NULL,
    instruccion character varying(50) NOT NULL
);


ALTER TABLE instrucciones OWNER TO oficialia;

--
-- Name: instrucciones__id_instruccion_seq; Type: SEQUENCE; Schema: public; Owner: oficialia
--

CREATE SEQUENCE instrucciones__id_instruccion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE instrucciones__id_instruccion_seq OWNER TO oficialia;

--
-- Name: instrucciones__id_instruccion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: oficialia
--

ALTER SEQUENCE instrucciones__id_instruccion_seq OWNED BY instrucciones.id_instruccion;


--
-- Name: procedencias; Type: TABLE; Schema: public; Owner: oficialia
--

CREATE TABLE procedencias (
    id_procedencia integer NOT NULL,
    id_institucion integer NOT NULL,
    firma character varying(50) NOT NULL,
    puesto character varying(50) NOT NULL,
    dirigida character varying(50) NOT NULL,
    asunto character varying(50) NOT NULL,
    observacion text
);


ALTER TABLE procedencias OWNER TO oficialia;

--
-- Name: COLUMN procedencias.firma; Type: COMMENT; Schema: public; Owner: oficialia
--

COMMENT ON COLUMN procedencias.firma IS 'quien firma';


--
-- Name: procedencias_id_procedencia_seq; Type: SEQUENCE; Schema: public; Owner: oficialia
--

CREATE SEQUENCE procedencias_id_procedencia_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE procedencias_id_procedencia_seq OWNER TO oficialia;

--
-- Name: procedencias_id_procedencia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: oficialia
--

ALTER SEQUENCE procedencias_id_procedencia_seq OWNED BY procedencias.id_procedencia;


--
-- Name: tipos_documentos; Type: TABLE; Schema: public; Owner: oficialia
--

CREATE TABLE tipos_documentos (
    id_tipo_documento integer NOT NULL,
    tipo_documento character varying(50) NOT NULL
);


ALTER TABLE tipos_documentos OWNER TO oficialia;

--
-- Name: tipos_documentos_id_tipo_documento_seq; Type: SEQUENCE; Schema: public; Owner: oficialia
--

CREATE SEQUENCE tipos_documentos_id_tipo_documento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipos_documentos_id_tipo_documento_seq OWNER TO oficialia;

--
-- Name: tipos_documentos_id_tipo_documento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: oficialia
--

ALTER SEQUENCE tipos_documentos_id_tipo_documento_seq OWNED BY tipos_documentos.id_tipo_documento;


--
-- Name: id_departamento; Type: DEFAULT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY departamentos ALTER COLUMN id_departamento SET DEFAULT nextval('departamentos_id_departamento_seq'::regclass);


--
-- Name: id_destinatario; Type: DEFAULT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY destinatarios ALTER COLUMN id_destinatario SET DEFAULT nextval('destinatarios_id_destinatario_seq'::regclass);


--
-- Name: id_documento; Type: DEFAULT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY documentos ALTER COLUMN id_documento SET DEFAULT nextval('documentos_id_documento_seq'::regclass);


--
-- Name: id_formato; Type: DEFAULT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY formatos ALTER COLUMN id_formato SET DEFAULT nextval('formatos_id_formato_seq'::regclass);


--
-- Name: id_instituciones; Type: DEFAULT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY instituciones ALTER COLUMN id_instituciones SET DEFAULT nextval('instituciones_id_instituciones_seq'::regclass);


--
-- Name: id_instruccion; Type: DEFAULT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY instrucciones ALTER COLUMN id_instruccion SET DEFAULT nextval('instrucciones__id_instruccion_seq'::regclass);


--
-- Name: id_procedencia; Type: DEFAULT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY procedencias ALTER COLUMN id_procedencia SET DEFAULT nextval('procedencias_id_procedencia_seq'::regclass);


--
-- Name: id_tipo_documento; Type: DEFAULT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY tipos_documentos ALTER COLUMN id_tipo_documento SET DEFAULT nextval('tipos_documentos_id_tipo_documento_seq'::regclass);


--
-- Data for Name: departamentos; Type: TABLE DATA; Schema: public; Owner: oficialia
--

COPY departamentos (id_departamento, departamento) FROM stdin;
4	Recursos Financieros
5	Recursos Materiales
6	Centro de  Cómputo
7	Subdirección
8	Dirección
1	Servicios Escolares 2
2	División de Estudios  Profesionales
3	Recursos Humanos 2
\.


--
-- Name: departamentos_id_departamento_seq; Type: SEQUENCE SET; Schema: public; Owner: oficialia
--

SELECT pg_catalog.setval('departamentos_id_departamento_seq', 19, true);


--
-- Data for Name: destinatarios; Type: TABLE DATA; Schema: public; Owner: oficialia
--

COPY destinatarios (id_destinatario, id_instruccion, id_departamento, fecha_limite, entregado, recibe) FROM stdin;
24	2	4	1211-12-12	f	12
25	4	6	2012-12-12	t	pato
\.


--
-- Name: destinatarios_id_destinatario_seq; Type: SEQUENCE SET; Schema: public; Owner: oficialia
--

SELECT pg_catalog.setval('destinatarios_id_destinatario_seq', 25, true);


--
-- Data for Name: documentos; Type: TABLE DATA; Schema: public; Owner: oficialia
--

COPY documentos (id_documento, id_formato, id_tipo_documento, id_procedencia, id_destino, documento, folio, fecha_documento, fecha_recepcion) FROM stdin;
6	2	7	25	24	510f2044f5295a03f87165a8b3dc791e.pdf	1234	1212-12-12	1212-12-12
7	3	8	26	25	e0ae89286a5053bce548f077e83109ff.pdf	123	2012-12-12	2012-12-12
\.


--
-- Name: documentos_id_documento_seq; Type: SEQUENCE SET; Schema: public; Owner: oficialia
--

SELECT pg_catalog.setval('documentos_id_documento_seq', 7, true);


--
-- Data for Name: formatos; Type: TABLE DATA; Schema: public; Owner: oficialia
--

COPY formatos (id_formato, formato) FROM stdin;
2	Copia
3	Original
\.


--
-- Name: formatos_id_formato_seq; Type: SEQUENCE SET; Schema: public; Owner: oficialia
--

SELECT pg_catalog.setval('formatos_id_formato_seq', 5, true);


--
-- Data for Name: instituciones; Type: TABLE DATA; Schema: public; Owner: oficialia
--

COPY instituciones (id_instituciones, institucion) FROM stdin;
1	Tecnologico
2	Profeco
4	Gobierno municipal
5	Gobierno federal
7	ANFEI
8	ANUIES
9	CENEVAL
10	CONACYT
11	CUDI
12	INEGI
13	ISSSTE
14	IMSS
15	EMPRESA
6	SEMARNAT
3	Sagarpa 1
\.


--
-- Name: instituciones_id_instituciones_seq; Type: SEQUENCE SET; Schema: public; Owner: oficialia
--

SELECT pg_catalog.setval('instituciones_id_instituciones_seq', 19, true);


--
-- Data for Name: instrucciones; Type: TABLE DATA; Schema: public; Owner: oficialia
--

COPY instrucciones (id_instruccion, instruccion) FROM stdin;
2	Dar respuesta al intereado
3	Para su conocimiento
4	Para su difusion
5	Atencion y seguimiento
1	Para su atencion procedente
\.


--
-- Name: instrucciones__id_instruccion_seq; Type: SEQUENCE SET; Schema: public; Owner: oficialia
--

SELECT pg_catalog.setval('instrucciones__id_instruccion_seq', 5, true);


--
-- Data for Name: procedencias; Type: TABLE DATA; Schema: public; Owner: oficialia
--

COPY procedencias (id_procedencia, id_institucion, firma, puesto, dirigida, asunto, observacion) FROM stdin;
25	1	12	12	12	12	12
26	10	luis	pato	luis	pato	observacion
\.


--
-- Name: procedencias_id_procedencia_seq; Type: SEQUENCE SET; Schema: public; Owner: oficialia
--

SELECT pg_catalog.setval('procedencias_id_procedencia_seq', 26, true);


--
-- Data for Name: tipos_documentos; Type: TABLE DATA; Schema: public; Owner: oficialia
--

COPY tipos_documentos (id_tipo_documento, tipo_documento) FROM stdin;
7	Oficio
8	Tarjeta informatica
9	escrito personal
\.


--
-- Name: tipos_documentos_id_tipo_documento_seq; Type: SEQUENCE SET; Schema: public; Owner: oficialia
--

SELECT pg_catalog.setval('tipos_documentos_id_tipo_documento_seq', 10, true);


--
-- Name: pk_departamentos; Type: CONSTRAINT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY departamentos
    ADD CONSTRAINT pk_departamentos PRIMARY KEY (id_departamento);


--
-- Name: pk_destinatarios; Type: CONSTRAINT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY destinatarios
    ADD CONSTRAINT pk_destinatarios PRIMARY KEY (id_destinatario);


--
-- Name: pk_documentos; Type: CONSTRAINT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT pk_documentos PRIMARY KEY (id_documento);


--
-- Name: pk_formatos; Type: CONSTRAINT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY formatos
    ADD CONSTRAINT pk_formatos PRIMARY KEY (id_formato);


--
-- Name: pk_instituciones; Type: CONSTRAINT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY instituciones
    ADD CONSTRAINT pk_instituciones PRIMARY KEY (id_instituciones);


--
-- Name: pk_instrucciones_0; Type: CONSTRAINT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY instrucciones
    ADD CONSTRAINT pk_instrucciones_0 PRIMARY KEY (id_instruccion);


--
-- Name: pk_procedencias; Type: CONSTRAINT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY procedencias
    ADD CONSTRAINT pk_procedencias PRIMARY KEY (id_procedencia);


--
-- Name: pk_tipos_documentos; Type: CONSTRAINT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY tipos_documentos
    ADD CONSTRAINT pk_tipos_documentos PRIMARY KEY (id_tipo_documento);


--
-- Name: idx_destinatarios; Type: INDEX; Schema: public; Owner: oficialia
--

CREATE INDEX idx_destinatarios ON destinatarios USING btree (id_departamento);


--
-- Name: idx_destinatarios_0; Type: INDEX; Schema: public; Owner: oficialia
--

CREATE INDEX idx_destinatarios_0 ON destinatarios USING btree (id_instruccion);


--
-- Name: idx_documentos; Type: INDEX; Schema: public; Owner: oficialia
--

CREATE INDEX idx_documentos ON documentos USING btree (id_formato);


--
-- Name: idx_documentos_0; Type: INDEX; Schema: public; Owner: oficialia
--

CREATE INDEX idx_documentos_0 ON documentos USING btree (id_destino);


--
-- Name: idx_documentos_1; Type: INDEX; Schema: public; Owner: oficialia
--

CREATE INDEX idx_documentos_1 ON documentos USING btree (id_procedencia);


--
-- Name: idx_documentos_2; Type: INDEX; Schema: public; Owner: oficialia
--

CREATE INDEX idx_documentos_2 ON documentos USING btree (id_tipo_documento);


--
-- Name: idx_procedencias; Type: INDEX; Schema: public; Owner: oficialia
--

CREATE INDEX idx_procedencias ON procedencias USING btree (id_institucion);


--
-- Name: fk_destinatarios_departamentos; Type: FK CONSTRAINT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY destinatarios
    ADD CONSTRAINT fk_destinatarios_departamentos FOREIGN KEY (id_departamento) REFERENCES departamentos(id_departamento);


--
-- Name: fk_destinatarios_instrucciones; Type: FK CONSTRAINT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY destinatarios
    ADD CONSTRAINT fk_destinatarios_instrucciones FOREIGN KEY (id_instruccion) REFERENCES instrucciones(id_instruccion);


--
-- Name: fk_documentos_destinatarios; Type: FK CONSTRAINT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT fk_documentos_destinatarios FOREIGN KEY (id_destino) REFERENCES destinatarios(id_destinatario);


--
-- Name: fk_documentos_formatos; Type: FK CONSTRAINT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT fk_documentos_formatos FOREIGN KEY (id_formato) REFERENCES formatos(id_formato);


--
-- Name: fk_documentos_procedencias; Type: FK CONSTRAINT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT fk_documentos_procedencias FOREIGN KEY (id_procedencia) REFERENCES procedencias(id_procedencia);


--
-- Name: fk_documentos_tipos_documentos; Type: FK CONSTRAINT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT fk_documentos_tipos_documentos FOREIGN KEY (id_tipo_documento) REFERENCES tipos_documentos(id_tipo_documento);


--
-- Name: fk_procedencias_instituciones; Type: FK CONSTRAINT; Schema: public; Owner: oficialia
--

ALTER TABLE ONLY procedencias
    ADD CONSTRAINT fk_procedencias_instituciones FOREIGN KEY (id_institucion) REFERENCES instituciones(id_instituciones);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

