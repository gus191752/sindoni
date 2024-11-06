import network
import utime
import machine
import urequests
import gc
import esp
import _thread
from machine import Timer
global continuar
global actual
global anterior
global cont
global c1
global cont
global bandera

conexion = network.WLAN(network.STA_IF)  # crea objeto de la conexion wifi
gc.enable()  # habilita el recolector de basura, limpia la memoria ram del esp32
# funcion avanzada para la deteccion de errores que no usaremos
esp.osdebug(None)
# WATCHODOG TIMER, si el sistema no lo alimenta en el tiempo estipulado reinicia la aplicacion
wdt = machine.WDT(timeout=90000)
# habilita el pin 2 como salida para el led indicador
led = machine.Pin(2, machine.Pin.OUT)
####################################### Definicion de entradas #######################################
# entrada de señales por PULL-UP
boton_bt1 = machine.Pin(22, machine.Pin.IN, machine.Pin.PULL_UP)  #señal on-off
# entrada de señales por PULL-UP
boton_c1 = machine.Pin(21, machine.Pin.IN, machine.Pin.PULL_UP)  # señal del contador

############################## FUNCION de conexion al wifi #########################################
def conexion_wifi():  
    try:
        print("estableciendo conexion a la red ")       
        conexion.active(True)                          # activa la conexion al wifi
        lista = conexion.scan()                        # scanea las redes wifi disponibles
#        for red in lista:                                                       
#            print(red[0].decode())                    #  crea una lista con las redes disponibles"
#        conexion.connect("TP-Link_A3C8", "")
#        conexion.connect("prueba","12345678")
        conexion.connect("gus","854317gamp")           #  se conecta a la red, se debe ingresar aqui usuario y clave de la red conocida"
        while not conexion.isconnected():                                                       
#            print(".")                                # "mientras no haya coneccion imprime un ."
            utime.sleep(1)                                                      
#        print(conexion.ifconfig())                    #   devuelve los valores de la conexion (direccion ip, mascara, dns, etc)"
#        print(conexion.config("mac"))
    except:                                            # si la tarjeta detecta un error
#        print("error en la conexion")
        utime.sleep(3)                                 # espera 3 seg
        conexion.disconnect()                          # se desconecta de la red
        utime.sleep(6)                                 # " espera 6 seg para cerrar totalmente"
        print("... reconectando")
        continuar1 = False                               # rompe el bucle while principal
################# FUNCION que hace titilar el led cuando el algoritmo envia datos ###############
def blink():         
    led.on()
    utime.sleep(0.5)
    led.off()
    utime.sleep(1)   
    ############################### temporizador ###########################
def temporizador():
    global cont
    global bandera
    #print("dentro de la funcion temporizador coloca bandera=1")
    bandera=1 
############################### POST de datos ###########################
def post_datos():
    global cont
    global bandera
           ################### METODO POST   +'$  ='+str( )   ###############
    #print("dentro funcion post_datos")
    #print("dato enviado")
    
    #print("contador a 0")
    #print("bandera a 0")
    bandera=0
#        try:
#            dato = ('&device_label=' + str(dato_tarjeta) +
#                    '&bt1=' + str(bt1) + '&c1=' + str(cont))
#
#            datos = dato
#            #print("realizando peticion POST")
#            # cabezera de la pagina a enviar los datos del formulario                                                                                                                    # tiempo de muestreo
#            cabezera = {'Content-Type': 'application/x-www-form-urlencoded'}
#            envio_datos = urequests.post(
#                'https://talleratlas.com/monitoreo_lasamericas/prueba_recibe2.php', data=datos, headers=cabezera)
#
#            #utime.sleep(10)
#            #print(envio_datos.status_code)  # imprime codigo de respuesta
#            #print(envio_datos.text)         # imprime la respuesta de la pagina
#            contador3 = contador3+1
#            #print("================================>" +
#                  str(contador3)+" envios exitosos")
    cont=0
    blink()                                     # hace destellar el led de la tarjeta
#        except:
#            #print("====>no hay respuesta POST")
#            contador = contador+1
#            #print(str(contador) + " de intentos de envios fallidos")
#            utime.sleep(10)
#            # si el numero de intentos de envios post fallidos supera lo establecido
#            if ((contador) > 4):
#                #print("...reiniciando conexion")
#                conexion.disconnect()                          # se desconecta del wifi
#                utime.sleep(10)                                # espera 10 seg
#                continuar2 = False                               # rompe el bucle de trabajo
#                # vuelve a cero el contador de envios fallidos
#                contador = 0
###################################  conteo multihilo########################
def hilo_conteo():                          #  <<<< bucle while de trabajo >>>>
    global actual
    global anterior
    global cont
    global c1   
    actual=0
    anterior=0
    cont=0
    while (True):
        c1=int(boton_c1.value())          # sensa el estado del pin 21           
        utime.sleep(0.09)
        if (c1==0 and anterior==0):
            actual=1
        if (c1==1 and anterior==1):
            anterior=0
        if (actual==1 and anterior==0):
            cont = cont + 1                 # conteo incremental
            print("c1: " + str(cont))
            anterior=1
            actual=0
            
_thread.start_new_thread(hilo_conteo,())
########################  configuracion del temporizador #################################
tim1 = Timer(1)
tim1.init(mode=Timer.PERIODIC,period=50000,callback=lambda t:temporizador())
###########################################################################################
global continuar1                                     # se declaran las variables
global continuar2
continuar1 = True    # bandera del bucle de conexion al wifi
continuar2 = False   # bandera del bucle de trabajo
contador = 0         # contador de envios fallidos del metodo post
contador2 = 0        # contador de recepciones fallidas del metodo get
contador3 = 0        # contador de envios exitosos del metodo post
bandera=0
######### estado tarjeta 1 #######
# bt1=0
# c1=0
############### en total 2 variables programadas #######################

while (continuar1):  # <<<< bucle while principal >>>>
    conexion_wifi()                    # activa la conexion al wifi
    if (conexion.isconnected()):       # si la conexion esta correcta activa la bandera del bucle de trabajo
        continuar2 = True
    while (continuar2):  # <<<< bucle while de trabajo >>>>
        ################################### captura los datos en la tarjeta###############
        dato_tarjeta = 'tarjeta1'
        bt1 = int(boton_bt1.value())            # sensa el estado del pin 22
        ##################################################################################
        gc.collect()                                # limpia la basura de la memoria ram              
        if (bandera==1):  # el temporizador activa la bandera 
            #print("en el bucle if")
            post_datos()  # envia los datos a la base de datos mysql
            print("ciclo exitoso")       
         ######################################### WATCHODOG TIMER########################
        wdt.feed()                                
