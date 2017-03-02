# InternshipDocumentation
A documentation regarding the internship

## Prerequisites
* A Linux installation with curl
* Account on home.nest.com
* A nest product or the nest home simulator as a google chrome extention
* A product on developers.nest.com that has the permissions needed to function

## Obtaining the access token
The nest products work with OAuth 2.0 and require you to get an access token to communicate with the online API.
### Step 1: Obtain the PIN code
In the following link replace CLIENTID with your client ID and navigate to https://home.nest.com/login/oauth2?client_id=CLIENTID&state=STATE
### Step 2: Obtain the access token
In the code below change the "PINCODE" "CLIENTID" and "CLIENTSECRET" with your details (on your product those are called "product id" and "product secret" on https://developers.nest.com/ after creating your product.
~~~~
curl -X POST -d 'code=PINCODE&client_id=CLIENTID&client_secret=CLIENTSECRET&grant_type=authorization_code' "https://api.home.nest.com/oauth2/access_token" 	
~~~~
The response of that command is a JSON output that we can use in a .json file

If you change the permissions of the product, you will have to repeat the steps to get your access token.

## Structure
```
Check_mk
    |-- agents
        |-- special
            |-- agent_nest
    |-- checkman
        |-- nest_co
        |-- nest_humidity
        |-- nest_smoke
        |-- nest_smoke_co_alarm
        |-- nest_structure
        |-- nest_temp
        |-- nest_thermostat
    |-- checks
        |-- nest_co
        |-- nest_humidity
        |-- nest_smoke
        |-- nest_smoke_co_alarm
        |-- nest_structure
        |-- nest_temp
        |-- nest_thermostat
    |-- pnp-templates
        |-- check_mk-nest.php
        |-- check_mk-nest_humidity.php
        |-- check_mk-nest_smoke.php
        |-- check_mk-nest_smoke_co_alarm.php
        |-- check_mk-nest_temp.php
        |-- check_mk-nest_thermostat.php
    |-- web
        |-- plugins
            |-- perfometer
                |-- nest_thermostat.py
            |-- wato
                |-- check_parameters_nest.py
                |-- datasource_programs_nest.py
```
