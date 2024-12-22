from tkinter import * 
import sqlite3
#import serial


def abrir():
        ventanaAbrir=Tk()
        ventanaAbrir.geometry("600x600")
        ventanaAbrir.title("Edicion")
        ventanaAbrir.mainloop()


def calcular():
    try:
        valor1=dato1.get()
        valor2=dato2.get()
    
        suma=str(valor1+valor2)
        sumar.set(suma)
        
        resta=str(valor1-valor2)
        restar.set(resta)
        
        multi=str(valor1*valor2)
        multiplicar.set(multi)
        
        divi=str(valor1/valor2) 
        dividir.set(divi)
        
        resultado=valor1*valor1
        res.set(resultado)
        #Showinfo(text='calculo terminado')
    except:
        print("papa se tera peos cuando duerme")
        
def crear():
    conexion=sqlite3.connect('prueba.db')
    consulta=conexion.cursor()
    sql="""CREATE TABLE IF NOT EXISTS test(
    num INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    cedula INTEGER NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    direccion VARCHARr(50) NOT NULL,
    fecha VARCHAR(20) NOT NULL)"""
    if (consulta.execute(sql)):
        print("tabla creada con exito")
    else:
        print("ha ocurrido un error al crear la tabla")
    consulta.close()
    conexion.commit()
    conexion.close()
       
def insertar():
    num=num1.get()
    cedula=cedula1.get()
    nombre=nombre1.get()
    direccion=direccion1.get()
    fecha=fecha1.get()
    conexion=sqlite3.connect('prueba.db')
    consulta=conexion.cursor()
    argumentos=(num,cedula,nombre,direccion,fecha)
    sql="""INSERT INTO test(num,cedula,nombre,direccion,fecha)
    VALUES(?,?,?,?,?)
    """
    if (consulta.execute(sql,argumentos)):
        print("registro guardado con exito")
        messagebox.showinfo("registro guardado con exito")
    else:
        print("ha ocurrido un error al guardar el registro")
    consulta.close()
    conexion.commit()
    conexion.close()
    
    num1.set('')
    cedula1.set('')
    nombre1.set('')
    direccion1.set('')
    fecha1.set('')
    #num1.focus()

def seleccionar():
    conexion=sqlite3.connect('prueba.db')
    consulta=conexion.cursor()
    
    sql="""SELECT * FROM test
    """
    if (consulta.execute(sql)):
        filas=consulta.fetchall()
        listado=[]
        for fila in filas:
            print (fila[0],fila[1],fila[2],fila[3],fila[4])
            listado.append(fila)
    consulta.close()
    conexion.commit()
    conexion.close()
    return listado

def mostrar():
    listado=[]
    listado=seleccionar()
    #print(listado)
    te.delete(0.1,END)
    te.insert(0.1,"num\tcedula\tnombre\tdireccion\tfecha\n")
    #te.place(x=50,y=400,width=320,height=300)
        
    
    for elemento in listado:
         num=elemento[0]
         cedula=elemento[1]
         nombre=elemento[2]
         direccion=elemento[3]
         fecha=elemento[4]
         
         te.insert(INSERT, num)
         te.insert(INSERT,"\t")
         te.insert(INSERT, cedula)
         te.insert(INSERT,"\t")
         te.insert(INSERT, nombre)
         te.insert(INSERT,"\t")
         te.insert(INSERT, direccion)
         te.insert(INSERT,"\t")
         te.insert(INSERT, fecha)
         te.insert(INSERT,"\n")
        # te.place(x=50,y=400,width=320,height=300)     

        #lb.insert(INSERT,cedula)
                 
    for vector in listado:
         print(vector)
         
    for i,par in enumerate(listado):
        print(i,par)
        
    for columna in listado:
        print(columna[1],columna[2])
        
    #for item in listado.curseletion():
        #print(item)
        
    #llist=(','.join(listado))
   # print(llist)
        
    print(f'longitud de la lista ' + str(len(listado)))
    
    
