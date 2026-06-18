CREATE DATABASE tienda;
USE tienda;

CREATE TABLE productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  precio DECIMAL(10,2)
);

INSERT INTO productos (nombre, precio) VALUES
('Teclado', 25.50),
('Ratón', 12.30),
('Monitor', 150.00);
