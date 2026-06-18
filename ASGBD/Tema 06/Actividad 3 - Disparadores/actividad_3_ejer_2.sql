-- 1. Creamos una tabla para el log donde guardamos datos básicos
-- de la película y los precios (antiguo y nuevo)
CREATE TABLE IF NOT EXISTS log_precios_peliculas (
    log_id SERIAL PRIMARY KEY,
    film_id INT,
    titulo VARCHAR(255),
    precio_anterior NUMERIC(4,2),
    precio_nuevo NUMERIC(4,2),
    fecha_cambio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Función
-- La función se activa si el precio antiguo es diferente al nuevo.
-- Si es diferente insertará los datos en la tabla de log.
CREATE OR REPLACE FUNCTION fn_log_cambio_precio()
RETURNS TRIGGER AS $$
BEGIN
    IF OLD.rental_rate <> NEW.rental_rate THEN
        INSERT INTO log_precios_peliculas (film_id, titulo, precio_anterior, precio_nuevo)
        VALUES (OLD.film_id, OLD.title, OLD.rental_rate, NEW.rental_rate);
    END IF;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- 3. Trigger
-- De igual manera que en el anterior, 
-- pero esta vez es AFTER UPDATE, para que guarde el cambio
-- Creamos trigger y que active al función anterior.
-- También está hecho para que funcione con actualizaciones masivas.
CREATE TRIGGER tr_audit_precio_pelicula
AFTER UPDATE OF rental_rate ON film
FOR EACH ROW
EXECUTE FUNCTION fn_log_cambio_precio();

