from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from bs4 import BeautifulSoup
import mysql.connector

# Ruta a tu archivo de chromedriver
chrome_driver_path = r'C:\Users\raulg\Desktop\chromedriver-win64\chromedriver.exe'  # Ajusta esta ruta según tu sistema

# Configurar el servicio para Selenium
service = Service(executable_path=chrome_driver_path)
driver = webdriver.Chrome(service=service)

# Obtener los datos de MotoGP usando Selenium
url = "https://www.motogp.com/en/riders"
driver.get(url)

# Usar BeautifulSoup para analizar el contenido de la página cargada por JavaScript
soup = BeautifulSoup(driver.page_source, 'html.parser')

# Buscar los pilotos en la página (ajustar según la estructura del HTML)
pilotos = soup.find_all('div', class_='rider-list__info-name')

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
    puntos = 300  # Puedes ajustar los puntos como desees
    cursor.execute("INSERT INTO pilotos_motogp (nombre, puntos) VALUES (%s, %s)", (nombre, puntos))

# Confirmar y cerrar la conexión
conn.commit()
cursor.close()
conn.close()
driver.quit()

print("Pilotos de MotoGP agregados a la base de datos.")
