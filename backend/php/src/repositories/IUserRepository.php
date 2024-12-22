<?php
declare(strict_types=1);

namespace php\src\repositories;

use php\src\models\User;

interface IUserRepository
{
    public function getUserStruct($userId):  User|null;
}