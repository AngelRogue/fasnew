<?php
declare(strict_types=1);
require_once __DIR__ . '/assets/includes/config.php';

try {
  $db = getDatabaseConnection();
  echo "✅ Database and table ensured at " . h(DB_FILE) . ".";
} catch (Throwable $e) {
  echo "Error: " . h($e->getMessage());
}
?>
