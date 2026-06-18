DO $$ 
DECLARE 
    -- Bloque original
    v_academia CONSTANT TEXT := 'IES Delgado Hernández';
    v_alumno TEXT := 'Cristobal';
BEGIN 
    RAISE NOTICE '--- Bloque original ---';
    RAISE NOTICE 'Academia: %, Alumno: %', v_academia, v_alumno;

    DECLARE 
        -- El subbloque
        v_alumno TEXT := 'Andrés';
        v_academia CONSTANT TEXT := 'IES La Palma';
    BEGIN 
        RAISE NOTICE '--- Subbloque ---';
        RAISE NOTICE 'Academia (Subbloque): %', v_academia;
        RAISE NOTICE 'Alumno (Subbloque): %', v_alumno;
    END;

    RAISE NOTICE '--- Otra vez el bloque original ---';
    RAISE NOTICE 'Academia: %, Alumno: %', v_academia, v_alumno;
END $$;
