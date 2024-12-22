<?php
declare(strict_types=1);

namespace php\src\repositories;

use php\src\models\Diseas;
use php\src\models\Survey;
use php\src\models\User;

require_once dirname(__DIR__) . "/models/Diseas.php";
require_once dirname(__DIR__) . "/models/Survey.php";
require_once dirname(__DIR__) . "/models/User.php";
require_once "IUserRepository.php";

class UserRepositoryPHPArray implements IUserRepository
{
    public function getUserStruct($userId): ?User
    {
        return $this->usersStruct($userId);
    }

    private function usersStruct($userId): ?User
    {



        $usersStruct = [
            1 => new User(
                "Рябцев"
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
        ];

        return $usersStruct[$userId] ?? null;
    }
}