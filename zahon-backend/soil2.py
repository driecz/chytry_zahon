#import libraries
import time
import RPi.GPIO as GPIO

#GPIO setup -- pin 29 as moisture sensor input
GPIO.setmode(GPIO.BCM)
GPIO.setup(26,GPIO.IN)

try:
    while True:
        if (GPIO.input(26))==0:
            print('Wet')
        elif (GPIO.input(26))==1:
            print('Dry')
        time.sleep(.25)

finally:
    #cleanup the GPIO pins before ending
    GPIO.cleanup()

