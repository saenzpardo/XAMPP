
<?php
# for utility functions

function AddAlert($message) {
    $alerts = GetAlerts();
    array_push($alerts, $message);
    setcookie('alerts', json_encode($alerts));  
}

function GetAlerts() {
    # if no alert cookie present return empty array
    if(!isset($_COOKIE['alerts'])) {
        return array();
    }     
    # decode json cookie value and assign it to the alerts variable
    $alerts = json_decode($_COOKIE['alerts'], true);
    return $alerts;
}

function ClearAlerts() {
    # delete cookie value by assigning it to empty array
    setcookie('alerts', json_encode(array()));
}



?>