-- 1. Función
CREATE OR REPLACE FUNCTION fn_validar_pago_positivo()
RETURNS TRIGGER AS $$
BEGIN
    IF NEW.amount < 0 THEN
        RAISE EXCEPTION 'Error: No se permiten pagos con importes negativos (%).', NEW.amount;
    END IF;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- 2. Trigger
CREATE TRIGGER tr_check_pago_positivo
BEFORE INSERT OR UPDATE ON payment
FOR EACH ROW
EXECUTE FUNCTION fn_validar_pago_positivo();

