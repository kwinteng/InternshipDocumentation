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
Below is a copy of the files and the nessary explanation within

Check_mk
|&nbsp;&nbsp;&nbsp;+-- agents  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- special  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [agent_nest](/source/agents/special/agent_nest)  return
|&nbsp;&nbsp;&nbsp;+-- checkman  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_co](/source/checkman/nest_co)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_humidity](/source/checkman/nest_humidity)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_smoke](/source/checkman/nest_smoke)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_smoke_co_alarm](/source/checkman/nest_smoke_co_alarm)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_structure](/source/checkman/nest_structure)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_temp](/source/checkman/nest_temp)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_thermostat](/source/checkman/nest_thermostat)  return
|&nbsp;&nbsp;&nbsp;+-- checks  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_co](/source/checks/nest_co)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_humidity](/source/checks/nest_humidity)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_smoke](/source/checks/nest_smoke)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_smoke_co_alarm](/source/checks/nest_smoke_co_alarm)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_structure](/source/checks/nest_structure)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_temp](/source/checks/nest_temp)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_thermostat](/source/checks/nest_thermostat)  return
|&nbsp;&nbsp;&nbsp;+-- pnp-templates  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_mk-nest.php](/source/pnp-templates/check_mk-nest.php)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_mk-nest_humidity.php](/source/pnp-templates/check_mk-nest_humidity.php)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_mk-nest_smoke.php](/source/pnp-templates/check_mk-nest_smoke.php)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_mk-nest_smoke_co_alarm.php](/source/pnp-templates/check_mk-nest_smoke_co_alarm.php)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_mk-nest_temp.php](/source/pnp-templates/check_mk-nest_temp.php)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_mk-nest_thermostat.php](/source/pnp-templates/check_mk-nest_thermostat.php)  return
|&nbsp;&nbsp;&nbsp;+-- web  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- plugins  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- perfometer  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [nest_thermostat.py](/source/web/plugins/perfometer/check_mk.py)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- wato  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [check_parameters_nest.py](/source/web/plugins/wato/check_parameters.py)  return
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- [datasource_programs_nest.py](/source/web/plugins/wato/datasource_programs.py)  return
