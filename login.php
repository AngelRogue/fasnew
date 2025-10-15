<?php
declare(strict_types=1);

require_once __DIR__ . '/assets/includes/config.php';
require_once __DIR__ . '/assets/includes/session.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('index.php');
}

$email = trim($_POST['email'] ?? '');
$password = (string)($_POST['password'] ?? '');

if ($email === '' || $password === '') {
    setFlash('auth', 'Please fill in both email and password.', 'danger');
    redirect('index.php');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setFlash('auth', 'Please enter a valid email address.', 'danger');
    redirect('index.php');
}

try {
    $db = getDatabaseConnection();
    $stmt = $db->prepare('SELECT id, username, email, password FROM users WHERE email = :email LIMIT 1');
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        loginUser($user);
        setFlash('auth', 'Welcome back, ' . h($user['username']) . '!', 'success');
        redirect('dashboard.php');
    }

    setFlash('auth', 'Invalid email or password.', 'danger');
    redirect('index.php');
} catch (Throwable $e) {
    setFlash('auth', 'Unexpected error during login.', 'danger');
    redirect('index.php');
}
?>
