#!/bin/bash

PIPE_NAME="mi_pipe_ipc"
LOG_FILE="consumidor.log"
PID=$$

# --- INICIO DE LOG ---
# (Usamos > para sobrescribir el log antiguo)
{
    echo "========================================="
    echo "INICIO SCRIPT CONSUMIDOR"
    echo "Fecha/Hora Inicio: $(date)"
    echo "PID: $PID"
    echo "========================================="
} > $LOG_FILE

# Nos aseguramos de que el pipe exista
[ -p $PIPE_NAME ] || mkfifo $PIPE_NAME

# 'tee -a' muestra por pantalla Y añade (append) al log
echo "Consumidor (PID $PID) esperando mensajes en '$PIPE_NAME'..." | tee -a $LOG_FILE
echo "LOG: Iniciando bucle de lectura." >> $LOG_FILE

# Leemos del pipe línea a línea.
# El bucle 'while read' terminará automáticamente
# cuando el 'productor' cierre el pipe al terminar.
while read -r linea; do
    echo "RECIBIDO: $linea"
    echo "LOG: Recibido '$linea'" >> $LOG_FILE
done < $PIPE_NAME

echo "Consumidor (PID $PID) finalizado (el pipe se cerró)." | tee -a $LOG_FILE

# --- FIN DE LOG (ESTADO Y CONSUMO) ---
# (Usamos >> para añadir al log)
{
    echo "========================================="
    echo "FIN SCRIPT CONSUMIDOR"
    echo "Fecha/Hora Fin: $(date)"
    echo "Estado de recursos (PID $PID):"
    ps -p $PID -o pid,ppid,%cpu,%mem,etime,cmd
    echo "========================================="
} >> $LOG_FILE