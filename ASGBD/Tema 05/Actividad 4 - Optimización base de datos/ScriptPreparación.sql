-- 1. Creación de la base de datos
DROP DATABASE IF EXISTS logistica_db;
CREATE DATABASE logistica_db;
USE logistica_db;

CREATE TABLE pedidos_brutos (
    id_pedido INT NOT NULL, 
    fecha_pedido VARCHAR(100),
    cliente_nombre VARCHAR(255),
    cliente_email VARCHAR(255), 
    producto_nombre VARCHAR(255),
    categoria_producto VARCHAR(200),
    cantidad VARCHAR(50), 
    precio_unitario VARCHAR(50),
    estado_envio VARCHAR(500),
    codigo_postal VARCHAR(10)
);

-- 3. Procedimiento para generar 50.000 registros de prueba
DELIMITER //
CREATE PROCEDURE CargarDatosPrueba()
BEGIN
    DECLARE i INT DEFAULT 1;
    WHILE i <= 50000 DO
        INSERT INTO pedidos_brutos VALUES (
            i,
            DATE_FORMAT(DATE_ADD('2023-01-01', INTERVAL FLOOR(RAND() * 365) DAY), '%d/%m/%Y'),
            CONCAT('Cliente ', FLOOR(RAND() * 1000)),
            CONCAT('email', FLOOR(RAND() * 1000), '@empresa.com'),
            CONCAT('Producto ', FLOOR(RAND() * 100)),
            CASE FLOOR(RAND() * 4) 
                WHEN 0 THEN 'Electrónica' 
                WHEN 1 THEN 'Hogar' 
                WHEN 2 THEN 'Juguetes' 
                ELSE 'Ropa' 
            END,
            FLOOR(1 + RAND() * 10),
            ROUND(5 + RAND() * 100, 2),
            CASE FLOOR(RAND() * 3) 
                WHEN 0 THEN 'ENTREGADO' 
                WHEN 1 THEN 'PENDIENTE' 
                ELSE 'CANCELADO' 
            END,
            FLOOR(10000 + RAND() * 40000)
        );
        SET i = i + 1;
    END WHILE;
END //
DELIMITER ;

-- 4. Ejecutar la carga (puede tardar unos segundos)
CALL CargarDatosPrueba();

-- 5. Eliminar el procedimiento tras su uso
DROP PROCEDURE CargarDatosPrueba;