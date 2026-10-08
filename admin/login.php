<?php
// ============================================================================
// ADMIN LOGIN CREDENTIALS CONFIGURATION
// Change $admin_user and $admin_pass below to set your custom admin credentials.
// ============================================================================
$admin_user = 'admin';       // Admin Username
$admin_pass = 'ebola2026';   // Admin Password

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect to dashboard if already logged in
if (!empty($_SESSION['admin_logged_in'])) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === $admin_user && $password === $admin_pass) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = "Identifiants incorrects. Veuillez réessayer.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion Administration — TUJIKINGE NA EBOLA</title>
  <link rel="icon" type="image/png" href="../logo2.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    body {
      background: radial-gradient(circle at top right, rgba(13, 148, 136, 0.12), transparent 50%),
                  radial-gradient(circle at bottom left, rgba(15, 23, 42, 0.08), transparent 50%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
    }
    .login-card {
      background: var(--bg-card);
      max-width: 420px;
      width: 100%;
      padding: 2.5rem;
      border-radius: var(--radius-lg);
      border: 1px solid var(--border-color);
      box-shadow: var(--shadow-xl);
    }
    .login-brand {
      text-align: center;
      margin-bottom: 2rem;
    }
    .login-brand img {
      height: 60px;
      margin: 0 auto 1rem;
    }
    .credentials-hint {
      background: var(--bg-accent);
      border: 1px solid var(--border-color);
      border-radius: var(--radius-sm);
      padding: 0.75rem;
      font-size: 0.85rem;
      color: var(--text-muted);
      margin-bottom: 1.5rem;
      text-align: center;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <div class="login-brand">
      <img src="../logo.png" alt="TUJIKINGE NA EBOLA Logo">
      <h1 class="h3 font-weight-bold text-main">Espace Administration</h1>
      <p class="text-muted small">Veuillez vous connecter pour accéder au tableau de bord.</p>
    </div>

    <?php if ($error): ?>
      <div class="alert alert-danger p-3 rounded mb-3 text-center small font-weight-bold" style="background: #fee2e2; color: #b91c1c; border: 1px solid #fca5a5;">
        <i class="bi bi-exclamation-triangle-fill me-1"></i> <?php echo htmlspecialchars($error); ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="login.php">
      <div class="form-group mb-3">
        <label class="form-label" for="username"><i class="bi bi-person me-1"></i> Nom d'utilisateur</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Nom d'utilisateur" required autofocus>
      </div>

      <div class="form-group mb-4">
        <label class="form-label" for="password"><i class="bi bi-lock me-1"></i> Mot de passe</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Entrez le mot de passe" required>
      </div>

      <button type="submit" class="btn btn-primary w-100 btn-lg font-weight-bold">
        <i class="bi bi-box-arrow-in-right me-2"></i> Se Connecter
      </button>
    </form>

    <div class="text-center mt-4">
      <a href="../index.php" class="small text-muted font-weight-bold">
        <i class="bi bi-arrow-left me-1"></i> Retour au site public
      </a>
    </div>
  </div>

</body>
</html>
