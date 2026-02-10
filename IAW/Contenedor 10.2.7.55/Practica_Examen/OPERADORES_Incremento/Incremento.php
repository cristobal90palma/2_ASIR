<?php

$a = 5;
#echo ++$a."\n";
/*El operador de pre-incremento (++$a) primero incrementa el valor de la variable en 1 y 
luego devuelve el nuevo valor.
varlo de "a" antes (5), valor de "a" despues (6)
El valor de a se convierte inmediatamente en 6, y ese es el valor que se utiliza en la expresión echo.
*/
#echo $a++."\n";
/* El operador de post-incremento ($a++) primero devuelve el valor actual de la variable y luego, 
como paso posterior, incrementa el valor de la variable en 1.
varlo de "a" antes (5), valor de "a" despues (6)
Después de que la expresión ha sido evaluada (es decir, después del echo), el valor de a se incrementa a 6.
*/
echo $a."\n";

/*
Pre-incremento (++$a): Incrementa antes de usar. Devuelve El valor nuevo (incrementado)
Post-incremento ($a++): Incrementa después de usar. Devuelve El valor original (sin incrementar)

*/
?>