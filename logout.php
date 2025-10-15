<?php
declare(strict_types=1);

require_once __DIR__ . '/assets/includes/config.php';
require_once __DIR__ . '/assets/includes/session.php';

logoutUser();
setFlash('auth', 'You have been signed out.', 'info');
redirect('index.php');
