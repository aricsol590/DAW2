DROP DATABASE IF EXISTS tienda;
CREATE DATABASE tienda;
USE tienda;

CREATE TABLE fabricante (
    codigo INT(10) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE producto (
    codigo INT(10) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    codigo_fabricante INT(10),
    FOREIGN KEY (codigo_fabricante) REFERENCES fabricante(codigo)
);

INSERT INTO fabricante (codigo, nombre) VALUES
(1, 'Asus'), 
(2, 'Lenovo'), 
(3, 'HP'), 
(4, 'Samsung'), 
(5, 'Seagate'), 
(6, 'Crucial'), 
(7, 'Gigabyte');

INSERT INTO producto (nombre, precio, codigo_fabricante) VALUES
('Disco Duro', 86.99, 5),
('Memoria RAM', 120.6, 6),
('Disco SSD', 150.99, 4),
('GeForce', 185.7, 7),
('Monitor', 202.1, 1),
('Portátil', 505.2, 2),
('Impresora', 59.99, 3);

DROP USER IF EXISTS 'rico'@'localhost';

CREATE USER 'rico'@'localhost' IDENTIFIED BY 'dwes';

GRANT ALL PRIVILEGES ON tienda.* TO 'rico'@'localhost';

FLUSH PRIVILEGES;