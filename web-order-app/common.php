<?php
# utility functions for app

# add alert message to cookie data
function AddAlert($message) {
    $alerts = GetAlerts();
    array_push($alerts, $message);
    setcookie('alerts', json_encode($alerts));
}

# get alert message from stored cookie data
function GetAlerts() {
    # check for existing cookie
    # if empty return empty array
    if(!isset($_COOKIE['alerts'])) {
        return array();
    }
    $alerts = json_decode($_COOKIE['alerts'], true);
    return $alerts;
}

# clear alert cookie data by returning empty array
function ClearAlerts() {
    setcookie('alerts', json_encode(array()));
}



?>