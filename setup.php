<?php
try {
  $db = new PDO('sqlite:fas.db');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL
  )");

  echo "✅ Database and table created successfully.";
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
?>
