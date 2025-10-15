<?php
declare(strict_types=1);
// create_db.php - ensure MySQL database and users table exist
require_once __DIR__ . '/assets/includes/config.php';

try {
    $db = getDatabaseConnection();
    echo "✅ MySQL database '" . h(DB_NAME) . "' and table ensured on " . h(DB_HOST) . ":" . h(DB_PORT) . ".";
} catch (Throwable $e) {
    echo "❌ Error: " . h($e->getMessage());
}
?>