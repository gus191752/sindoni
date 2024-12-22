import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import seaborn as sns 
from datetime import date   # libreria para colocar la fecha de los datos


data= {
   "nombre" : [ "gustavo", "yoselin", "aurora" ],
   "edad": ["41","44","5"]
    
}

#df=pd.DataFrame(data)  #convierte un arreglo en un dataframe

#print(df)

#datos = pd.read_csv('C:/Users/gmujica/Desktop/bd.csv', encoding='latin-1', sep='\r \t \n ',  engine='python') #convierte un archivo csv en un dataframe
datos = pd.read_csv('C:/Users/gmujica/Desktop/bd.csv', encoding='latin-1' ,  engine='python', delimiter = ";" ) #convierte un archivo csv en un dataframe


print(datos)  # imprime todo el archivo csv

print("..........")

datos.info()  # muestra la informacion de la base de datos

print("..........")

x=[2,3,4]
y=[4,7,15]
#print(datos['6'])

ser=datos.iloc[5,0] # convierte filas en series que es lo mismo que un vector
print((ser))

print("..........")

print(list(datos.columns))  #imprime los nombres de las columnas

print("..........")

serie_colum= datos['Fe.contabilización'] # convierte una columna en una serie
print(serie_colum)

print("..........")

buscar_datos_en_columna=datos['Texto breve de material'].str.contains('AZUCAR') # busca la fila donde encuentre coincidencia
print(buscar_datos_en_columna)


#datos.Cantidad=datos.to_numeric(datos.Cantidad)
#datos.Lote=datos.to_numeric(datos.Lote)

plt.style.use('default')  # estilo del grafico
datos['Cantidad']=datos['Cantidad'].replace(',','',regex=True) # corrige los datos que no pueden convertirse en float
datos['Cantidad']=datos['Cantidad'].astype(float)   # convierte los datos string en float
datos['Fe.contabilización']=datos['Fe.contabilización'].astype({'date':'datetime64[ns]'}) # convierte el string en formato de fechas
datos['Cantidad'].dropna(inplace=True) # elimina los datos de la columna que esta en blanco
datos['Clase de movimiento']=datos['Clase de movimiento'].astype(float)  # convierte los datos string en float
datos.plot.line(x='Cantidad', y='Fe.contabilización')  # funcion de plotear 
plt.title('Primer grafico')
plt.show()

#dataf=pd.DataFrame(datos)
#dataf.plot(x,y)
#plt.plot(dataf(x,y))
#plt.show
#dataf.decribe()
#print(dataf)


