#!/usr/bin/python
import time
import grovepi



# Connect the Grove Gas Sensor to analog port A0
# SIG,NC,VCC,GND
gas_sensor = 0

grovepi.pinMode(gas_sensor,"INPUT")


# Get sensor value
sensor_value = grovepi.analogRead(gas_sensor)

# Calculate gas density - large value means more dense gas
density = (float)(sensor_value / 1024)

# Output data to screen
print "<<<rbpi_smoke>>>"
print "rbpiSmoke %.2f" %sensor_value
print "rbpiDensity %.2f" %density
exit(0)
