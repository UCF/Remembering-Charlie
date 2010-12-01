<?php
/* 

This is necessary to get around Internet Explorer's strict XSS security.  
You are not allowed to make ajax request to anything but the current ULR, 
subdomains also restricted (even www).

explained:
http://developer.yahoo.com/javascript/howto-proxy.html

*/

// Allowed hostnames
$hosts = array(
    'events' =>'http://events.ucf.edu/',
    'askucf' =>'http://ucf.custhelp.com/',
);

//set host and path from GET variables
if(isset($_GET['host']) && isset($hosts[$_GET['host']])){
    switch ($_GET['host']) {
        case 'events':
            $host = $hosts[$_GET['host']];
            $path = (isset($_GET['path']))  ? "?".$_GET['path'] : "?format=hcalendar&upcoming=upcoming&limit=5";
            header('Content-Type: text/calendar; charset=utf-8');
            break;
        case 'askucf':
            $host = $hosts[$_GET['host']];
            $path = (isset($_GET['path']))  ? $_GET['path'] : "cgi-bin/ucf.cfg/php/enduser/opensearch.php?q=myUCF&startPage=1";
            header("Content-Type: text/xml");            
            break;
    }
} else {
    //default to UCF Events
    $host = $hosts['events'];
    $path = (isset($_GET['path']))  ? "?".$_GET['path'] : "?format=hcalendar&upcoming=upcoming&limit=5";
    header('Content-Type: text/calendar; charset=utf-8');
}
$url = $host.$path;

// Open the Curl session
$session = curl_init($url);

// Not returing HTTP headers. Do return the contents of the call
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// Make the call
$hcal = curl_exec($session);

echo $hcal;
curl_close($session);

?>
