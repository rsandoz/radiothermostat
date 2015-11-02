# radiothermostat
Simple jQuery code for CT50, CT80, 3M50

* running on a webserver such as wamp or xampp
Edit the ip addresses of your themostats at the bottom of thermostat.html in the ready fn.

* to run 'standalone' (ie double clicking on the file and running directly in your browser)
Find the functions PostThermostat and GetThermostat.  Comment out the call to curl.php and comment in the 'jqueried' post and getJSON functions.
Run this with chrome and pass the arguement --disable-web-security, otherwise do as you wish with this code.
