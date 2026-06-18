CREATE OR REPLACE FUNCTION get_customer_status(p_id INT)  
RETURNS TEXT AS $$
DECLARE 
    v_conteo INT;
    v_resultado TEXT;
BEGIN 
    SELECT COUNT(*) INTO v_conteo 
    FROM rental 
    WHERE customer_id = p_id;

    v_resultado := 'El cliente con ID ' || p_id || ' ha realizado ' || v_conteo || ' alquileres.';
    
    RETURN v_resultado;
END;
$$ 
LANGUAGE plpgsql;