def modificar():
    conexion=sqlite3.connect('prueba.db')
    consulta=conexion.cursor()
    indice=indice1.get()
    sql="SELECT * FROM test WHERE cedula=%s" %indice
    
    if (consulta.execute(sql)):
        fila=consulta.fetchone()
        #print("seleccionado el regitro numero  "{indice}" de la tabla cedula")
        print(fila[0],fila[1],fila[2],fila[3],fila[4])
    
    num1.set(fila[0])
    cedula1.set(fila[1])
    nombre1.set(fila[2])
    direccion1.set(fila[3])
    fecha1.set(fila[4]) 
    
    consulta.close()
    conexion.commit()
    conexion.close()

def limpiar():
    num1.set('')
    cedula1.set('')
    nombre1.set('')
    direccion1.set('')
    fecha1.set('')
    
def borrar():
    conexion=sqlite3.connect('prueba.db')
    consulta=conexion.cursor()
    indice=indice1.get()
    sql="DELETE FROM test WHERE cedula=%s" %indice
    
    if (consulta.execute(sql)):
        #fila=consulta.fetchone()
        print("REGISTRO BORRADO")
        messagebox.showerror("registro borrado","F en el Chat")   
        
    consulta.close()
    conexion.commit()
    conexion.close()
    
    
def update():
    conexion=sqlite3.connect('prueba.db')
    consulta=conexion.cursor()
    indice=indice1.get()
    nombre=nombre1.get()
    direccion=direccion1.get()
    fecha=fecha1.get()
    argu=(nombre,direccion,fecha)
    
    
    sql="UPDATE test SET nombre=?, direccion=?, fecha=? WHERE cedula=%s" %indice
    
    if (consulta.execute(sql,argu)):
        #fila=consulta.fetchone()
        print("REGISTRO ACTUALIZADO")
        messagebox.showinfo('registro modificado con exito')
              
    consulta.close()
    conexion.commit()
    conexion.close()
    
def login():
    conexion=sqlite3.connect('prueba.db')
    consulta=conexion.cursor()
    cedula=cedula1.get()
    nombre=nombre1.get()
    arg=(cedula,nombre)
    sql="SELECT * FROM test WHERE cedula=? AND nombre=?"
    (consulta.execute(sql,arg))
    if (consulta.fetchall()):
        messagebox.showinfo("bienvenido")
        
        ventanalogin=Tk()
        ventanalogin.geometry("600x600")
        ventanalogin.title("Edicion")
        ventanalogin.mainloop()
        
        consulta.close()
        conexion.commit()
        conexion.close()
        
    else:
        messagebox.showerror("contraseña incorrecta")
        
        consulta.close()
        conexion.commit()
        conexion.close()   
    
def tarea():
    for i in range(0,302):
        resultado=7*i
        if (resultado<1501):
            print(f'7 x ' + str(i))
            print(f'resultado: '+str(resultado))
        else:
            break
        

     
ventana=Tk()
ventana.geometry("700x900")
ventana.title("programa de menu")

dato1=IntVar()
dato2=IntVar()
sumar=StringVar()
restar=StringVar()
multiplicar=StringVar()
dividir=StringVar()
res=IntVar()
indice1=IntVar()



num1=IntVar()
cedula1=IntVar()
nombre1=StringVar()
direccion1=StringVar()
fecha1=StringVar()




Label(ventana,text="primer ejercicio").place(x=10,y=20)
boton1=Button(ventana,activebackground='red',text="calcular",command=calcular).place(x=10,y=150)
caja1=Entry(ventana,width=8,textvariable=dato1).place(x=50,y=80)
caja2=Entry(ventana,width=8,textvariable=dato2).place(x=150,y=80)
caja3=Entry(ventana,width=8,textvariable=res).place(x=100,y=180)
Label(ventana,width=6,foreground='red',bg='green',textvariable=sumar).place(x=50,y=120)
Label(ventana,cursor='man',width=6,textvariable=restar).place(x=100,y=120)
Label(ventana,width=6,textvariable=multiplicar).place(x=150,y=120)
Label(ventana,width=6,textvariable=dividir).place(x=200,y=120)
#dato1.focus()

