<?php
declare(strict_types=1);

namespace php\src\tasks;

require_once dirname(__DIR__) . "/repositories/UserRepositoryPHPArray.php";

use php\src\models\User;
use php\src\repositories\UserRepositoryPHPArray;

class GetHealthStateCommand
{
    public function run($userId): User
    {
        $userRepository = new UserRepositoryPHPArray();
        return $userRepository->getUserStruct($userId);
    }
}