import network
import utime
import machine
import urequests
import gc
import esp
import _thread

global continuar
global rpm
global prod
global prod_minuto
global paso
global conteo

conexion = network.WLAN(network.STA_IF)  # crea objeto de la conexion wifi
gc.enable()  # habilita el recolector de basura, limpia la memoria ram del esp32
# funcion avanzada para la deteccion de errores que no usaremos
esp.osdebug(None)
# WATCHODOG TIMER, si el sistema no lo alimenta en el tiempo estipulado reinicia la aplicacion
wdt = machine.WDT(timeout=90000)
# habilita el pin 2 como salida para el led indicador
led = machine.Pin(2, machine.Pin.OUT)

####################################### entradas#######################################
# entrada de señales por PULL-UP
boton_bt1 = machine.Pin(22, machine.Pin.IN, machine.Pin.PULL_UP)
# entrada de señales por PULL-UP
# boton_c1 = machine.Pin(21, machine.Pin.IN, machine.Pin.PULL_UP)


def conexion_wifi():  # FUNCION de conexion al wifi
    try:
        print("estableciendo conexion a la red qq")
        # activa la conexion al wifi
        conexion.active(True)
        lista = conexion.scan()                        # scanea las redes wifi disponibles
        for red in lista:
            # crea una lista con las redes disponibles
            print(red[0].decode())
        # se conecta a la red, se debe ingresar aqui usuario y clave de la red conocida
#        conexion.connect("TP-Link_A3C8", "")
#        conexion.connect("prueba","12345678")
        conexion.connect("gus","854317gamp")
        while not conexion.isconnected():
            # mientras no haya coneccion imprime un .
            print(".")
            utime.sleep(1)
        # devuelve los valores de la conexion (direccion ip, mascara, dns, etc)
        print(conexion.ifconfig())
        print(conexion.config("mac"))
    except:                                            # si la tarjeta detecta un error
        print("error en la conexion")
        utime.sleep(3)                                 # espera 3 seg
        conexion.disconnect()                          # se desconecta de la red
        # espera 6 seg para cerrar totalmente
        utime.sleep(6)
        print("... reconectando")
        continuar1 = False                               # rompe el bucle while principal


def blink():
    led.on()
    # FUNCION que hace titilar el led cuando el algoritmo envia datos
    utime.sleep(0.5)
    led.off()
    utime.sleep(1)


############################# Interrupcion en el pin 21 ######################################
def encoder_handler(pin):
    global paso
    global conteo
    paso += 1
    conteo += 1

############################ Multi_Hilo para contar las RPM ##################################


def hilo_conteo():
    global paso
   # global rpm
    global conteo
    global prod_minuto
    paso = 0
    conteo = 0
    prod_minuto = 0

    encoder = machine.Pin(21, machine.Pin.IN, machine.Pin.PULL_UP)
    encoder.irq(trigger=machine.Pin.IRQ_FALLING, handler=encoder_handler)

    timer_start = utime.ticks_ms()

    while True:

        # usando unicamente retardo
        #         utime.sleep_ms(1000)
        #         state= machine.disable_irq()
        #         rpm=(paso*60)/2
        #         paso=0
        #         print(rpm,'RPM')
        #         machine.enable_irq(state)

        timer_elapsed = utime.ticks_diff(utime.ticks_ms(), timer_start)
        if timer_elapsed >= 1000:
            # calculo las rpm
            state = machine.disable_irq()
            #rpm = (paso*60)/1024
            #conteo = paso
            #paso = 0
            
            
            
            machine.enable_irq(state)
            timer_start = utime.ticks_ms()
           # print(rpm,'RPM')
            print(conteo, 'pulsos')


_thread.start_new_thread(hilo_conteo, ())

############################## Multi_Hilo para contar la produccion ############################
# def hilo_conteo_produccion():
#     global paso
#     global conteo
#     global prod
#     global prod_minuto
#     paso = 0
#     conteo = 0
#     prod_minuto = 0
#
#     encoder= machine.Pin(23,machine.Pin.IN,machine.Pin.PULL_UP)
#     #encoder= machine.Pin(23,machine.Pin.IN,machine.Pin.PULL_DOWN)
#     #encoder.irq(trigger=machine.Pin.IRQ_FALLING, handler=encoder_handler)
#     encoder.irq(trigger=machine.Pin.IRQ_RISING, handler=encoder_handler)
#     timer_start= utime.ticks_ms()
#
#     while True:
#
#         #usando unicamente retardo
# #         utime.sleep_ms(1000)
# #         state= machine.disable_irq()
# #         rpm=(paso*60)/2
# #         paso=0
# #         print(rpm,'RPM')
# #         machine.enable_irq(state)
#
#         timer_elapsed = utime.ticks_diff(utime.ticks_ms(),timer_start)
#         if timer_elapsed >= 1000:  #  ===>>>  cuenta durante 5 minutos
#             #calculo las rpm
#             state= machine.disable_irq()
#
#             prod = paso
#             prod_minuto = (paso*60)
#
#             paso=0
#             machine.enable_irq(state)
#             timer_start= utime.ticks_ms()
#             #print(prod,'botellas')
#             #print(prod_minuto,'botellas/minuto')
#             #print(conteo,'conteo')
# _thread.start_new_thread(hilo_conteo_produccion,())
###########################################################################################################


