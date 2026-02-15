-- Conectar a base de datos "dvdrental"

\c dvdrental;


-- Tarea 1: Clasificación Dinámica de Clientes (IF y CASE)


CREATE OR REPLACE FUNCTION fn_nivel_cliente(p_customer_id INT)
RETURNS VARCHAR AS
$$
DECLARE
    v_total NUMERIC(10,2);
    v_nivel VARCHAR(50);
BEGIN
    SELECT SUM(amount)
    INTO v_total
    FROM payment
    WHERE customer_id = p_customer_id;

    IF v_total IS NULL THEN
        RAISE NOTICE 'El cliente con ID % no existe.', p_customer_id;
        RETURN NULL;
    END IF;

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
END;
$$
LANGUAGE plpgsql;



-- Tarea 2: Informe de Disponibilidad por Categoría (FOR)


CREATE OR REPLACE PROCEDURE pr_resumen_inventario()
AS
$$
DECLARE
    v_categoria RECORD;
    v_total_copias INT;
BEGIN
    FOR v_categoria IN SELECT category_id, name FROM category
    LOOP
        SELECT COUNT(i.inventory_id)
        INTO v_total_copias
        FROM inventory i
        JOIN film f ON i.film_id = f.film_id
        JOIN film_category fc ON f.film_id = fc.film_id
        WHERE fc.category_id = v_categoria.category_id;

        RAISE NOTICE 'Categoría: %, Total Copias: %',
                     v_categoria.name, v_total_copias;
    END LOOP;
END;
$$
LANGUAGE plpgsql;



-- Tarea 3: Simulador de Recargos por Demora (WHILE)


CREATE OR REPLACE FUNCTION fn_calculo_recargo_progresivo(p_dias_retraso INT)
RETURNS NUMERIC(20,2)
AS
$$
DECLARE
    v_total_recargo NUMERIC(20,2) := 1.0;
    v_dia INT := 1;
BEGIN
    WHILE v_dia <= p_dias_retraso LOOP
        v_total_recargo := v_total_recargo * 1.10;
        v_dia := v_dia + 1;
    END LOOP;

    RETURN ROUND(v_total_recargo, 2);
END;
$$
LANGUAGE plpgsql;



-- Tarea 4: Generador de Cupones de Descuento (LOOP + EXIT)


CREATE OR REPLACE PROCEDURE pr_generar_cupones_campaña()
AS
$$
DECLARE
    v_acumulado NUMERIC(10,2) := 0;
    v_cliente RECORD;
BEGIN
    LOOP
        SELECT customer_id
        INTO v_cliente
        FROM customer
        ORDER BY random()
        LIMIT 1;

        v_acumulado := v_acumulado + 15;

        RAISE NOTICE 'Cupón asignado a cliente ID: %. Total acumulado: %',
                     v_cliente.customer_id, v_acumulado;

        EXIT WHEN v_acumulado > 500;
    END LOOP;
END;
$$
LANGUAGE plpgsql;



-- EJECUCIÓN DE PRUEBAS


SELECT first_name, fn_nivel_cliente(customer_id)
FROM customer
LIMIT 5;

CALL pr_resumen_inventario();

SELECT fn_calculo_recargo_progresivo(10);

CALL pr_generar_cupones_campaña();
