DROP DATABASE IF EXISTS recursosHumanos;

CREATE DATABASE IF NOT EXISTS recursosHumanos DEFAULT CHARACTER SET utf8;

USE recursosHumanos;

CREATE TABLE empregados (
    id_empregado INT AUTO_INCREMENT NOT NULL,
    data_nascimento DATE,
    nome VARCHAR(20) NOT NULL,
    apelido VARCHAR(20) NOT NULL,
    genero ENUM('M','F') NOT NULL,    
    data_contratacao DATE NOT NULL,
    titulo varchar(15),
    formacao VARCHAR(30),
    PRIMARY KEY (id_empregado)
)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE departamentos (
    id_departamento INT(4) AUTO_INCREMENT NOT NULL,
    departamento VARCHAR(40) NOT NULL,
    imagem varchar(40) UNIQUE,
    PRIMARY KEY (id_departamento),
    UNIQUE KEY (departamento)
)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE gestor_departamento (
   id_empregado INT(11) NOT NULL,
   id_departamento INT(4) NOT NULL,
   data_inicio DATE NOT NULL,
   data_fim DATE,
   FOREIGN KEY (id_empregado) REFERENCES empregados (id_empregado) ON DELETE CASCADE,
   FOREIGN KEY (id_departamento) REFERENCES departamentos (id_departamento) ON DELETE CASCADE,
   PRIMARY KEY (id_empregado,id_departamento)
)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE departamento_empregado (
	id_empregado INT(11) NOT NULL,
   id_departamento INT(4) NOT NULL,
   data_inicio DATE NOT NULL,
   data_fim DATE,
   FOREIGN KEY (id_empregado) REFERENCES empregados (id_empregado) ON DELETE CASCADE,
   FOREIGN KEY (id_departamento) REFERENCES departamentos (id_departamento) ON DELETE CASCADE,
   PRIMARY KEY (id_empregado,id_departamento)
)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE salarios (
	id_salario INT AUTO_INCREMENT NOT NULL,
    id_empregado INT NOT NULL,
    salario DOUBLE NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE,
    FOREIGN KEY (id_empregado) REFERENCES empregados (id_empregado) ON DELETE CASCADE,
    PRIMARY KEY (id_salario,id_empregado)
)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE utilizadores (
	id_utilizador INT AUTO_INCREMENT NOT NULL,
	email VARCHAR(50) UNIQUE NOT NULL,
    pass VARCHAR(50) NOT NULL,
    titulo varchar(15),
    nome varchar(20) NOT NULL,
    apelido varchar(20) NOT NULL,
	nivel_acesso INT(1) NOT NULL,
    genero ENUM('M','F') NOT NULL,
    PRIMARY KEY (id_utilizador)
)
DEFAULT CHARACTER SET = utf8;

CREATE TABLE log (
	id_log INT AUTO_INCREMENT NOT NULL,
    id_utilizador INT NOT NUll,
    data_login DATE NOT NULL,
    data_logout DATE,
    PRIMARY KEY (id_log,id_utilizador),
    FOREIGN KEY (id_utilizador) REFERENCES utilizadores (id_utilizador)
)
DEFAULT CHARACTER SET = utf8;

INSERT INTO utilizadores (email, pass, titulo, nome, apelido, nivel_acesso, genero) VALUES 
	('admin@teste', 'asdasd', 'Sr.', 'João Pedro', 'Martins', 1, 'M'),
    ('user@teste', 'asdasd', 'Sr.', 'João Pedro', 'Martins', 0, 'M');

INSERT INTO departamentos (departamento, imagem) VALUES
	('Marketing','advertising.png'),
	('Desenvolvimento','browser.png'),
	('Teste','control.png'),
	('Finanças','money.png'),
	('Design','paint.png'),
	('Recursos Humanos','team.png');

