<?php
declare(strict_types=1);

require_once __DIR__ . '/assets/includes/config.php';
require_once __DIR__ . '/assets/includes/session.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('index.php');
}

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = (string)($_POST['password'] ?? '');

if ($username === '' || $email === '' || $password === '') {
    setFlash('register', 'All fields are required.', 'danger');
    redirect('index.php');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setFlash('register', 'Please enter a valid email address.', 'danger');
    redirect('index.php');
}

if (strlen($password) < 6) {
    setFlash('register', 'Password must be at least 6 characters.', 'danger');
    redirect('index.php');
}

try {
    $db = getDatabaseConnection();

    // Check if email already exists
    $check = $db->prepare('SELECT id FROM users WHERE email = :email LIMIT 1');
    $check->execute([':email' => $email]);
    if ($check->fetch()) {
        setFlash('register', 'Email is already registered. Try signing in.', 'warning');
        redirect('index.php');
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $db->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
    $stmt->execute([
        ':username' => $username,
        ':email' => $email,
        ':password' => $hashedPassword,
    ]);

    setFlash('auth', 'Registration successful. Please sign in.', 'success');
    redirect('index.php');
} catch (Throwable $e) {
    setFlash('register', 'Unexpected error during registration.', 'danger');
    redirect('index.php');
}
?>
