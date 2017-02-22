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
### Step 2: Obtain the auth code
In the code below change the "PINCODE" "CLIENTID" and "CLIENTSECRET" with your details (on your product those are called "product id" and "product secret" on https://developers.nest.com/ after creating your product.
`curl -X POST -d 'code=PINCODE&client_id=CLIENTID&client_secret=CLIENTSECRET&grant_type=authorization_code' "https://api.home.nest.com/oauth2/access_token"`
The response of that command is a JSON output that we can use in a .json file

