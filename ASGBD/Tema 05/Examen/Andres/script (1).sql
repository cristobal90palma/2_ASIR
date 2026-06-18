CREATE DATABASE global_express_db;
USE global_express_db;

CREATE TABLE Clientes (
id_cliente INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(32) NOT NULL,
email VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE Categorias (
id_categoria INT AUTO_INCREMENT PRIMARY KEY,
nombre_categoria VARCHAR(100) NOT NULL
);

CREATE TABLE Productos (
id_producto INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(150) NOT NULL,
precio_unitario DECIMAL(10, 2) NOT NULL,
id_categoria INT,
FOREIGN KEY (id_categoria) REFERENCES Categorias(id_categoria)
);

CREATE TABLE reviews (
id INT AUTO_INCREMENT PRIMARY KEY,
id_producto INT,
id_cliente INT,
comentario TEXT,
FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente),
FOREIGN KEY (id_producto) REFERENCES Productos(id_producto)
);

CREATE TABLE paises(
id_pais INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(16),
siglas VARCHAR(2)
)

CREATE TABLE pedidos (
id_pedido INT AUTO_INCREMENT PRIMARY KEY,
id_cliente INT,
fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
estado VARCHAR(50),
codigo_pais INT,
FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
FOREIGN KEY (codigo_pais) REFERENCES paises(id_pais)
);

CREATE TABLE detalles_pedido (
id_detalle INT AUTO_INCREMENT PRIMARY KEY,
id_pedido INT,
id_producto INT,
cantidad INT NOT NULL,
FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido),
FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
);


CREATE INDEX idx_fecha ON pedidos(fecha);
CREATE INDEX idx_email ON Clientes(email);



