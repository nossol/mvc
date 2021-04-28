<?php declare(strict_types=1);


namespace App\Model\Mapper;

use App\Model\Dto\UserDataTransferObject;


class UserMapper
{
    /**
     * @param array $user
     * @return UserDataTransferObject
     */
    public function map(array $user): userDataTransferObject
    {
        $userDataTransferObject = new UserDataTransferObject();
        $userDataTransferObject->setUserId((int)$user['id']);
        $userDataTransferObject->setUsername($user['username']);
        $userDataTransferObject->setUserPassword($user['password']);

        return $userDataTransferObject;
    }
}