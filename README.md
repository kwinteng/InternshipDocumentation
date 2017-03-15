# InternshipDocumentation
A documentation regarding the internship
## Nest setup
### Prerequisites
* A Linux installation with curl
* Account on home.nest.com
* A nest product or the nest home simulator as a google chrome extention
* A product on developers.nest.com that has the permissions needed to function

### Obtaining the access token
The nest products work with OAuth 2.0 and require you to get an access token to communicate with the online API.
#### Step 1: Obtain the PIN code
In the following link replace CLIENTID with your client ID and navigate to https://home.nest.com/login/oauth2?client_id=CLIENTID&state=STATE
#### Step 2: Obtain the access token
In the code below change the "PINCODE" "CLIENTID" and "CLIENTSECRET" with your details (on your product those are called "product id" and "product secret" on https://developers.nest.com/ after creating your product.
~~~~
curl -X POST -d 'code=PINCODE&client_id=CLIENTID&client_secret=CLIENTSECRET&grant_type=authorization_code' "https://api.home.nest.com/oauth2/access_token" 	
~~~~
The response of that command is a JSON output that we can use in a .json file

If you change the permissions of the product, you will have to repeat the steps to get your access token.

### Structure
Below is a copy of the files and the nessary explanation within

Check_mk<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- agents<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- special<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [agent_nest](/source/agents/special/agent_nest)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- checkman<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_co](/source/checkman/nest_co)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_humidity](/source/checkman/nest_humidity)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_smoke](/source/checkman/nest_smoke)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_smoke_co_alarm](/source/checkman/nest_smoke_co_alarm)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_structure](/source/checkman/nest_structure)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_temp](/source/checkman/nest_temp)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_thermostat](/source/checkman/nest_thermostat)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- checks<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_co](/source/checks/nest_co)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_humidity](/source/checks/nest_humidity)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_smoke](/source/checks/nest_smoke)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_smoke_co_alarm](/source/checks/nest_smoke_co_alarm)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_structure](/source/checks/nest_structure)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_temp](/source/checks/nest_temp)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_thermostat](/source/checks/nest_thermostat)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- pnp-templates<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_mk-nest.php](/source/pnp-templates/check_mk-nest.php)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_mk-nest_humidity.php](/source/pnp-templates/check_mk-nest_humidity.php)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_mk-nest_smoke.php](/source/pnp-templates/check_mk-nest_smoke.php)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_mk-nest_smoke_co_alarm.php](/source/pnp-templates/check_mk-nest_smoke_co_alarm.php)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_mk-nest_temp.php](/source/pnp-templates/check_mk-nest_temp.php)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_mk-nest_thermostat.php](/source/pnp-templates/check_mk-nest_thermostat.php)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- web<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- plugins<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- perfometer<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_mk.py](/source/web/plugins/perfometer/nest_thermostat.py)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- wato<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_parameters.py](/source/web/plugins/wato/check_parameters_nest.py)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [datasource_programs.py](/source/web/plugins/wato/datasource_programs_nest.py)<br />

### Special remarks
* Default Temp warning and crit values are located in [nest_temp](/source/checks/nest_temp)
* Default Humidity warning and crit values are located in [nest_humidity](/source/checks/nest_humidity)
* Away Status is used to see if anyone is in the building, located in [nest_structure](/source/checkman/nest_structure)
* In production [datasource_programs_nest.py](/source/web/plugins/wato/datasource_programs_nest.py) is merged into datasource_programs.py
* In production [check_parameters_nest.py](/source/web/plugins/wato/check_parameters_nest.py) is merged into check_parameters.py

### TODO
* Hosttype maken voor sensors

## RBPi setup

### Prerequisites
* A Raspberry Pi with Raspberian installed
* Sensors to take in the data (temperature & humidity, smoke, motion, ..)

### Making the RBPi transmit data to the monitor
The nest products work with OAuth 2.0 and require you to get an access token to communicate with the online API.
#### Step 1: Give the public key from the monitor to the RBPi

#### Step 2: Install the Check_mk plugin on the RBPi


### Structure
Below is a copy of the files and the nessary explanation within

#### Monitor
Check_mk<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- checkman<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [rbpi_humidity](/source/checkman/rbpi_humidity)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [rbpi_smoke](/source/checkman/rbpi_smoke)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [rbpi_temp](/source/checkman/rbpi_temp)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- checks<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [rbpi_humidity](/source/checks/rbpi_humidity)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [rbpi_smoke](/source/checks/rbpi_smoke)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [rbpi_temp](/source/checks/rbpi_temp)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- pnp-templates<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_mk-rbpi_temp.php](/source/pnp-templates/check_mk-rbpi_temp.php)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_mk-rbpi_smoke.php](/source/pnp-templates/check_mk-rbpi_smoke.php)<br />
#### Client (RBPi)
Check_mk_agent<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- plugins<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [rbpi_humidity](/rbpi/check_mk_agent/plugins/rbpi_temp.py)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [rbpi_smoke](/rbpi/check_mk_agent/plugins/rbpi_smoke.py)<br />

### Special remarks
* Default Temp warning and crit values are located in [rbpi_temp](/source/checks/rbpi_temp)
* Default Humidity warning and crit values are located in [rbpi_humidity](/source/checks/rbpi_humidity)
