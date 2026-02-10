#!/bin/bash

PIPE_NAME="mi_pipe_ipc"
LOG_FILE="productor.log"
PID=$$

# --- INICIO DE LOG ---
# (Usamos > para sobrescribir el log antiguo)
{
    echo "========================================="
    echo "INICIO SCRIPT PRODUCTOR"
    echo "Fecha/Hora Inicio: $(date)"
    echo "PID: $PID"
    echo "========================================="
} > $LOG_FILE

# Si el pipe no existe (-p), lo creamos
[ -p $PIPE_NAME ] || mkfifo $PIPE_NAME

# 'tee -a' muestra por pantalla Y añade (append) al log
echo "Productor (PID $PID) listo. Enviando a '$PIPE_NAME'..." | tee -a $LOG_FILE

for i in $(seq 1 5); do
    MENSAJE="Mensaje #$i (desde PID $PID)"
    echo "Enviando: $MENSAJE"
    
    # Escribimos en el pipe.
    # IMPORTANTE: Esta línea se BLOQUEARÁ si no hay
    # un consumidor leyendo al otro lado.
    echo "$MENSAJE" > $PIPE_NAME
    
    echo "LOG: Mensaje $i enviado." >> $LOG_FILE
    sleep 1
done

echo "Productor (PID $PID) terminó de enviar." | tee -a $LOG_FILE

# --- FIN DE LOG (ESTADO Y CONSUMO) ---
# (Usamos >> para añadir al log)
{
    echo "========================================="
    echo "FIN SCRIPT PRODUCTOR"
    echo "Fecha/Hora Fin: $(date)"
    echo "Estado de recursos (PID $PID):"
    # ps nos da una "foto" del consumo del proceso
    ps -p $PID -o pid,ppid,%cpu,%mem,etime,cmd
    echo "========================================="
} >> $LOG_FILE