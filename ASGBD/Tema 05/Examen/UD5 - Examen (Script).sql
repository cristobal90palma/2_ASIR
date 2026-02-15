CREATE DATABASE global_express_db;
USE global_express_db;

-- 1. Creación de la tabla ineficiente
CREATE TABLE pedidos_brutos (
    id_operacion VARCHAR(255),          -- Debería ser INT PK
    fecha_operacion VARCHAR(255),      -- Debería ser DATETIME
    cliente_nombre VARCHAR(255),       -- Redundante
    cliente_email VARCHAR(255),        -- Redundante
    producto_nombre VARCHAR(255),      -- Redundante
    categoria_nombre VARCHAR(255),     -- Redundante
    precio_unitario VARCHAR(255),      -- Debería ser DECIMAL
    cantidad_pedida VARCHAR(255),      -- Debería ser INT
    comentario_producto TEXT,          -- Para búsquedas de texto
    codigo_pais VARCHAR(255)           -- Debería ser CHAR(2)
);

-- 2. Procedimiento para generar 50.000 registros
DELIMITER //
CREATE PROCEDURE CargarDatosExamen()
BEGIN
    DECLARE i INT DEFAULT 1;
    WHILE i <= 50000 DO
        INSERT INTO pedidos_brutos VALUES (
            i,
            DATE_FORMAT(DATE_ADD('2023-01-01', INTERVAL FLOOR(RAND() * 365) DAY), '%d/%m/%Y %H:%i:%s'),
            CONCAT('Cliente ', FLOOR(RAND() * 5000)), -- Muchos pedidos por cliente
            CONCAT('user', FLOOR(RAND() * 5000), '@express.com'),
            CONCAT('Producto ', FLOOR(RAND() * 1000)),
            CASE FLOOR(RAND() * 4) 
                WHEN 0 THEN 'Tecnología' 
                WHEN 1 THEN 'Hogar' 
                WHEN 2 THEN 'Deportes' 
                ELSE 'Libros' 
            END,
            ROUND(10 + RAND() * 500, 2),
            FLOOR(1 + RAND() * 5),
            CONCAT('Opinión del producto: ', IF(RAND()>0.5, 'Excelente calidad y muy rápido', 'No me gustó mucho el acabado')),
            CASE FLOOR(RAND() * 3) 
                WHEN 0 THEN 'ES' 
                WHEN 1 THEN 'FR' 
                ELSE 'PT' 
            END
        );
        SET i = i + 1;
    END WHILE;
END //
DELIMITER ;

-- 3. Ejecutar la carga y limpiar
CALL CargarDatosExamen();
DROP PROCEDURE CargarDatosExamen;