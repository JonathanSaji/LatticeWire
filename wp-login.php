<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign In — Latticewire</title>
  <style>
    :root {
      --bg: #0b0f14;
      --panel: #121821;
      --line: #223041;
      --accent: #4c9eff;
      --text: #e7ecf1;
      --muted: #8fa0af;
      --danger: #ff7a59;
    }

    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: Inter, Segoe UI, Arial, sans-serif;
      background: radial-gradient(circle at top, #142030 0%, var(--bg) 55%);
      color: var(--text);
      min-height: 100vh;
      display: grid;
      place-items: center;
      padding: 24px;
    }

    .card {
      width: min(100%, 440px);
      background: rgba(18, 24, 33, 0.95);
      border: 1px solid var(--line);
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
      border-radius: 16px;
      padding: 32px;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 24px;
    }

    .brand-mark {
      width: 42px;
      height: 42px;
      border-radius: 50%;
      display: grid;
      place-items: center;
      background: rgba(76, 158, 255, 0.16);
      color: var(--accent);
      font-weight: 700;
      letter-spacing: 0.08em;
    }

    .brand h1 {
      font-size: 1.05rem;
      margin: 0;
      letter-spacing: 0.08em;
      text-transform: uppercase;
    }

    .brand p {
      margin: 2px 0 0;
      color: var(--muted);
      font-size: 0.9rem;
    }

    .title {
      font-size: 1.55rem;
      margin: 0 0 8px;
    }

    .subtitle {
      color: var(--muted);
      margin: 0 0 24px;
      line-height: 1.5;
    }

    label {
      display: block;
      font-size: 0.92rem;
      margin-bottom: 8px;
      color: var(--muted);
    }

    input {
      width: 100%;
      padding: 13px 14px;
      border: 1px solid var(--line);
      border-radius: 10px;
      background: #0f141c;
      color: var(--text);
      margin-bottom: 16px;
      outline: none;
    }

    input:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(76, 158, 255, 0.15);
    }

    button {
      width: 100%;
      padding: 13px 14px;
      border: 0;
      border-radius: 10px;
      background: var(--accent);
      color: #03101b;
      font-weight: 700;
      cursor: pointer;
      margin-top: 4px;
    }

    button:hover { filter: brightness(1.08); }

    .footnote {
      margin-top: 16px;
      font-size: 0.9rem;
      color: var(--muted);
      line-height: 1.5;
    }

    .footnote a {
      color: var(--accent);
      text-decoration: none;
    }

    .status {
      margin-top: 16px;
      padding: 12px 14px;
      border: 1px solid rgba(76, 158, 255, 0.22);
      border-radius: 10px;
      background: rgba(76, 158, 255, 0.08);
      color: var(--text);
      display: none;
    }
  </style>
</head>
<body>
  <div class="card">
    <div class="brand">
      <div class="brand-mark">LW</div>
      <div>
        <h1>Latticewire</h1>
        <p>Enterprise Security Access</p>
      </div>
    </div>

    <h2 class="title">Sign in</h2>
    <p class="subtitle">Access your workspace or client portal securely.</p>

    <form id="loginForm">
      <label for="username">Username or email</label>
      <input id="username" name="username" type="text" autocomplete="username" required />

      <label for="password">Password</label>
      <input id="password" name="password" type="password" autocomplete="current-password" required />

      <button type="submit">Continue</button>
    </form>

    <div class="status" id="statusBox"></div>

    <p class="footnote">
      This is a static placeholder login page for GitHub Pages. For real authentication, connect it to WordPress, a backend service, or a hosted identity provider.
      <br /><br />
      <a href="/">Back to the main site</a>
    </p>
  </div>

  <script>
    const form = document.getElementById('loginForm');
    const statusBox = document.getElementById('statusBox');

    form.addEventListener('submit', function (event) {
      event.preventDefault();
      const username = document.getElementById('username').value.trim();
      const password = document.getElementById('password').value;

      if (!username || !password) {
        statusBox.style.display = 'block';
        statusBox.textContent = 'Please enter both your username and password.';
        return;
      }

      statusBox.style.display = 'block';
      statusBox.textContent = 'This demo page is static. Authentication is not enabled on GitHub Pages.';
    });
  </script>
</body>
</html>
