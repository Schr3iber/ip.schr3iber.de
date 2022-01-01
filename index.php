<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ip.schr3iber.de</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/ip.icon" href="media/cyber.png" />
</head>
<body>
<?php
//getting IPs 
 $ip_user = getenv("REMOTE_ADDR");
 $ip_server = getenv("SERVER_ADDR");

//getting Ports
 $port_user = getenv("REMOTE_PORT");
 $port_server = getenv("SERVER_PORT");

//user agent
 $user_agent = getenv('HTTP_USER_AGENT');

//revers DNS with RIPEstar
 $rDNS_url = "https://stat-ui.stat.ripe.net/data/reverse-dns-ip/data.json?resource=" . $ip_user;
 $json_rDNS = file_get_contents($rDNS_url);
 $jsondata = json_decode($json_rDNS);
 $hostname = $jsondata->data->result[0];

//checking http or https
 if ($port_server == '80'){
    Echo '<span class="mark_red">';
        Echo "unencrypted "; 
    Echo'</span>';
 }else {
    Echo '<span class="mark_green">';
        Echo "encrypted "; 
    Echo'</span>';
}


//IPv4 red, IPv6 green and brackets for IPv6
 if (strpos($ip_user, '.')) {
   $brackets1 = "";
   $brackets2 = "";
   Echo '<span class="mark_red">';
        Echo "IPv4";
 }else{
    $brackets1 = "[";
    $brackets2 = "]";
    Echo '<span class="mark_green">';
        Echo "IPv6";
 }
 Echo '</span>';

 if (strpos($ip_user, '.')) {
     $brackets1 = "";
     $brackets2 = "";
 }

//output
 Echo " request";
 Echo '<br>';
 Echo "from ";
 Echo '<span class="mark_blue">';
    Echo  $brackets1 . '<a href="https://stat.ripe.net/app/launchpad/S1_' . $ip_user . '_C13C31C24C20C15C6C7C1C14C27C25C18C29C30C17C2C21C16C11C10">' . $ip_user . '</a>' . $brackets2 . ":" . $port_user;
 Echo'</span>';
 Echo '<span class="mark_green">';
    Echo " (" . $hostname . ")";
 Echo'</span>';

 Echo "<br>";

 Echo "to "; 
 Echo '<span class="mark_blue">';
    Echo $brackets1 . $ip_server . ":" . $port_server . $brackets2;
 Echo'</span>';
 Echo '<span class="mark_green">';
    Echo " (ip.schr3iber.de)";
 Echo'</span>';

//Date
 Echo "<br>";
 Echo '<span class="mark_blue">';
    date_default_timezone_set("Europe/London");
    Echo date("l, Y-m-d H:i:s") . " UTC";
 Echo'</span>';
 Echo "<br>";
 Echo '<span class="mark_blue">';
    Echo $user_agent;
 Echo'</span>';
?>
<br>
<a href="https://github.com/Schr3iber/ip.schr3iber.de">v1.1</p>
</body>
</html>
