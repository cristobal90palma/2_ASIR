CREATE OR REPLACE PROCEDURE apply_late_fee(p_rental_id INT, p_amount NUMERIC(5,2))
AS 
$$
BEGIN 
    -- Actualizamos el pago asociado a ese alquiler
    UPDATE payment 
    SET amount = amount + p_amount 
    WHERE rental_id = p_rental_id;

    RAISE NOTICE 'Recargo de %€ aplicado al alquiler ID %', p_amount, p_rental_id;
END;
$$
LANGUAGE plpgsql;
