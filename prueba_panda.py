import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import seaborn as sns 
from datetime import date   # libreria para colocar la fecha de los datos
from matplotlib.ticker import StrMethodFormatter
import matplotlib.ticker as ticker



# Convierte la BD en un Dataframe
datos = pd.read_csv('C:/Users/gmujica/Desktop/bd.csv', encoding='latin-1' ,  engine='python', delimiter = ";" ) #convierte un archivo csv en un dataframe

print(list(datos.columns))  #imprime los nombres de las columnas
print("..........")

# define las columnas , quien es entero , float o string
datos['Cantidad'].dropna(inplace=True) # elimina los datos de la columna que esta en blanco
datos['Cantidad'] = pd.to_numeric(datos['Cantidad']) # convierte el string en formato de fechas
datos['Cantidad']=datos['Cantidad'].astype('float')   # convierte los datos string en float
datos['Clase de movimiento']=datos['Clase de movimiento'].astype('Int16')   # convierte los datos string en float
datos['Almacén']=datos['Almacén'].astype('Int16')   # convierte los datos string en entero
datos['Centro']=datos['Centro'].astype('Int16')   # convierte los datos string en entero

# Convierte el string en fechas manipulables
datos['Fe.contabilización'] = pd.to_datetime(datos['Fe.contabilización']) # convierte el string en formato de fechas
print('+++++++++++')

##### Filtra filas o columnas
df2f=datos[datos['Almacén'].isin([5000,5002,5003,5007,5008]) ]   # filtra la fila que coincida con varios criterios, ejemplo varios almacenes
df3f=df2f[df2f['Centro']==1000  ]   # filtra la fila que coincida con el criterio, ejemplo centro 10000 pastas sindoni
df4=df3f[df3f['Clase de movimiento']==101 ]  # filtra la fila por mov de entrada 101
print(df4)

### total en una columna
total_cantidad=df4['Cantidad'].sum()
print('total')
print(total_cantidad)
print('****************')

#### agrupa en una tabla columnas especificas


#df2 = df4.groupby(['Material','Texto breve de material','Fe.contabilización', 'Almacén','Centro'])['Cantidad'].sum()  # agrupa texto y fecha pero suma las cantidades

# permite visualizar el total por articulo mensual en la base de datos
df2 = df4.groupby(['Almacén','Centro','Material','Texto breve de material' ])['Cantidad'].sum()  # agrupa texto y fecha pero suma las cantidades

print(df2)
print('.......')

# Grafica los datos
plt.style.use('default')  # estilo del grafico
#df2.plot.line(y='Cantidad', x='Fe.contabilización')  # funcion de plotear linea

#plt.title('Produccion total por articulo')      #El título
plt.figure(figsize=(5,5))  ## configura tamaño del grafico
plt.tight_layout()
df2.plot.bar(y='Cantidad', x='Fe.contabilización') # funcion de plotear barras
#df2.set_xlabel('Texto breve de material', fontsize = 5)

plt.gca().yaxis.set_major_formatter(StrMethodFormatter('{x:.0f}'))  # permite mover el cursor sobre el grafico y ver el valor real
plt.show()


