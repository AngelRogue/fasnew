<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>landing Sign-Up </title>

  <?php include 'assets/includes/css-link.php'; ?>
  <?php include 'assets/includes/js-link.php'; ?>

  <style>
    body {
      background-color: var(--bs-body-bg);
      color: var(--bs-body-color);
    }

    footer {
      background-color: var(--bs-dark);
      color: var(--bs-gray-400);
    }

    footer a {
      color: var(--bs-light);
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }

    .form-container {
      background-color: var(--bs-body-bg);
      box-shadow: 0 0.25rem 1rem rgba(0, 0, 0, 0.1);
    }

    .theme-toggle {
      background: none;
      border: none;
      color: white;
      font-size: 1.2rem;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <?php include 'assets/includes/landingnavbar.php'; ?>

  <!-- Hero Section -->
<main class="d-flex align-items-center min-vh-100 py-5">
  <div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Welcome To The FAS Supportive Portal</h1>
        <p class="col-lg-10 fs-5 text-muted">
          Education is the most powerful weapon which you can use to change the world."
        </p>
        <p>Comprehensive learning programs &amp; classes for all students</p>
      </div>

      <div class="col-md-10 mx-auto col-lg-5">

        <!-- Sign In Form -->
        <form id="login-form" method="POST" action="login.php">

          <h3 class="mb-3 text-center">Sign In</h3>
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" placeholder="Password" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Sign In</button>
        </form>

        <!-- Register Form -->
        <form id="register-form" class="d-none" method="POST" action="register.php">

          <h3 class="mb-3 text-center">Register</h3>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Username" required>
          </div>
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" placeholder="Password" required>
          </div>
          <button type="submit" class="btn btn-success w-100">Register</button>
        </form>

        <!-- Toggle Link -->
        <div class="text-center mt-3">
          <button id="toggle-forms" class="btn btn-link">
            Don't have an account? Register
          </button>
        </div>

      </div>
    </div>
  </div>
</main>

<!-- Include Dark Mode Toggle Script -->
<?php include 'assets/includes/darkmode.php'; ?>

<script>
  const toggleBtn = document.getElementById('toggle-forms');
  const loginForm = document.getElementById('login-form');
  const registerForm = document.getElementById('register-form');
  let showingLogin = true;

  toggleBtn.addEventListener('click', () => {
    if (showingLogin) {
      // Show Register form
      loginForm.classList.add('d-none');
      registerForm.classList.remove('d-none');
      toggleBtn.textContent = 'Already have an account? Sign In';
    } else {
      // Show Login form
      registerForm.classList.add('d-none');
      loginForm.classList.remove('d-none');
      toggleBtn.textContent = "Don't have an account? Register";
    }
    showingLogin = !showingLogin;
  });
</script>

</body>

</html>