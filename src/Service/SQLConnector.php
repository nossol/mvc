<?php declare(strict_types=1);


namespace App\Service;


class SQLConnector
{
    private \mysqli $database;

    /**
     *
     */
    public function __construct()
    {
        $this->database = new \mysqli('127.0.0.1:3306', 'root', 'root', 'mvc');
        $this->database->set_charset('utf8');
        if ($this->database->connect_errno) {
            echo "Connection Failed" . $this->database->connect_errno . $this->database->connect_error;
        }
    }

    /**
     * @param string $sql
     * @param string $whitespace
     * @param array $data
     * @return object
     */
    public function get(string $sql, string $whitespace, array $data):object
    {
        $statement = \mysqli_stmt_init($this->database);

        if (!mysqli_stmt_prepare($statement, $sql)) {
            echo('SQL Query Error');
        } else {
            if (!Empty($data)) {
                mysqli_stmt_bind_param($statement, $whitespace, $data);
            }
            mysqli_stmt_execute($statement);
        }
        return mysqli_stmt_get_result($statement);
    }

    /**
     * @param string $sql
     * @param string $whitespace
     * @param array $data
     */
    public function set(string $sql, string $whitespace, array $data):void
    {
        $statement = \mysqli_stmt_init($this->database);

        if (!mysqli_stmt_prepare($statement, $sql)) {
            echo('SQL Query Error');
        } else {
            if (!empty($data)) {
                mysqli_stmt_bind_param($statement, $whitespace, $data);
            }
            mysqli_stmt_execute($statement);
        }
    }

}