import mysql.connector
import requests
from bs4 import BeautifulSoup

# Configuración de la base de datos
db_config = {
    'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'superporra_db'
}

def borrar_tablas(conn):
    cursor = conn.cursor()
    try:
        cursor.execute("DELETE FROM carreras_motogp")
        cursor.execute("DELETE FROM carreras_f1")
        conn.commit()
        print("Tablas de carreras borradas.")
    except mysql.connector.Error as err:
        print(f"Error al borrar las tablas: {err}")
    finally:
        cursor.close()

def cargar_carreras_motogp(año):
    url = "https://www.motogp.com/en/calendar"  # URL de MotoGP
    try:
        response = requests.get(url)
        response.raise_for_status()  # Lanza un error si la solicitud falla
    except requests.RequestException as e:
        print(f"Error al acceder a la URL de MotoGP: {e}")
        return []

    soup = BeautifulSoup(response.text, 'html.parser')
    carreras = []

    for month in soup.find_all('div', class_='calendar-listings__month'):
        for carrera in month.find_all('li', class_='calendar-listing__event-container'):
            nombre = carrera.find('div', class_='calendar-listing__title').text.strip()

            if "Official Test" in nombre:
                continue

            fecha_inicio = carrera.find('div', class_='calendar-listing__date-container')
            if fecha_inicio:
                dia_inicio = fecha_inicio.find('div', class_='calendar-listing__date-start-day').text.strip()
                mes_inicio = fecha_inicio.find('div', class_='calendar-listing__date-start-month').text.strip()
                
                meses = {"Jan": "01", "Feb": "02", "Mar": "03", "Apr": "04", "May": "05", "Jun": "06",
                         "Jul": "07", "Aug": "08", "Sep": "09", "Oct": "10", "Nov": "11", "Dec": "12"}
                mes_num = meses.get(mes_inicio, "")
                
                if mes_num:
                    fecha = f"{año}-{mes_num}-{dia_inicio}"
                    carreras.append((nombre, fecha))
            else:
                print("No se encontró la fecha para la carrera:", nombre)

    return carreras

def cargar_carreras_f1(año):
    url = f"https://www.formula1.com/en/racing/{año}.html"  # URL de F1
    try:
        response = requests.get(url)
        response.raise_for_status()  # Lanza un error si la solicitud falla
    except requests.RequestException as e:
        print(f"Error al acceder a la URL de F1: {e}")
        return []

    soup = BeautifulSoup(response.text, 'html.parser')
    carreras = []

    # Filtramos las carreras por su estructura
    for carrera in soup.find_all('div', class_='f1-inner-wrapper'):
        # Cambiar a las clases y estructuras que se obtienen del HTML
        titulo_elemento = carrera.find('p', class_='f1-heading')
        if titulo_elemento:
            nombre = titulo_elemento.text.strip()
            fecha_elemento = carrera.find('p', class_='f1-heading-wide')
            if fecha_elemento:
                fecha = fecha_elemento.text.strip()
                # Aquí verificamos que la fecha contenga el año correspondiente
                if año in fecha:  
                    carreras.append((nombre, fecha))
                else:
                    print("No se encontró la fecha para la carrera:", nombre)
            else:
                print("No se encontró la fecha para la carrera:", nombre)

    return carreras

def insertar_carreras(conn, carreras, tipo):
    cursor = conn.cursor()
    if tipo == 'motogp':
        query = "INSERT INTO carreras_motogp (nombre, fecha) VALUES (%s, %s)"
    else:
        query = "INSERT INTO carreras_f1 (nombre, fecha) VALUES (%s, %s)"

    try:
        cursor.executemany(query, carreras)
        conn.commit()
        print(f"{len(carreras)} carreras de {tipo} insertadas correctamente.")
    except mysql.connector.Error as err:
        print(f"Error al insertar carreras: {err}")
    finally:
        cursor.close()

def main():
    año = input("Introduce el año para cargar las carreras: ")

    conn = mysql.connector.connect(**db_config)

    borrar_tablas(conn)

    carreras_motogp = cargar_carreras_motogp(año)
    if carreras_motogp:
        insertar_carreras(conn, carreras_motogp, 'motogp')
    else:
        print("No se encontraron carreras de MotoGP.")

    carreras_f1 = cargar_carreras_f1(año)
    if carreras_f1:
        insertar_carreras(conn, carreras_f1, 'f1')
    else:
        print("No se encontraron carreras de F1.")

    conn.close()

if __name__ == "__main__":
    main()







