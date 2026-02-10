from flask import Flask, jsonify
import mysql.connector
from flask_cors import CORS # Necesario para que el frontend pueda acceder

app = Flask(__name__)
# Permitir peticiones desde cualquier origen (necesario para el frontend local)
CORS(app) 

# --- Configuración de la Base de Datos (¡Ajustar a tu Vagrantfile!) ---
DB_CONFIG = {
    'user': 'appuser',      # O el usuario que uses en tu VM de DB
    'password': 'app123',  # O la contraseña
    'host': '192.168.56.10',   # ¡IP de la máquina 'db01' en Vagrant!
    'database': 'asir_db',
    'port': 3306
}

@app.route('/api/alumnos', methods=['GET'])
def get_alumnos():
    """Consulta la tabla alumnos y devuelve los resultados en JSON."""
    
    conn = None
    cursor = None
    alumnos_data = []

    try:
        # 1. Conexión a la base de datos
        conn = mysql.connector.connect(**DB_CONFIG)
        cursor = conn.cursor(dictionary=True) # dictionary=True devuelve filas como diccionarios
        
        # 2. Ejecutar la consulta
        query = "SELECT id, nombre, poblacion FROM alumnos ORDER BY id"
        cursor.execute(query)
        
        # 3. Obtener los resultados
        alumnos_data = cursor.fetchall()

    except mysql.connector.Error as err:
        print(f"Error de MySQL: {err}")
        # Devolver un error 500 si falla la conexión/consulta
        return jsonify({"error": "Error al conectar o consultar la base de datos"}), 500
        
    finally:
        # 4. Cerrar conexiones
        if cursor:
            cursor.close()
        if conn and conn.is_connected():
            conn.close()

    # 5. Devolver los datos en formato JSON
    return jsonify(alumnos_data)

if __name__ == '__main__':
    # Ejecutar la API en todas las interfaces (0.0.0.0) y en el puerto 5000
    # Esto es importante para que sea accesible desde otras VMs (ej. 'web01') o desde el host.
    app.run(host='0.0.0.0', port=5000, debug=True)