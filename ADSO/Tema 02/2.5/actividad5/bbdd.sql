--CREAMOS BASE DE DATOS:
CREATE DATABASE IF NOT EXISTS asir_db;
-- NOS CONECTAMOS A ELLA:
USE asir_db;

--
-- 1. CREATE TABLE
--
DROP TABLE IF EXISTS alumnos;

CREATE TABLE alumnos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    poblacion VARCHAR(100) NOT NULL,
    fecha_alta TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

--
-- 2. INSERT (Ejemplos)
--
INSERT INTO alumnos (nombre, poblacion) VALUES
('Ana García', 'Madrid'),
('Pedro López', 'Barcelona'),
('Sofía Martín', 'Valencia'),
('Javier Ruiz', 'Sevilla'),
('Elena Torres', 'Bilbao');
