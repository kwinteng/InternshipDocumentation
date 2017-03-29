#!/usr/bin/python
# Distributed with a free-will license.

import time
import grovepi
import sqlite3
import sys

cTemp = 22
humidity = 30
smoke_value = 100
density = 0
dbconn = False
#format db strings
tempstatement = "SELECT sensor_value FROM RBPiSensors WHERE sensor_ID = 1;"
humstatement = "SELECT sensor_value FROM RBPiSensors WHERE sensor_ID = 2;"
smokestatement = "SELECT sensor_value FROM RBPiSensors WHERE sensor_ID = 3;"
densstatement = "SELECT sensor_value FROM RBPiSensors WHERE sensor_ID = 4;"

try:
    # connect to db
    conn = sqlite3.connect('/home/pi/Desktop/Database/sensor_db')
    # create cursor object to interact with db
    c = conn.cursor()

    # Write data to sqlite3 db

    c.execute(tempstatement)
    cTemp = c.fetchone()[0]
    c.execute(humstatement)
    humidity = c.fetchone()[0]
    c.execute(smokestatement)
    smoke_value = c.fetchone()[0]
    c.execute(densstatement)
    density = c.fetchone()[0]

    # close DB
    c.close()
    conn.close()
    dbconn = True
except sqlite3.Error as e:
    sys.exit(1)
finally:
     # Output data to screen
     print "<<<rbpi_temp>>>"
     print "rbpiTemperature %s" %cTemp
     print "<<<rbpi_humidity>>>"
     print "rbpiHumidity %s" %humidity
     print "<<<rbpi_smoke>>>"
     print "rbpiSmoke %s" %smoke_value
     print "rbpiDensity %s" %density
     print "<<<rbpi_db>>>"
     print "rbpiDb %s" %dbconn
     exit(0)

