#!/bin/bash
set -e

# Imprimir configuración para debug
echo "--- CONFIGURACIÓN ---"
echo "Target Host: $DB_HOST"
echo "Target DB:   $DB_NAME"
echo "Threads:     $THREADS"
echo "---------------------"

echo "⏳ Esperando conexión con MySQL..."
# Loop de espera hasta que MySQL responda al ping
until mariadb-admin ping -h "$DB_HOST" -u "$DB_USER" -p"$DB_PASS"  --ssl-verify-server-cert=OFF --silent; do
    echo "Fallo al conectar con $DB_HOST... reintentando en 2s"
    sleep 2
done

echo "✅ Conexión exitosa."

# 1. Limpieza (Cleanup) - El '|| true' evita que el script falle si es la primera vez
echo "🧹 [1/3] Limpiando tablas anteriores..."
sysbench oltp_read_write \
  --db-driver=mysql \
  --mysql-host=$DB_HOST \
  --mysql-db=$DB_NAME \
  --mysql-user=$DB_USER \
  --mysql-password=$DB_PASS \
  --tables=$TABLES \
  cleanup || true

# 2. Preparar (Prepare)
echo "📦 [2/3] Generando datos de prueba..."
sysbench oltp_read_write \
  --db-driver=mysql \
  --mysql-host=$DB_HOST \
  --mysql-db=$DB_NAME \
  --mysql-user=$DB_USER \
  --mysql-password=$DB_PASS \
  --tables=$TABLES \
  --table-size=$TABLE_SIZE \
  prepare

# 3. Ejecutar (Run)
echo "🔥 [3/3] EJECUTANDO CARGA MASIVA..."
sysbench oltp_read_write \
  --db-driver=mysql \
  --mysql-host=$DB_HOST \
  --mysql-db=$DB_NAME \
  --mysql-user=$DB_USER \
  --mysql-password=$DB_PASS \
  --tables=$TABLES \
  --table-size=$TABLE_SIZE \
  --threads=$THREADS \
  --time=$TIME \
  --report-interval=5 \
  run

echo "🏁 Prueba finalizada."