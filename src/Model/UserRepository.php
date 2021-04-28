<?php declare(strict_types=1);


namespace App\Model;

use App\Service\SQLConnector;
use App\Model\Mapper\UserMapper;
use App\Model\Dto\UserDataTransferObject;


class UserRepository
{
    private array $userList;
    private SQLConnector $connect;
    private UserMapper $userMapper;

    /**username
     * UserRepository constructor.
     * @param SQLConnector $connector
     */
    public function __construct(SQLConnector $connector)
    {
        $this->connect = $connector;
        $this->userMapper = new userMapper();
        $this->getFromDB('user');
    }

    /**
     * @return array
     */
    public function getUserList(): array
    {
        $this->getFromDB('user');

        return $this->userList;
    }

    /**
     * @param string $username
     * @return UserDataTransferObject
     * @throws \Exception
     */
    public function getUser(string $username): UserDataTransferObject
    {
        if (!$this->hasUser($username)) {
            throw new \Exception('Error! User does not exist', 1);
            {
            }
        }
        return $this->userList[$username];
    }

    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function hasUser(string $username, string $password): bool
    {
        $tmp = false;
        foreach ($this->userList as $user) {
            if ($user->getUsername() === $username && $user->getUserPassword() === $password) {
                return true;
            }
        }
        return $tmp;
    }

    /**
     * @param string $data
     */
    private function getFromDB(string $data): void
    {
        $tmp = [];
        $this->userList = [];

        $array = $this->makeArrayResult($this->connect->get(' Select * from ' . $data, '', $tmp));
        if (!empty($array)) {
            foreach ($array as $user) {
                $this->userList[(int)$user['id']] = $this->userMapper->map($user);
            }
        } else {
            echo('Database is empty');
        }
    }

    /**
     * @param object $resultObject
     * @return array
     */
    private function makeArrayResult(object $resultObject): array
    {
        if ($resultObject->num_rows === 0) {
            return array();
        }

        $array = array();
        while ($line = $resultObject->fetch_array()) {
            $array[] = $line;
        }
        return $array;
    }
}