<?php

namespace php\src\tests;
require_once dirname(__DIR__) . "/tasks/GetHealthStateTask.php";

use php\src\models\Diseas;
use php\src\models\Survey;
use php\src\models\User;


class GetHealthStateTaskTest
{

    private function dbStruct()
    {
        return [
            'users' => [
                1 => new User("Рябцев"
                    , "Максим"
                    , "27.09.1996"
                    , "/path/to/photo"
                    , [
                        new Diseas('Язва', '01-01-2024', '14-01-2024', [
                            'антибиотик №1',
                            'антибиотик №2',
                            'постельный режим',
                        ], [], true),
                        new Diseas('Язва', '01-01-2024', '14-01-2024', [
                            'антибиотик №1',
                            'антибиотик №2',
                            'постельный режим',
                        ], [], false),
                    ]
                    , [
                        new Survey('Обследование1', '01-01-2024', '14-01-2024', []),
                        new Survey('Обследование2', '01-01-2024', '15-01-2024', []),
                    ]
                ),
            ]
        ];
    }


    public function __construct()
    {
        $task = new \php\src\tasks\GetHealthStateTask();
        $task->run(1);

    }
}