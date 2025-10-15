<?php
declare(strict_types=1);
require_once __DIR__ . '/assets/includes/config.php';

try {
  $db = getDatabaseConnection();
  echo "✅ MySQL database and table ensured for DB '" . h(DB_NAME) . "' on " . h(DB_HOST) . ":" . h(DB_PORT) . ".";
} catch (Throwable $e) {
  echo "Error: " . h($e->getMessage());
}
?>
