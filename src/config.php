<?php

return [
    'database' => [
        'name' => 'früchte',
        'username' => 'root',
        'password' => 'root',
        'connection' => 'mysql:host=127.0.0.1:3306',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];

