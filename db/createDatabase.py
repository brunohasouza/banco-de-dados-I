import mysql.connector
import json
from executeScriptsFromFile import*

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd=""
)

try:
    mycursor = mydb.cursor()
    executeScriptsFromFile('./biblio.sql', mycursor)
    mydb.commit()
    print json.dumps({ 'codigo': 1 })
except:
    print json.dumps({ 'codigo': 0 })