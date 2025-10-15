<?php
declare(strict_types=1);

/** Ensure PHP session is started (idempotent) */
function ensureSessionStarted(): void {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

/** Flash message helpers */
function setFlash(string $key, string $message, string $type = 'info'): void {
    ensureSessionStarted();
    $_SESSION['flash'][$key] = [
        'message' => $message,
        'type' => $type,
    ];
}

function getFlash(string $key): ?array {
    ensureSessionStarted();
    if (!isset($_SESSION['flash'][$key])) {
        return null;
    }
    $payload = $_SESSION['flash'][$key];
    unset($_SESSION['flash'][$key]);
    return $payload;
}

/** Auth helpers */
function currentUser(): ?array {
    ensureSessionStarted();
    return $_SESSION['user'] ?? null;
}

function loginUser(array $user): void {
    ensureSessionStarted();
    $_SESSION['user'] = [
        'id' => $user['id'] ?? null,
        'username' => $user['username'] ?? null,
        'email' => $user['email'] ?? null,
    ];
}

function logoutUser(): void {
    ensureSessionStarted();
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], (bool)$params['secure'], (bool)$params['httponly']);
    }

    session_destroy();
}

function requireLogin(): void {
    if (!currentUser()) {
        setFlash('auth', 'Please sign in to continue.', 'warning');
        header('Location: index.php');
        exit;
    }
}
