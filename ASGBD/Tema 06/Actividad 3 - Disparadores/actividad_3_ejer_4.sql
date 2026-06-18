-- 1. Tabla de Log de direcciones
CREATE TABLE IF NOT EXISTS customer_log_cambios (
    log_id SERIAL PRIMARY KEY,
    customer_id INT,
    old_address_id INT,
    new_address_id INT,
    fecha_cambio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Función
CREATE OR REPLACE FUNCTION fn_log_cambio_direccion()
RETURNS TRIGGER AS $$
BEGIN
    -- Solo insertamos si el address_id realmente ha cambiado
    IF OLD.address_id <> NEW.address_id THEN
        INSERT INTO customer_log_cambios (customer_id, old_address_id, new_address_id)
        VALUES (OLD.customer_id, OLD.address_id, NEW.address_id);
    END IF;
    RETURN NEW;
-- https://www.reddit.com/r/PostgreSQL/comments/ifp2rn/why_do_trigger_functions_return_new/
-- Si la función llega al RETURN NEW, significa que pasó todos los filtros e IF previos.
-- Es decir "Todo está correcto, procede a guardar estos datos".
END;
$$ LANGUAGE plpgsql;

-- 3. Trigger
CREATE TRIGGER tr_log_direccion_cliente
AFTER UPDATE OF address_id ON customer
FOR EACH ROW
EXECUTE FUNCTION fn_log_cambio_direccion();
