#import libraries
import time
import RPi.GPIO as GPIO

#GPIO setup -- pin 29 as moisture sensor input
#Sensor: GPIO 29, Relay 1: GPIO 37, Relay 2: GPIO 38
GPIO.setmode(GPIO.BCM)
GPIO.setup(19,GPIO.IN)
GPIO.setup(16,GPIO.OUT)

try:
    while True:
        if (GPIO.input(19))==0:
            print('Wet')
            GPIO.output(16,True)
        elif (GPIO.input(19))==1:
            print('Dry')
            GPIO.output(16,False)
        time.sleep(.25)

finally:
    #cleanup the GPIO pins before ending
    GPIO.cleanup()