te= Text(ventana)
te.place(x=50,y=400,width=320,height=300)

lb=Listbox(ventana).place(x=450,y=400,width=120,height=100)

sb=Scrollbar(ventana).place(x=450,y=550)

caja4=Entry(ventana,width=8,textvariable=num1).place(x=20,y=250)
caja5=Entry(ventana,width=8,textvariable=cedula1).place(x=70,y=250)
caja6=Entry(ventana,width=8,textvariable=nombre1).place(x=120,y=250)
caja7=Entry(ventana,width=8,textvariable=direccion1).place(x=170,y=250)
caja8=Entry(ventana,width=8,textvariable=fecha1).place(x=220,y=250)
caja9=Entry(ventana,width=8,textvariable=indice1).place(x=220,y=350)
#caja10=Entry(ventana,width=8,textvariable=nombre1).place(x=300,y=450)
#caja11=Entry(ventana,width=8,textvariable=cedula1).place(x=220,y=450)



Label(ventana,width=6,text='id').place(x=20,y=220)
Label(ventana,width=6,text='cedula').place(x=70,y=220)
Label(ventana,width=6,text='nombre').place(x=120,y=220)
Label(ventana,width=6,text='direccion').place(x=170,y=220)
Label(ventana,width=6,text='fecha').place(x=220,y=220)
Label(ventana,width=6,text='login').place(x=400,y=350)

boton2=Button(ventana,activebackground='red',text="crear tabla",command=crear).place(x=20,y=280)
boton3=Button(ventana,activebackground='red',text="insertar",command=insertar).place(x=100,y=280)
boton4=Button(ventana,activebackground='red',text="seleccionar",command=seleccionar).place(x=180,y=280)
boton5=Button(ventana,activebackground='red',text="seleccionar uno",command=modificar).place(x=260,y=280)
boton1=Button(ventana,activebackground='red',text="limpiar",command=limpiar).place(x=400,y=280)
boton6=Button(ventana,activebackground='red',text="borrar",command=borrar).place(x=450,y=280)
boton7=Button(ventana,activebackground='red',text="actualizar",command=update).place(x=100,y=350)
boton8=Button(ventana,activebackground='red',text="login",command=login).place(x=400,y=400)
boton9=Button(ventana,activebackground='red',text="mostrar",command=mostrar).place(x=400,y=300)

boton9=Button(ventana,activebackground='red',text="tarea",command=tarea).place(x=400,y=50)



#paso 1 crear barra de menu
barraMenu=Menu(ventana)
#paso 2 crear los menu
menuArchivo=Menu(barraMenu)
menuEdicion=Menu(barraMenu)
#paso 3 crear los comandos de los menus
menuArchivo.add_command(label="Nuevo")
menuArchivo.add_command(label="Abrir",command=abrir)
menuArchivo.add_command(label="Guardar")
menuArchivo.add_command(label="Guardar como")
menuArchivo.add_command(label="Salir",command=ventana.destroy)
#########################################
menuEdicion.add_command(label="Deshacer")
menuEdicion.add_command(label="hacer")
menuEdicion.add_command(label="Copiar")
menuEdicion.add_command(label="Pegar")
menuEdicion.add_command(label="Seleccionar todo")
#paso 4 agregar los menus a la barra de menu
barraMenu.add_cascade(label="Archivo",menu=menuArchivo)
barraMenu.add_cascade(label="Edicion",menu=menuEdicion)
#paso 5 indicar que la barra de menu estara en la ventana
ventana.configure(menu=barraMenu)

ventana.mainloop()




