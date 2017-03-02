<?php
# +------------------------------------------------------------------+
# |             ____ _               _        __  __ _  __           |
# |            / ___| |__   ___  ___| | __   |  \/  | |/ /           |
# |           | |   | '_ \ / _ \/ __| |/ /   | |\/| | ' /            |
# |           | |___| | | |  __/ (__|   <    | |  | | . \            |
# |            \____|_| |_|\___|\___|_|\_\___|_|  |_|_|\_\           |
# |                                                                  |
# | Copyright Mathias Kettner 2013             mk@mathias-kettner.de |
# +------------------------------------------------------------------+
#

# CRIT_MIN and CRIT_MAX used as the --lower and --upper value basis

# Based on 2nd series name, first series data is C (Celsius) or F (Fahrenheit)
# Since all values are expressed in celcius, we need to convert if user
# selected Fahrenheit

$opt[1]  = "--pango-markup ";
$opt[1] .= "--vertical-label \"Status\" ";
$opt[1] .= "--lower \"Lower\" --upper \"Upper\"  --rigid ";
$opt[1] .= "--title \"Smoke Status $servicedesc\" ";

# For the actual value, if Fahrenheit, need to convert from stored Celsius

$def[1]  = "DEF:var1=$RRDFILE[1]:$DS[1]:MAX ";
# Color gradient - hardcoded for now
$def[1] .= "CDEF:temp38=var1,38,LT,var1,38,IF ";
$def[1] .= "CDEF:temp38NoUnk=var1,UN,0,temp38,IF ";
$def[1] .= "AREA:temp38NoUnk#ff0000:\"TEMPERATURE\" ";
$def[1] .= "CDEF:temp24=var1,24,LT,var1,24,IF ";
$def[1] .= "CDEF:temp24NoUnk=var1,UN,0,temp24,IF ";
$def[1] .= "AREA:temp24NoUnk#8aff00 ";
$def[1] .= "CDEF:temp16=var1,16,LT,var1,16,IF ";
$def[1] .= "CDEF:temp16NoUnk=var1,UN,0,temp16,IF ";
$def[1] .= "AREA:temp16NoUnk#00ff83 ";


#$def[1] .= "LINE1:var1#0000FF:\"TEMPERATURE\" ";
$def[1] .= "GPRINT:var1:LAST:\"Current\: %2.1lfC\" ";
$def[1] .= "HRULE:20#FFFF00:\"Warning (Low)\: " . number_format(20, 1, '.', '') . "C\\l\" ";
$def[1] .= "COMMENT:\\u ";
$def[1] .= "HRULE:30#FFFF00:\"Warning (High)\: " . number_format(30, 1, '.', '') . "C\\r\" ";
$def[1] .= "HRULE:10#FF0000:\"Critical (Low)\: " . number_format(10, 1, '.', '') . "C\" ";
$def[1] .= "HRULE:$40#FF0000:\"Critical (High)\: " . number_format(40, 1, '.', '') . "C\" ";
?>
