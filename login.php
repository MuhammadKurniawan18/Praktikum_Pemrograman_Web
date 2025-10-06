<?php
session_start();

// Jika sudah login, langsung ke dashboard
if (isset($_SESSION['username'])) {
  header("Location: dashboard.php");
  exit;
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  if ($username === "admin" && $password === "12345") {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit;
  } else {
    $error = "Username atau password salah!";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Sistem Informasi Jadwal Mata Kuliah</title>
  <link rel="stylesheet" href="style.css">
  <style>
    /* Tambahan sedikit untuk memusatkan form login */
    .login-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 80vh;
    }

    .login-card {
      background: white;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
      max-width: 400px;
      width: 100%;
      text-align: center;
    }

    .login-card h2 {
      color: #004080;
      margin-bottom: 15px;
    }

    .login-card input {
      width: 90%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .login-card button {
      width: 95%;
      margin-top: 15px;
    }

    .error-message {
      color: red;
      margin-bottom: 10px;
      font-weight: bold;
    }

    .footer {
      margin-top: 50px;
    }
  </style>
</head>
<body>

  <!-- Header seperti dashboard -->
  <header class="header">
    <h1 class="site-title">Sistem Informasi Jadwal Mata Kuliah</h1>
    <p class="subtitle">Silakan login untuk melanjutkan</p>
  </header>

  <main class="login-container">
    <div class="login-card card">
      <h2>Login</h2>

      <?php if ($error): ?>
        <p class="error-message"><?php echo $error; ?></p>
      <?php endif; ?>

      <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" class="btn btn-primary">Masuk</button>
      </form>
    </div>
  </main>

  <footer class="footer">
    <p>&copy; 2025 Sistem Informasi Jadwal Mata Kuliah</p>
  </footer>

</body>
</html>
