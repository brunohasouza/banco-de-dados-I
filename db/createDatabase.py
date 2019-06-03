import mysql.connector
import json
from executeScriptsFromFile import*

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd=""
)

mycursor = mydb.cursor()
executeScriptsFromFile('./biblio.sql', mycursor)
mydb.commit()