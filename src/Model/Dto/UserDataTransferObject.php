<?php declare(strict_types=1);


namespace App\Model\Dto;


class UserDataTransferObject
{
    private int $id;
    private string $username;
    private string $password;

    /**
     * UserDataTransferObject constructor.
     */
    public function __construct()
    {
        $this->id = 0;
        $this->username = '';
        $this->password = '';
    }

    /**
     * @param int $id
     */
    public function setUserId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @param string $password
     */
    public function setUserPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getUserPassword(): string
    {
        return $this->password;
    }


}