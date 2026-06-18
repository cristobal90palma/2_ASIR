CREATE OR REPLACE FUNCTION fn_calculo_recargo_progresivo(p_dias_retraso INT)
-- Le dice a PostgreSQL qué tipo de dato va a recibir el usuario cuando la función termine.
-- Es el número total de dígitos que puede tener el número
RETURNS NUMERIC(20,2)
AS
$$
DECLARE
-- La multa empieza en 1.00€.
    v_total_recargo NUMERIC(20,2) := 1.0;
-- El día en 1.
    v_dia INT := 1;
BEGIN
-- El bucle se repetirá tantas veces como días de retraso 
-- haya indicado el usuario en p_dias_retraso
    WHILE v_dia <= p_dias_retraso

-- Cada vuelta del bucle multiplica el acumulado por 1.10. 
-- Esto equivale a añadir un 10% adicional.
-- v_dia := v_dia + 1: Incrementa el contador para que 
-- el bucle no sea infinito y avance al siguiente día.
    LOOP
        v_total_recargo := v_total_recargo * 1.10;
        v_dia := v_dia + 1;
    END LOOP;

-- Como estamos multiplicando por 1.10 constantemente, 
-- el número de decimales puede volverse muy largo.
    RETURN ROUND(v_total_recargo, 2);
END;
$$
LANGUAGE plpgsql;
