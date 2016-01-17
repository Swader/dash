<?php

require_once '../vendor/autoload.php';

die(json_encode([
    'status' => '200',
    'message' => 'Hello from ' . $_GET['page'] ?? 'World!'
]));