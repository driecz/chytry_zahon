#import libraries
import time
import RPi.GPIO as GPIO

#GPIO setup -- pin 29 as moisture sensor input
#Sensor: GPIO 29, Relay 1: GPIO 37, Relay 2: GPIO 38
GPIO.setmode(GPIO.BCM)
GPIO.setup(26,GPIO.IN)
GPIO.setup(20,GPIO.OUT)

try:
    while True:
        if (GPIO.input(26))==0:
            print('Wet')
            GPIO.output(20,True)
        elif (GPIO.input(26))==1:
            print('Dry')
            GPIO.output(20,False)
        time.sleep(.25)

finally:
    #cleanup the GPIO pins before ending
    GPIO.cleanup()

