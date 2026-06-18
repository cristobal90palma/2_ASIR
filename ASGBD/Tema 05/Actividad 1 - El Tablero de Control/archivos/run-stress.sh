#!/bin/bash
set -e

# Imprimir configuración para debug
echo "--- CONFIGURACIÓN ---"
echo "Target Host: $DB_HOST"
echo "Target DB:   $DB_NAME"
echo "Threads:     16"
echo "---------------------"

# Eliminamos --mysql-ssl=disabled para evitar el error de opción inválida
DB_PARAMS="--db-driver=mysql \
  --mysql-host=$DB_HOST \
  --mysql-db=$DB_NAME \
  --mysql-user=$DB_USER \
  --mysql-password=$DB_PASS"

echo "⏳ Esperando conexión con MySQL..."
# Para mariadb-admin usamos --skip-ssl para asegurar compatibilidad
until mariadb-admin ping -h "$DB_HOST" -u "$DB_USER" -p"$DB_PASS" --skip-ssl --silent; do
    echo "Fallo al conectar con $DB_HOST... reintentando en 2s"
    sleep 2
done

echo "✅ Conexión exitosa."

# 1. Limpieza (Cleanup)
echo "🧹 [1/3] Limpiando tablas anteriores..."
sysbench oltp_read_write $DB_PARAMS --tables=$TABLES cleanup || true

# 2. Preparar (Prepare)
echo "📦 [2/3] Generando datos de prueba..."
sysbench oltp_read_write $DB_PARAMS \
  --tables=$TABLES \
  --table-size=$TABLE_SIZE \
  prepare

# 3. Ejecutar (Run)
echo "🔥 [3/3] EJECUTANDO CARGA MASIVA..."
sysbench oltp_read_write $DB_PARAMS \
  --tables=$TABLES \
  --table-size=$TABLE_SIZE \
  --threads=$THREADS \
  --time=$TIME \
  --report-interval=5 \
  run

echo "🏁 Prueba finalizada."
##LOL