INSERT INTO empregados (data_nascimento, nome, apelido, genero, data_contratacao, titulo, formacao) VALUES 
('1980-09-04', 'António', 'Jacinto', 'M', '2019-03-18', 'Sr.', NULL),
('1990-04-17', 'José', 'Fonseca', 'M', '2015-04-04', 'Sr.', NULL),
('1967-11-19', 'Carlos', 'Manuel', 'M', '2015-04-04', 'Sr.', NULL),
('1983-05-14', 'Maria', 'Martins', 'F', '2015-04-04', 'Sra.', NULL),
('1921-04-16', 'Laura', 'Martins', 'F', '2015-04-04', 'Sra.', NULL),
('1978-02-17', 'Rodrigo', 'Gomes', 'M', '2015-04-04', 'Dr.', NULL),
('1996-07-11', 'Leonel', 'Sanches', 'M', '2015-04-04', 'Dr.', NULL),
('1987-03-10', 'Vasco', 'Alfredo', 'M', '2015-04-04', 'Sr.', NULL),
('1985-08-18', 'António', 'Correia', 'M', '2015-04-04', 'Dr.', NULL),
('1994-10-23', 'Alberto', 'Jesus', 'M', '2015-04-04', 'Dr.', NULL),
('1993-12-17', 'Francisco', 'Coelho', 'M', '2015-04-04', 'Sr.', NULL),
('1974-06-13', 'Pedro', 'Pereira', 'M', '2015-04-04', 'Dr.', NULL),
('1998-01-10', 'Venício', 'Carrilho', 'M', '2015-04-04', 'Dr.', NULL),
('1999-12-28', 'Emanuel', 'Santos', 'M', '2015-04-04', 'Sr.', NULL),
('1970-07-30', 'Adriana', 'Modesto', 'F', '2015-04-04', 'Sra.', NULL),
('1970-10-21', 'Cristiana', 'Sanhudo', 'F', '2015-04-04', 'Prof. Dr.', NULL),
('1970-02-23', 'Alice', 'Martins', 'F', '2015-04-04', 'Sra.', NULL),
('1970-09-11', 'João', 'Fonseca', 'M', '2015-04-04', 'Prof. Dr.', NULL),
('1970-12-08', 'Guilherme', 'Pedro', 'M', '2015-04-04', 'Prof. Dr.', NULL),
('1970-01-26', 'Ana', 'Manteigas', 'F', '2015-04-04', 'Profa. Dra.', NULL),
('1970-02-28', 'Sara', 'Caneca', 'F', '2015-04-04', 'Sra.', NULL),
('1970-07-01', 'Rui', 'Baltazar', 'M', '2015-04-04', 'Prof. Dr.', NULL),
('1980-09-04', 'António', 'Jacinto', 'M', '2019-03-18', 'Sr.', NULL),
('1990-04-17', 'José', 'Fonseca', 'M', '2015-04-04', 'Sr.', NULL),
('1967-11-19', 'Carlos', 'Manuel', 'M', '2015-04-04', 'Sr.', NULL),
('1983-05-14', 'Maria', 'Martins', 'F', '2015-04-04', 'Sra.', NULL),
('1921-04-16', 'Laura', 'Martins', 'F', '2015-04-04', 'Sra.', NULL),
('1978-02-17', 'Rodrigo', 'Gomes', 'M', '2015-04-04', 'Dr.', NULL),
('1996-07-11', 'Leonel', 'Sanches', 'M', '2015-04-04', 'Dr.', NULL),
('1987-03-10', 'Vasco', 'Alfredo', 'M', '2015-04-04', 'Sr.', NULL),
('1985-08-18', 'António', 'Correia', 'M', '2015-04-04', 'Dr.', NULL),
('1994-10-23', 'Alberto', 'Jesus', 'M', '2015-04-04', 'Dr.', NULL),
('1993-12-17', 'Francisco', 'Coelho', 'M', '2015-04-04', 'Sr.', NULL),
('1974-06-13', 'Pedro', 'Pereira', 'M', '2015-04-04', 'Dr.', NULL),
('1998-01-10', 'Venício', 'Carrilho', 'M', '2015-04-04', 'Dr.', NULL),
('1999-12-28', 'Emanuel', 'Santos', 'M', '2015-04-04', 'Sr.', NULL),
('1970-07-30', 'Adriana', 'Modesto', 'F', '2015-04-04', 'Sra.', NULL),
('1970-10-21', 'Cristiana', 'Sanhudo', 'F', '2015-04-04', 'Prof. Dr.', NULL),
('1970-02-23', 'Alice', 'Martins', 'F', '2015-04-04', 'Sra.', NULL),
('1970-09-11', 'João', 'Fonseca', 'M', '2015-04-04', 'Prof. Dr.', NULL),
('1970-12-08', 'Guilherme', 'Pedro', 'M', '2015-04-04', 'Prof. Dr.', NULL),
('1970-01-26', 'Ana', 'Manteigas', 'F', '2015-04-04', 'Profa. Dra.', NULL),
('1970-02-28', 'Sara', 'Caneca', 'F', '2015-04-04', 'Sra.', NULL),
('1980-09-04', 'António', 'Jacinto', 'M', '2019-03-18', 'Sr.', NULL),
('1990-04-17', 'José', 'Fonseca', 'M', '2015-04-04', 'Sr.', NULL),
('1967-11-19', 'Carlos', 'Manuel', 'M', '2015-04-04', 'Sr.', NULL),
('1983-05-14', 'Maria', 'Martins', 'F', '2015-04-04', 'Sra.', NULL),
('1921-04-16', 'Laura', 'Martins', 'F', '2015-04-04', 'Sra.', NULL),
('1978-02-17', 'Rodrigo', 'Gomes', 'M', '2015-04-04', 'Dr.', NULL),
('1996-07-11', 'Leonel', 'Sanches', 'M', '2015-04-04', 'Dr.', NULL),
('1987-03-10', 'Vasco', 'Alfredo', 'M', '2015-04-04', 'Sr.', NULL),
('1985-08-18', 'António', 'Correia', 'M', '2015-04-04', 'Dr.', NULL),
('1994-10-23', 'Alberto', 'Jesus', 'M', '2015-04-04', 'Dr.', NULL),
('1993-12-17', 'Francisco', 'Coelho', 'M', '2015-04-04', 'Sr.', NULL),
('1974-06-13', 'Pedro', 'Pereira', 'M', '2015-04-04', 'Dr.', NULL),
('1998-01-10', 'Venício', 'Carrilho', 'M', '2015-04-04', 'Dr.', NULL),
('1999-12-28', 'Emanuel', 'Santos', 'M', '2015-04-04', 'Sr.', NULL),
('1970-07-30', 'Adriana', 'Modesto', 'F', '2015-04-04', 'Sra.', NULL),
('1970-10-21', 'Cristiana', 'Sanhudo', 'F', '2015-04-04', 'Prof. Dr.', NULL),
('1970-02-23', 'Alice', 'Martins', 'F', '2015-04-04', 'Sra.', NULL);

