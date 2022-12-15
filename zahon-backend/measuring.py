import RPi.GPIO as GPIO
import dht11
import time
import requests
import logging

logging.basicConfig(filename='measuring.log', filemode='w', format='%(name)s - %(levelname)s - %(message)s')

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.cleanup()

instance = dht11.DHT11(pin = 21)

while True:
    result = instance.read()
    if result.is_valid():
        temperature = ("%-3.1f" % result.temperature)
        humidity = ("%-3.1f" % result.humidity)
        x = requests.get('http://sklenik.drie.cz/irapi/measuring.php?humidity='+humidity+'&temperature='+temperature+'')
        logging.info(humidity + " "+ temperature)
    else:
        logging.warning("Error: %d" % result.error_code)
    
    time.sleep(10)
