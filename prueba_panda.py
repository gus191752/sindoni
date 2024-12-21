import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import seaborn as sns 


data= {
   "nombre" : [ "gustavo", "yoselin", "aurora" ],
   "edad": ["41","44","5"]
    
}

#df=pd.DataFrame(data)

#print(df)

datos = pd.read_csv('C:/Users/gmujica/Desktop/bd.csv', encoding='latin-1', sep='\t')

print(datos)
#datos.info()
#datos.describe()
#datos.head(5)
x=[2,3,4]
y=[4,7,15]

plt.plot(x,y)
plt.xlabel('primera grafica')
plt.show()


