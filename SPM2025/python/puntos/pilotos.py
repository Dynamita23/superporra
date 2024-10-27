from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from bs4 import BeautifulSoup
import mysql.connector
import time

# Ruta a tu archivo de chromedriver
chrome_driver_path = r'C:\chromedriver\chromedriver.exe'  # Ajusta esta ruta correctamente

# Configurar el servicio para Selenium
service = Service(executable_path=chrome_driver_path)
driver = webdriver.Chrome(service=service)

# Conectar a la base de datos
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="superporra_db"
)
cursor = conn.cursor()

# 1. Borrar las tablas de la base de datos
cursor.execute("DELETE FROM pilotos_motogp")  # Limpiar la tabla de MotoGP
cursor.execute("DELETE FROM pilotos_f1")      # Limpiar la tabla de Fórmula 1
conn.commit()
print("Base de datos limpiada para MotoGP y Fórmula 1.")

# 2. Hacer scraping de los pilotos desde las webs de MotoGP y Fórmula 1

# MotoGP scraping
url_motogp = "https://www.motogp.com/en/riders"
driver.get(url_motogp)

# Esperar a que los elementos de los pilotos de MotoGP se carguen (máximo 10 segundos)
time.sleep(5)  # Añadir un retraso para que la página cargue completamente

# Intentar obtener solo los pilotos de MotoGP
try:
    WebDriverWait(driver, 10).until(EC.presence_of_all_elements_located((By.CSS_SELECTOR, 'div.rider-list__info-container')))

    soup_motogp = BeautifulSoup(driver.page_source, 'html.parser')
    
    # Filtrar pilotos de MotoGP usando el selector 'div.rider-list__info-container'
    contenedores_pilotos = soup_motogp.select('div.rider-list__info-container')

    # Capturar solo los primeros 22 pilotos (que pertenecen a MotoGP)
    pilotos_motogp_info = []
    for i, contenedor in enumerate(contenedores_pilotos[:22]):  # Capturamos solo los primeros 22
        # Capturar nombre y apellido
        nombre = contenedor.select_one('div.rider-list__info-name span').get_text().strip()
        apellido = contenedor.select('div.rider-list__info-name span')[1].get_text().strip()

        # Capturar equipo
        equipo = contenedor.select_one('span.rider-list__details-team').get_text().strip()

        pilotos_motogp_info.append((f"{nombre} {apellido}", equipo))

except Exception as e:
    print(f"Error al cargar los pilotos de MotoGP: {e}")
    pilotos_motogp_info = []

# Fórmula 1 scraping (debería mantenerse igual, pero revisaremos)
url_f1 = "https://www.formula1.com/en/drivers.html"
driver.get(url_f1)

# Esperar un tiempo para asegurarnos de que toda la página se ha cargado completamente
time.sleep(5)  # Añadir un retraso para que la página cargue completamente

# Ajustar el selector para encontrar los nombres y equipos de los pilotos de F1
try:
    WebDriverWait(driver, 10).until(EC.presence_of_all_elements_located((By.CSS_SELECTOR, 'p.f1-heading.tracking-normal.text-fs-18px.leading-tight.uppercase.font-bold.non-italic.f1-heading__body.font-formulaOne')))
    soup_f1 = BeautifulSoup(driver.page_source, 'html.parser')
    
    # Seleccionar los nombres y equipos de los pilotos de F1
    pilotos_f1 = soup_f1.select('p.f1-heading.tracking-normal.text-fs-18px.leading-tight.uppercase.font-bold.non-italic.f1-heading__body.font-formulaOne')
    equipos_f1 = soup_f1.select('p.f1-heading.tracking-normal.text-fs-12px.leading-tight.normal-case.font-normal.non-italic.f1-heading__body.font-formulaOne.text-greyDark')

    # Crear una lista de pilotos con nombres completos y equipos
    pilotos_f1_info = []
    for i in range(len(pilotos_f1)):
        nombre_f1 = pilotos_f1[i].get_text().strip()  # Nombre completo del piloto
        equipo_f1 = equipos_f1[i].get_text().strip()  # Equipo del piloto
        pilotos_f1_info.append((nombre_f1, equipo_f1))
except:
    print("Error al cargar los pilotos de Fórmula 1.")
    pilotos_f1_info = []

# 3. Pedir puntos personalizados para cada piloto y grabar los datos

# MotoGP - Pedir puntos y subir a la base de datos (nombre completo + equipo)
if pilotos_motogp_info:
    print("\nAsignar puntos a los pilotos de MotoGP:")
    for nombre_completo, equipo in pilotos_motogp_info:
        # Pedir los puntos al usuario
        while True:
            try:
                puntos = int(input(f"¿Cuántos puntos quieres asignar a {nombre_completo} ({equipo}) (MotoGP)? "))
                break
            except ValueError:
                print("Por favor, introduce un número válido para los puntos.")

        # Insertar los datos en la base de datos
        cursor.execute("INSERT INTO pilotos_motogp (nombre, equipo, puntos) VALUES (%s, %s, %s)", (nombre_completo, equipo, puntos))
        print(f"{nombre_completo} ({equipo}) con {puntos} puntos insertado en la base de datos (MotoGP).")
else:
    print("No se encontraron pilotos de MotoGP.")

# Fórmula 1 - Pedir puntos y subir a la base de datos (nombre completo + equipo)
if pilotos_f1_info:
    print("\nAsignar puntos a los pilotos de Fórmula 1:")
    for nombre_completo, equipo in pilotos_f1_info:
        # Pedir los puntos al usuario
        while True:
            try:
                puntos = int(input(f"¿Cuántos puntos quieres asignar a {nombre_completo} ({equipo}) (Fórmula 1)? "))
                break
            except ValueError:
                print("Por favor, introduce un número válido para los puntos.")

        # Insertar los datos en la base de datos
        cursor.execute("INSERT INTO pilotos_f1 (nombre, equipo, puntos) VALUES (%s, %s, %s)", (nombre_completo, equipo, puntos))
        print(f"{nombre_completo} ({equipo}) con {puntos} puntos insertado en la base de datos (Fórmula 1).")
else:
    print("No se encontraron pilotos de Fórmula 1.")

# Confirmar y cerrar la conexión
conn.commit()
cursor.close()
conn.close()
driver.quit()

print("Proceso completado para MotoGP y Fórmula 1.")





