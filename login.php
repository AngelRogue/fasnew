<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  if (empty($email) || empty($password)) {
    echo "❌ Please fill all fields.";
    exit;
  }

  try {
    $db = new PDO('sqlite:database/fas.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
      echo "✅ Login successful! Welcome, " . htmlspecialchars($user['username']);
    } else {
      echo "❌ Invalid email or password.";
    }
  } catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
  }
}
?>
