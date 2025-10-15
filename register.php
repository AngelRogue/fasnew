<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username && $email && $password) {
        try {
            $dbPath = __DIR__ . '/database/fas.db';
            $db = new PDO("sqlite:" . $dbPath);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashedPassword]);

            echo "<div style='text-align:center; margin-top:50px;'>
                    ✅ Registration Successful! <a href='index.php'>Go to Login</a>
                  </div>";
        } catch (PDOException $e) {
            echo "❌ Error: " . $e->getMessage();
        }
    } else {
        echo "⚠️ Please fill all fields.";
    }
}
?>
