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
        'database' => 'topduhoc697c_duhoc',
        'username' => 'topduhoc697c_topduhoc697c',
        'password' => 'N3ttdlltT5*'
    ],

    'security' => [
        'csrf_token_name' => '_csrf',
        'password_min_length' => 6
    ],

    'firebase' => [
        'apiKey' => "AIzaSyAU2m6dl2fjhu2z9oOcaZ0hTtCPq980VAI",
        'authDomain' => "du-hoc-26dde.firebaseapp.com",
        'databaseURL' => "https://du-hoc-26dde-default-rtdb.asia-southeast1.firebasedatabase.app",
        'projectId' => "du-hoc-26dde",
        'storageBucket' => "du-hoc-26dde.firebasestorage.app",
        'messagingSenderId' => "1051803130660",
        'appId' => "1:1051803130660:web:2b46f19972218e88c8b1b1",
        'measurementId' => "G-KF1FJ21XVK"
    ]
];