###########################################################################################################


global continuar1                                     # se declaran las variables
global continuar2
continuar1 = True    # bandera del bucle de conexion al wifi
continuar2 = False   # bandera del bucle de trabajo
contador = 0         # contador de envios fallidos del metodo post
contador2 = 0        # contador de recepciones fallidas del metodo get
contador3 = 0        # contador de envios exitosos del metodo post


######### tarjeta 1 #######
# bt1=0
# c1=0

## en total 2 variables programadas #######################

while (continuar1):  # <<<< bucle while principal >>>>
    conexion_wifi()                                     # activa la conexion al wifi
    # si la conexion esta correcta activa la bandera del bucle de trabajo
    if (conexion.isconnected()):
        continuar2 = True
    while (continuar2):  # <<<< bucle while de trabajo >>>>

        ############################################ captura los datos en la tarjeta##########################################
        dato_tarjeta = 'tarjeta1'
        bt1 = int(boton_bt1.value())            # sensa el estado del pin 22
        #c1 = int(boton_c1.value())            # sensa el estado del pin 21

        print("Banda Transportadora 1= "+str(bt1))
        #print("Contador de Produccion 1= "+str(c1))

        #########################################################################################################################
        gc.collect()                                # limpia la basura de la memoria ram
        # imprime cuanta memoria hay disponible
        print(gc. mem_free())

        blink()                                     # hace destellar el led de la tarjeta

########################################################  METODO GET  #########################################
#         try:
#             print("realizando peticion GET")
#             peticion=urequests.get('https://ingenieriamcy.000webhostapp.com/prueba_recibe2.php')  # envia la solicitud a la pagina indicada
#             utime.sleep(10)
#             print(peticion.status_code)                                                          # codigo de respuesta de la pagina
#             print(peticion.text)                                                                 # sin esta linea el codigo da error
#         except:
#             print("====>no hay respuesta GET")
#             contador2=contador2+1
#             print(str(contador2) + " de intentos de solicitud fallida")
#             if ((contador2)>4):
#                 print("...reiniciando conexion")
#                 conexion.disconnect()
#                 utime.sleep(10)
#                 continuar2=False
#                 contador2=0
######################################################### METODO POST   +'$  ='+str( )   #####################################################################
#        try:
#            dato = ('&device_label=' + str(dato_tarjeta) +
#                    '&bt1=' + str(bt1) + '&c1=' + str(c1))
#
#            datos = dato
#            print("realizando peticion POST")
#            # cabezera de la pagina a enviar los datos del formulario                                                                                                                    # tiempo de muestreo
#            cabezera = {'Content-Type': 'application/x-www-form-urlencoded'}
#
#            # envio_datos= urequests.post('https://ingenieriamcy.000webhostapp.com/prueba_recibe2.php',data=datos,headers=cabezera)  # envio de datos metodo post
#            # envio_datos= urequests.post('https://iotgus.000webhostapp.com//prueba_recibe2.php',data=datos,headers=cabezera)  # envio de datos metodo post
#            envio_datos = urequests.post(
#                'https://talleratlas.com/monitoreo_lasamericas/prueba_recibe2.php', data=datos, headers=cabezera)
#
#            utime.sleep(10)
#            print(envio_datos.status_code)  # imprime codigo de respuesta
#            print(envio_datos.text)         # imprime la respuesta de la pagina
#            contador3 = contador3+1
#            print("================================>" +
#                  str(contador3)+" envios exitosos")
#        except:
#            print("====>no hay respuesta POST")
#            contador = contador+1
#            print(str(contador) + " de intentos de envios fallidos")
#            utime.sleep(10)
#            # si el numero de intentos de envios post fallidos supera lo establecido
#            if ((contador) > 4):
#                print("...reiniciando conexion")
#                conexion.disconnect()                          # se desconecta del wifi
#                utime.sleep(10)                                # espera 10 seg
#                continuar2 = False                               # rompe el bucle de trabajo
#                # vuelve a cero el contador de envios fallidos
#                contador = 0
###########################################################################################################################
        wdt.feed()
