import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import seaborn as sns 


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

serie_colum= datos['Texto breve de material'] # convierte una columna en una serie
print(serie_colum)

print("..........")

plt.plot(x,y)
plt.xlabel('primera grafica')
#plt.show()

#dataf=pd.DataFrame(datos)
#dataf.plot(x,y)
#plt.plot(dataf(x,y))
#plt.show
#dataf.decribe()
#print(dataf)
