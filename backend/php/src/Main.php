<?php

namespace php\src;
require_once __DIR__ . "/tasks/GetHealthStateTask.php";

class Main
{
    public function run(): void
    {
        $action = new \php\src\tasks\GetHealthStateTask();
        $res = $action->run(1);
        file_put_contents("console-app-result.txt", print_r($res, true));
    }
}

(new Main())->run();

