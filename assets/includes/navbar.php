<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/session.php';
$user = currentUser();
?>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="dashboard.php">FAS Support</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
      data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <?php if ($user): ?>
        <li class="nav-item text-nowrap">
          <span class="navbar-text text-white me-3">Hello, <?= h($user['username']) ?></span>
        </li>
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Sign out</a>
        </li>
      <?php else: ?>
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="index.php">Sign in</a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>