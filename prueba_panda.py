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

# print(datos)  # imprime todo el archivo csv
# print("..........")

#print(list(datos.columns))  #imprime los nombres de las columnas

print("..........")


# define las columnas

datos['Cantidad'].dropna(inplace=True) # elimina los datos de la columna que esta en blanco

datos['Cantidad']=datos['Cantidad'].replace(',','',regex=True) # corrige los datos que no pueden convertirse en float

datos['Cantidad'].drop(columns= 'Cantidad', errors='raise') # elimina los datos de la columna que esta en blanco

datos['Cantidad']=datos['Cantidad'].astype(float)   # convierte los datos string en float

datos['Almacén']=datos['Almacén'].astype('Int16')   # convierte los datos string en entero
datos['Centro']=datos['Centro'].astype('Int16')   # convierte los datos string en entero


datos['Fe.contabilización'] = pd.to_datetime(datos['Fe.contabilización']) # convierte el string en formato de fechas


##### agrupar y sumar

print('+++++++++++')

df2f=datos[datos['Almacén'] == 5002  ]   # filtra la fila que coincida con el valor
print(df2f)

print('****************')

df2 = df2f.groupby(['Texto breve de material','Fe.contabilización', 'Almacén','Centro'])['Cantidad'].sum()  # agrupa texto y fecha pero suma las cantidades
print(df2)

print('.......')


plt.style.use('default')  # estilo del grafico
df2.plot.line(y='Cantidad', x='Fe.contabilización')  # funcion de plotear 
plt.title('Primer grafico') #titulo
plt.show()

#dataf=pd.DataFrame(datos)
#dataf.plot(x,y)
#plt.plot(dataf(x,y))
#plt.show
#dataf.decribe()
#print(dataf)


