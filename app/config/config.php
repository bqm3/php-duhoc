<?php
// app/config/config.php

return [
    'app' => [
        'name' => 'PHP Du Hoc',
        'session_name' => 'PHP_DU_HOC',
        'timezone' => 'Asia/Ho_Chi_Minh'
    ],
    
    'database' => [
        'host' => 'localhost',
        'port' => 3306,
        'database' => 'duhoc',
        'username' => 'root',
        'password' => ''
    ],
    
    'security' => [
        'csrf_token_name' => '_csrf',
        'password_min_length' => 6
    ]
];