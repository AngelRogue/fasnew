 <!-- Dark Mode Toggle Script -->
  <script>
    const toggle = document.getElementById('themeToggle');
    const html = document.documentElement;

    function updateIcon() {
      toggle.textContent = html.getAttribute('data-bs-theme') === 'dark' ? '☀️' : '🌙';
    }

    toggle.addEventListener('click', () => {
      const current = html.getAttribute('data-bs-theme');
      const next = current === 'dark' ? 'light' : 'dark';
      html.setAttribute('data-bs-theme', next);
      localStorage.setItem('theme', next);
      updateIcon();
    });

    // Load saved theme or system default
    const saved = localStorage.getItem('theme');
    if (saved) {
      html.setAttribute('data-bs-theme', saved);
    } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
      html.setAttribute('data-bs-theme', 'dark');
    }

    updateIcon();
  </script>
