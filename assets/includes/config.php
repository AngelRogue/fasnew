<?php
declare(strict_types=1);

// Global configuration and database helper for the app

// Absolute path to the project root (two levels up from this file)
if (!defined('APP_ROOT')) {
    define('APP_ROOT', dirname(__DIR__, 2));
}

// MySQL configuration (override via environment variables)
if (!defined('DB_HOST')) {
    define('DB_HOST', getenv('DB_HOST') ?: '127.0.0.1');
}
if (!defined('DB_PORT')) {
    define('DB_PORT', getenv('DB_PORT') ?: '3306');
}
if (!defined('DB_NAME')) {
    define('DB_NAME', getenv('DB_NAME') ?: 'fas');
}
if (!defined('DB_USER')) {
    define('DB_USER', getenv('DB_USER') ?: 'root');
}
if (!defined('DB_PASS')) {
    define('DB_PASS', getenv('DB_PASS') ?: '');
}
if (!defined('DB_CHARSET')) {
    define('DB_CHARSET', getenv('DB_CHARSET') ?: 'utf8mb4');
}

/**
 * Get a shared PDO connection to the MySQL database.
 * Ensures the database and base schema exist.
 */
function getDatabaseConnection(): PDO {
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $commonOptions = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    // First, ensure the database exists (connect without a specific DB)
    $serverDsn = sprintf(
        'mysql:host=%s;port=%s;charset=%s',
        DB_HOST,
        DB_PORT,
        DB_CHARSET
    );
    try {
        $serverPdo = new PDO($serverDsn, DB_USER, DB_PASS, $commonOptions);
        // Attempt to create the database if it doesn't exist
        $serverPdo->exec(sprintf(
            'CREATE DATABASE IF NOT EXISTS `%s` DEFAULT CHARACTER SET %s COLLATE %s',
            str_replace('`', '``', DB_NAME),
            DB_CHARSET,
            DB_CHARSET . '_unicode_ci'
        ));
    } catch (Throwable $ignored) {
        // Ignore inability to create DB; connection below may still succeed if DB exists
    }

    // Now connect to the specific database
    $databaseDsn = sprintf(
        'mysql:host=%s;port=%s;dbname=%s;charset=%s',
        DB_HOST,
        DB_PORT,
        DB_NAME,
        DB_CHARSET
    );
    $pdo = new PDO($databaseDsn, DB_USER, DB_PASS, $commonOptions);

    // Ensure base schema exists
    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS users (
            id INT UNSIGNED NOT NULL AUTO_INCREMENT,
            username VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=' . DB_CHARSET . ' COLLATE=' . DB_CHARSET . '_unicode_ci'
    );

    return $pdo;
}

/** Escape HTML safely */
function h(?string $value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Simple redirect helper */
function redirect(string $path): void {
    header('Location: ' . $path);
    exit;
}
