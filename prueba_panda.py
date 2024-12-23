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

# datos.info()  # muestra la informacion de la base de datos
# print("..........")

# x=[2,3,4]
# y=[4,7,15]
# #print(datos['6'])

# ser=datos.iloc[5,0] # convierte filas en series que es lo mismo que un vector
# print((ser))

# print("..........")

print(list(datos.columns))  #imprime los nombres de las columnas

print("..........")

# serie_colum= datos['Fe.contabilización'] # convierte una columna en una serie
# print(serie_colum)

# print("..........")

# #datos['Texto breve de material'].describe() # no funciona

# buscar_datos_en_columna=datos['Texto breve de material'].str.contains('AZUCAR') # busca la fila donde encuentre coincidencia
# print(buscar_datos_en_columna)

# #datos.Cantidad=datos.to_numeric(datos.Cantidad)
# #datos.Lote=datos.to_numeric(datos.Lote)

datos['Cantidad'].dropna(inplace=True) # elimina los datos de la columna que esta en blanco

datos['Cantidad']=datos['Cantidad'].replace(',','',regex=True) # corrige los datos que no pueden convertirse en float

datos['Cantidad'].drop(columns= 'Cantidad', errors='raise') # elimina los datos de la columna que esta en blanco

datos['Cantidad']=datos['Cantidad'].astype(float)   # convierte los datos string en float

datos['Fe.contabilización'] = pd.to_datetime(datos['Fe.contabilización']) # convierte el string en formato de fechas

#datos['Cantidad'].info()

##### agrupar y sumar

print(datos.groupby('Almacén')['Cantidad'].sum())        # muestra valores agrupando 2 variables
print(datos.groupby(datos["Fe.contabilización"].dt.day))

# fechaFinal = datos.date.today() + datos.timedelta(days = -120)
# fechaInicio = fechaFinal + datos.timedelta(days = -30)
# df1 = datos[['Almacén','Cantidad']]
# print(df1.loc[(df1['Cantidad'].dt.date >= fechaInicio) & (df1['Cantidad'].dt.date < fechaFinal)])



plt.style.use('default')  # estilo del grafico
datos.plot.line(y='Cantidad', x='Fe.contabilización')  # funcion de plotear 
plt.title('Primer grafico') #titulo
#plt.show()

#dataf=pd.DataFrame(datos)
#dataf.plot(x,y)
#plt.plot(dataf(x,y))
#plt.show
#dataf.decribe()
#print(dataf)


