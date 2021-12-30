<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ip.schr3iber.de</title>

<style>
html, body, td {
    font-family:    Courier;
    font-size:  1em;
    background-color:white;
}
h1, h2, h3, h4, h5, h6 {
    color:      #00A000;
    -moz-text-shadow: 2px 2px 5px grey;
    -webkit-text-shadow: 2px 2px 5px grey;
    text-shadow: 2px 2px 5px grey;
}
hr {
    border:     1;
    color:      #00A000;
    background-color:       #00A000;
    width:      100%;
    height:     1px;
    -moz-box-shadow: 2px 2px 5px grey;
    -webkit-box-shadow: 2px 1px 5px grey;
    box-shadow:     2px 2px 5px grey;
}
.logo {
    position:   absolute;
    top:        10px;
    right:      10px;
    width:      150px;
    opacity:    .9;
    float:      left;
}
.mark_red {
    color:      #A00000;
}
.mark_green {
    color:      #00A000;
}
.mark_blue {
    color:      #0000A0;
}
p.con_info {
    font-size:  .8em;
    padding:    5px;
    width:      80%;
    font-family:    Courier;
    color:      #8080FF;
    background-color:#E8f8e8;
    border:     1px solid lightgrey;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    -moz-box-shadow: 2px 2px 5px grey;
    -webkit-box-shadow: 2px 2px 5px grey;
    box-shadow:     2px 2px 5px grey;
}
</style>

</head>
<body>
<?php
    
 $ip_user = getenv("REMOTE_ADDR") ;
 $ip_server = getenv("SERVER_ADDR") ;
 //$ip_domain = gethostbyname('gtrvqf0reg99y09l.myfritz.net');

 $port_user = getenv("REMOTE_PORT") ;
 $port_server = getenv("SERVER_PORT");

 if ($port_server == '80'){
    Echo '<span class="mark_red">';
        Echo "unencrypted "; 
    Echo'</span>';
 }else {
    Echo '<span class="mark_green">';
        Echo "encrypted "; 
    Echo'</span>';
}
 
if (strpos($ip_user, '.')) {
    Echo '<span class="mark_red">';
        Echo "IPv4";
    Echo '</span>';
    Echo " request";
    Echo '<br>';
    Echo "from ";
    Echo '<span class="mark_blue">';
        Echo  $ip_user . ":" . $port_user;
    Echo'</span>';
    Echo "<br>";
    Echo "to "; 
    Echo '<span class="mark_blue">';
        Echo  $ip_server . ":" . $port_server . " (ip.schr3iber.de)";
    Echo'</span>';
 
}
if (strpos($ip_user, ':')) {
    Echo " request";
    Echo '<br>';
    Echo "from ";
    Echo '<span class="mark_blue">';
        Echo  "[".$ip_user . "]:" . $port_user;
    Echo'</span>';
    Echo "<br>";
    Echo "to "; 
    Echo '<span class="mark_blue">';
        Echo "[" . $ip_server . ":" . $port_server . "] (ip.schr3iber.de)";
    Echo'</span>';
 
}

Echo "<br>";
Echo "at ";
Echo '<span class="mark_blue">';
    Echo date('l') . ", " . gmdate('Y-m-d h:i:s \G\M\T');
Echo'</span>';
?>

<p>v1.0</p>
</body>
</html>
