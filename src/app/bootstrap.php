<?php

require_once '../vendor/autoload.php';

use App\Core\Session;
use App\Core\Database;
use App\Core\Logger;

// Load environment variables if exists
if (file_exists('../.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
}

// Start session
Session::start();

// Connect to the database
Database::connect();

// Set up global error handler (optional)
set_error_handler(function ($severity, $message, $file, $line) {
    Logger::log("Error: $message in $file on line $line");
});