INSERT INTO gestor_departamento (id_empregado, id_departamento, data_inicio) VALUES 
('1', '1', '2019-12-01'), 
('2', '2', '2019-11-11'),
('3', '3', '2019-05-13'),
('4', '4', '2019-06-11'),
('5', '5', '2019-08-05'),
('6', '6', '2018-12-04');

INSERT INTO `departamento_empregado` (`id_empregado`, `id_departamento`, `data_inicio`, `data_fim`) VALUES 
('1', '1', '2020-01-20', NULL), 
('2', '1', '2020-01-20', NULL), 
('3', '1', '2020-01-20', NULL), 
('4', '1', '2020-01-20', NULL), 
('5', '1', '2020-01-20', NULL), 
('6', '1', '2020-01-20', NULL), 
('7', '1', '2020-01-20', NULL), 
('8', '1', '2020-01-20', NULL), 
('9', '1', '2020-01-20', NULL), 
('10', '1', '2020-01-20', NULL), 
('11', '2', '2020-01-20', NULL),
('12', '2', '2020-01-20', NULL),
('13', '2', '2020-01-20', NULL), 
('14', '2', '2020-01-20', NULL), 
('15', '2', '2020-01-20', NULL), 
('16', '2', '2020-01-20', NULL), 
('17', '2', '2020-01-20', NULL), 
('18', '2', '2020-01-20', NULL), 
('19', '2', '2020-01-20', NULL), 
('20', '2', '2020-01-20', NULL),
('21', '3', '2020-01-20', NULL),
('22', '3', '2020-01-20', NULL), 
('23', '3', '2020-01-20', NULL), 
('24', '3', '2020-01-20', NULL),
('25', '3', '2020-01-20', NULL),
('26', '3', '2020-01-20', NULL), 
('27', '3', '2020-01-20', NULL), 
('28', '3', '2020-01-20', NULL), 
('29', '3', '2020-01-20', NULL), 
('30', '3', '2020-01-20', NULL), 
('31', '4', '2020-01-20', NULL), 
('32', '4', '2020-01-20', NULL), 
('33', '4', '2020-01-20', NULL), 
('34', '4', '2020-01-20', NULL), 
('35', '4', '2020-01-20', NULL), 
('36', '4', '2020-01-20', NULL), 
('37', '4', '2020-01-20', NULL), 
('38', '4', '2020-01-20', NULL), 
('39', '4', '2020-01-20', NULL), 
('40', '4', '2020-01-20', NULL), 
('41', '5', '2020-01-20', NULL), 
('42', '5', '2020-01-20', NULL), 
('43', '5', '2020-01-20', NULL),
('44', '5',	'2020-01-20', NULL),
('45', '5', '2020-01-20', NULL), 
('46', '5', '2020-01-20', NULL), 
('47', '5', '2020-01-20', NULL), 
('48', '5', '2020-01-20', NULL), 
('49', '5', '2020-01-20', NULL), 
('50', '5', '2020-01-20', NULL), 
('51', '6', '2020-01-20', NULL), 
('52', '6', '2020-01-20', NULL), 
('53', '6', '2020-01-20', NULL), 
('54', '6', '2020-01-20', NULL), 
('55', '6', '2020-01-20', NULL), 
('56', '6', '2020-01-20', NULL), 
('57', '6', '2020-01-20', NULL), 
('58', '6', '2020-01-20', NULL), 
('59', '6', '2020-01-20', NULL), 
('60', '6', '2020-01-20', NULL);
    