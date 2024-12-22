<?php

require_once "src-light/getHealthState.php";

class Main
{

    public function run()
    {
        $getHealthState = new getHealthState();
        var_dump($getHealthState->run());die;

    }
}

$main = new Main();
$main->run();