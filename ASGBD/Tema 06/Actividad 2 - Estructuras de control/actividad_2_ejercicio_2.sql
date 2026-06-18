CREATE OR REPLACE PROCEDURE pr_resumen_inventario()
AS
$$
DECLARE
    v_categoria RECORD;
-- RECORD: Tipo dinámico que puede almacenar una fila completa. Almacena (category_id y name).
-- Esta es una variable de tipo registro. 
-- guardará una fila de la tabla category cada vez que el bucle dé una vuelta.
    v_total_copias INT;
-- Un número entero simple para almacenar el conteo de películas.
BEGIN
    FOR v_categoria IN SELECT category_id, name FROM category
-- FOR recorriendo todas las categorías
-- Por cada categoría encontrada (Action, Animation, Comedy, etc.), mete sus datos en v_categoria.
-- Ejecuta todo lo que hay dentro del LOOP para esa categoría específica.

-- Contamos copias por categoría
    LOOP
        SELECT COUNT(i.inventory_id)
        INTO v_total_copias
        FROM inventory i
        JOIN film f ON i.film_id = f.film_id
        JOIN film_category fc ON f.film_id = fc.film_id
        WHERE fc.category_id = v_categoria.category_id;

-- v_categoria.category_id (la categoría actual del bucle) para contar solo las copias que pertenecen a ese género.

        RAISE NOTICE 'Categoría: %, Total Copias: %', v_categoria.name, v_total_copias;
-- Esta línea imprime el resultado en la consola
    END LOOP;
END;
$$
LANGUAGE plpgsql;
