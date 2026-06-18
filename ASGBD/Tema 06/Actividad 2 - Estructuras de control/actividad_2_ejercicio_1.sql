CREATE OR REPLACE FUNCTION fn_nivel_cliente(p_customer_id INT)
RETURNS VARCHAR AS
$$
-- Crea una función llamada fn_nivel_cliente(p_customer_id INT) 
-- que devuelva un texto (VARCHAR) con la categoría del cliente:
DECLARE
    v_total NUMERIC(10,2);
    v_nivel VARCHAR(50);

-- 1. Calcula el total gastado por el cliente sumando la columna amount de la tabla payment. 
-- Lo guardamos en v_total. p_customer_id viene cuando llamamos a la función
BEGIN
    SELECT SUM(amount)
    INTO v_total
    FROM payment
    WHERE customer_id = p_customer_id;

-- 2. Usa una estructura IF para verificar si el cliente existe (si el total es NULL, lanzar un aviso).
    IF v_total IS NULL THEN
        RAISE NOTICE 'El cliente con ID % no existe.', p_customer_id;
        RETURN NULL;
    END IF;
-- Se ejecuta cuando la consulta SELECT SUM(amount) no encuentra ningún registro para ese ID
-- Detiene la ejecución de la función inmediatamente


-- 3. La estructura CASE
    CASE
        WHEN v_total > 150 THEN
            v_nivel := 'VIP Platinum';
        WHEN v_total BETWEEN 100 AND 150 THEN
            v_nivel := 'Gold';
        WHEN v_total BETWEEN 50 AND 99.99 THEN
            v_nivel := 'Silver';
        ELSE
            v_nivel := 'Bronze';
    END CASE;

    RETURN v_nivel;
-- Se ejecuta solo si el cliente superó la validación anterior (es decir, si tiene dinero gastado en la tienda).
-- Devuelve el contenido de la variable v_nivel, la cual fue llenada dentro del bloque CASE
-- Es el objetivo final de la función: entregarle al usuario la etiqueta (VARCHAR) que le corresponde al cliente según su gasto.
END;
$$
LANGUAGE plpgsql;
