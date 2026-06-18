CREATE OR REPLACE PROCEDURE pr_generar_cupones_campaña()
AS
$$
DECLARE
    v_acumulado NUMERIC(10,2) := 0;

-- Una variable tipo registro que usaremos para guardar 
-- los datos del cliente que "gane" el cupón en cada vuelta del bucle.
    v_cliente RECORD;

BEGIN

-- el LOOP simple se ejecuta indefinidamente hasta que encuentra una instrucción de salida.
    LOOP
        -- Elegimos cliente aleatorio
        SELECT customer_id INTO v_cliente
        FROM customer
        ORDER BY random() LIMIT 1;

-- "LIMIT 1" --> Toma solo al primer cliente de esa lista desordenada.

        v_acumulado := v_acumulado + 15;

-- Sumamos 15€ al gasto total de la campaña.

        RAISE NOTICE 'Cupón asignado a cliente ID: %. Total acumulado: %', v_cliente.customer_id, v_acumulado;

        EXIT WHEN v_acumulado > 500;
    END LOOP;
END;
$$
LANGUAGE plpgsql;
