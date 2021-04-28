<?php declare(strict_types=1);


namespace App\Service;


class SessionUser
{
    /**
     * SessionUser constructor.
     */
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * @return bool
     */
    public function isLoggedIn():bool
    {
        return isset($_SESSION['loggedin']);

    }

    /**
     * @param $name
     */
    public function setUser($name):void
    {
        $_SESSION['username'] = $name;
    }

    /**
     * @return string
     */
    public function getUser():string
    {
        return $_SESSION['username'];
    }
}