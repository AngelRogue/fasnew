<?php
// create_db.php
try {
    $dbPath = __DIR__ . '/database/fas.db';

    // Create folder if not exists
    if (!file_exists(__DIR__ . '/database')) {
        mkdir(__DIR__ . '/database', 0777, true);
    }

    $db = new PDO("sqlite:" . $dbPath);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create users table
    $db->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT NOT NULL,
            email TEXT NOT NULL UNIQUE,
            password TEXT NOT NULL
        )
    ");

    echo "✅ Database and table created successfully!";
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>