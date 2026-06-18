-- 1. Función de validación
CREATE OR REPLACE FUNCTION fn_revisar_multas_cliente()
RETURNS TRIGGER AS $$ 
-- Función diseñada para ser disparada con Trigger

DECLARE
    v_retrasos INT;

BEGIN

-- Mete el dato del cliente y mira si devoluciones por hacer y además que el alquiler se haya hecho hace más de 7 días (los alquileres de películas suelen ser de menos tiempo). 

    SELECT COUNT(*) INTO v_retrasos
    FROM rental
    WHERE customer_id = NEW.customer_id
      AND return_date IS NULL
      AND rental_date < CURRENT_DATE - INTERVAL '7 days';

    IF v_retrasos > 0 THEN
        RAISE EXCEPTION 'El cliente con ID % tiene alquileres pendientes fuera de plazo. No puede alquilar.', NEW.customer_id;
    END IF;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- Que se active antes del nuevo registro.
CREATE TRIGGER tr_check_multas_antes_alquiler
BEFORE INSERT ON rental
FOR EACH ROW
EXECUTE FUNCTION fn_revisar_multas_cliente();
