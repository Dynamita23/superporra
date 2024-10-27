import mysql.connector
import requests
from bs4 import BeautifulSoup

# Configuración de la base de datos
db_config = {
    'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'superporra_db',
}

def borrar_tablas(conn):
    cursor = conn.cursor()
    cursor.execute("SET FOREIGN_KEY_CHECKS = 0;")
    cursor.execute("TRUNCATE TABLE carreras_moto_gp;")
    cursor.execute("TRUNCATE TABLE carreras_f1;")
    cursor.execute("SET FOREIGN_KEY_CHECKS = 1;")
    conn.commit()
    print("Tablas de carreras borradas.")

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
                
                meses = {
                    "Jan": "01", "Feb": "02", "Mar": "03", "Apr": "04", "May": "05",
                    "Jun": "06", "Jul": "07", "Aug": "08", "Sep": "09", "Oct": "10",
                    "Nov": "11", "Dec": "12"
                }
                mes_num = meses.get(mes_inicio, "")
                
                if mes_num:
                    fecha = f"{año}-{mes_num}-{dia_inicio}"
                    carreras.append((nombre, fecha))
            else:
                print("No se encontró la fecha para la carrera:", nombre)

    return carreras

def cargar_carreras_f1(año):
    url = f"https://www.formula1.com/en/racing/{año}.html"
    response = requests.get(url)
    soup = BeautifulSoup(response.text, 'html.parser')

    carreras = []
    eventos = soup.find_all('fieldset')
    
    for evento in eventos:
        titulo_elem = evento.find('p', class_='f1-heading tracking-normal text-fs-18px')
        if titulo_elem is not None:
            titulo = titulo_elem.text.strip()
        else:
            print("No se encontró el título para un evento.")
            continue  # Salta al siguiente evento si no se encuentra el título

        fecha_str = evento.find('span', class_='whitespace-nowrap').text.strip()
        mes_str = evento.find('p', class_='f1-heading-wide font-formulaOneWide tracking-normal font-normal non-italic text-fs-12px').text.strip()

        # Conversión de mes
        mes_dict = {
            "Ene": "01", "Feb": "02", "Mar": "03", "Abr": "04", "May": "05",
            "Jun": "06", "Jul": "07", "Ago": "08", "Sep": "09", "Oct": "10",
            "Nov": "11", "Dic": "12"
        }
        mes_num = mes_dict.get(mes_str, mes_str)

        dia = fecha_str.split('-')[0]  # Obtener el primer día del rango
        fecha = f"{año}-{mes_num}-{dia}"

        # Comprobar si la fecha es válida antes de agregar
        if fecha == "0000-00-00":
            fecha = input(f"No se encontró una fecha válida para la carrera '{titulo}'. Introduzca una fecha (YYYY-MM-DD): ")

        circuitos = titulo.split('Grand Prix')[-1].strip()  # Extraer el nombre del circuito

        carreras.append((titulo, fecha, circuitos))

    if carreras:
        print(f"{len(carreras)} carreras de F1 insertadas correctamente.")
        return carreras
    else:
        print("No se encontraron carreras de F1.")
        return []

def insertar_carreras(conn, carreras, tipo):
    cursor = conn.cursor()
    if tipo == 'motogp':
        query = "INSERT INTO carreras_moto_gp (nombre, fecha) VALUES (%s, %s)"
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





