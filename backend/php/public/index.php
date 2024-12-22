<?php

header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_URI'] === '/get-health-state' || $_SERVER['REQUEST_URI'] === '/'){
    require_once dirname(__DIR__) . "/src-light/getHealthState.php";

    $getHealthState = new getHealthState();

    echo json_encode($getHealthState->run());
}
