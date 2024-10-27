from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from bs4 import BeautifulSoup
import mysql.connector

# Ruta a tu archivo de chromedriver
chrome_driver_path = r'C:\Users\raulg\Desktop\chromedriver-win64\chromedriver.exe'  
# Asegúrate de ajustar esta ruta correctamente

# Configurar el servicio para Selenium
service = Service(executable_path=chrome_driver_path)
driver = webdriver.Chrome(service=service)

from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from bs4 import BeautifulSoup
import mysql.connector

# Ruta a tu archivo de chromedriver
chrome_driver_path = r'C:\Users\raulg\Desktop\chromedriver-win64\chromedriver.exe'  # Ajusta esta ruta correctamente

# Configurar el servicio para Selenium
service = Service(executable_path=chrome_driver_path)
driver = webdriver.Chrome(service=service)

# Obtener los datos de Fórmula 1 usando Selenium
url = "https://www.formula1.com/en/drivers.html"
driver.get(url)

# Usar BeautifulSoup para analizar el contenido de la página cargada por JavaScript
soup = BeautifulSoup(driver.page_source, 'html.parser')

# Ajusta el selector CSS con la estructura que encontraste
pilotos = soup.select('p.f1-heading.tracking-normal.text-fs-18px.leading-tight.uppercase.font-bold.non-italic.f1-heading__body.font-formulaOne')

# Verificar que los pilotos se están extrayendo correctamente
for piloto in pilotos:
    nombre = piloto.get_text().strip()
    print(nombre)  # Verificar que los nombres de los pilotos se extraen correctamente

# Conectar a la base de datos
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="superporra_db"
)
cursor = conn.cursor()

# Insertar los pilotos en la base de datos
for piloto in pilotos:
    nombre = piloto.get_text().strip()
    puntos = 350
    cursor.execute("INSERT INTO pilotos_f1 (nombre, puntos) VALUES (%s, %s)", (nombre, puntos))

# Confirmar y cerrar la conexión
conn.commit()
cursor.close()
conn.close()
driver.quit()

print("Pilotos de Fórmula 1 agregados a la base de datos.")
