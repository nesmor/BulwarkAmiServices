<?php
require_once("/var/www/html/BulwarkAmiServices/application/libraries/phpagi/phpagi-asmanager.php");

$manager = new AGI_AsteriskManager();
$result = $manager->connect();
if($result === TRUE) {
    echo "Connection established.\n";
    $manager->add_event_handler("*", "dump_event");
    $manager->add_event_handler("originate", "dump_event");
    while (1 == 1) {
        $manager->wait_response();
    }
} else {
    echo "Connection failed.\n";
    exit;
}

function dump_event($ecode,$data,$server,$port) {
    echo "received event '$ecode' from $server:$port\n";
    print_r($data);
} 
?>
