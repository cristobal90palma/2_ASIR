DO $$ 
DECLARE 
    -- Variables con TYPE
    v_titulo film.title%TYPE;
    v_precio film.rental_rate%TYPE;
    -- Variable para cálculo complejo
    v_total_recaudado DECIMAL(10,2);
BEGIN 
    -- Primer cálculo: película con ID 50
    SELECT title, rental_rate INTO v_titulo, v_precio 
    FROM film 
    WHERE film_id = 50;

    RAISE NOTICE 'La película % tiene un coste de %€', v_titulo, v_precio;

    -- Tarea 2: Cálculo para el cliente ID 10
    SELECT SUM(amount) INTO v_total_recaudado 
    FROM payment 
    WHERE customer_id = 10;

    RAISE NOTICE 'Total recaudado por el cliente 10: %€', v_total_recaudado;
END $$;
