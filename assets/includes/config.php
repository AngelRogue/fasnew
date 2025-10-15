<?php
declare(strict_types=1);

// Global configuration and database helper for the app

// Absolute path to the project root (two levels up from this file)
if (!defined('APP_ROOT')) {
    define('APP_ROOT', dirname(__DIR__, 2));
}

if (!defined('DB_DIR')) {
    define('DB_DIR', APP_ROOT . '/database');
}

if (!defined('DB_FILE')) {
    define('DB_FILE', DB_DIR . '/fas.db');
}

/**
 * Get a shared PDO connection to the SQLite database.
 * Ensures the database directory and base schema exist.
 */
function getDatabaseConnection(): PDO {
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }

    if (!is_dir(DB_DIR)) {
        // Create folder if not exists
        mkdir(DB_DIR, 0777, true);
    }

    $pdo = new PDO('sqlite:' . DB_FILE);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Ensure base schema exists
    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT NOT NULL,
            email TEXT NOT NULL UNIQUE,
            password TEXT NOT NULL,
            created_at TEXT DEFAULT CURRENT_TIMESTAMP
        )'
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
