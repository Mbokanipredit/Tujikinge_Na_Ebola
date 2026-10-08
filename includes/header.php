<?php
require_once __DIR__ . '/translations.php';
$active_page = $active_page ?? 'home';
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($current_lang); ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars(txt('site_title')); ?></title>
  
  <meta name="description" content="<?php echo htmlspecialchars(txt('campaign_desc')); ?>">
  <meta name="keywords" content="Ebola, Tujikinge na Ebola, Sensibilisation, Prévention, Symptômes, RDC, Tearfund, FAQ Ebola">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="logo2.png">

  <!-- Google Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <!-- Top Emergency Alert Ribbon -->
  <div class="top-alert-bar">
    <div class="container">
      <div class="top-alert-content">
        <div class="top-alert-left">
          <span class="top-alert-badge"><i class="bi bi-shield-exclamation me-1"></i> <?php echo htmlspecialchars(txt('vigilance_sanitaire')); ?></span>
          <span class="top-alert-desc"><?php echo htmlspecialchars(txt('emergency_banner_title')); ?></span>
        </div>
        <div class="top-alert-right">
          <a href="tel:101" class="top-alert-phone">
            <i class="bi bi-telephone-fill me-1"></i> <span><?php echo htmlspecialchars(txt('emergency_call')); ?></span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Header & Navigation -->
  <header class="site-header">
    <div class="container">
      <nav class="navbar">
        <a href="index" class="navbar-brand">
          <img src="logo.png" alt="Tujikinge na Ebola Logo" class="brand-logo">
          <div class="brand-text-wrapper">
            <span class="brand-title"><?php echo htmlspecialchars(txt('campaign_name')); ?></span>
            <span class="brand-subtitle"><?php echo htmlspecialchars(txt('tagline')); ?></span>
          </div>
        </a>

        <!-- Navigation Links -->
        <ul class="nav-links" id="navLinks">
          <li>
            <a href="index" class="nav-link <?php echo $active_page === 'home' ? 'active' : ''; ?>">
              <i class="bi bi-house-door me-1"></i> <?php echo htmlspecialchars(txt('nav_home')); ?>
            </a>
          </li>
          <li>
            <a href="faqs" class="nav-link <?php echo $active_page === 'faqs' ? 'active' : ''; ?>">
              <i class="bi bi-question-circle me-1"></i> <?php echo htmlspecialchars(txt('nav_faqs')); ?>
            </a>
          </li>
        </ul>

        <div class="nav-actions">
          <!-- Language Selector -->
          <form method="GET" action="" style="margin: 0;">
            <?php foreach($_GET as $k => $v): if($k !== 'lang'): ?>
              <input type="hidden" name="<?php echo htmlspecialchars($k); ?>" value="<?php echo htmlspecialchars($v); ?>">
            <?php endif; endforeach; ?>
            <select name="lang" class="lang-select" onchange="this.form.submit()">
              <option value="fr" <?php echo $current_lang === 'fr' ? 'selected' : ''; ?>>🇫🇷 FR</option>
              <option value="sw" <?php echo $current_lang === 'sw' ? 'selected' : ''; ?>>🇨🇩 SW</option>
              <option value="ln" <?php echo $current_lang === 'ln' ? 'selected' : ''; ?>>🇨🇩 LN</option>
            </select>
          </form>

          <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle Navigation">
            <i class="bi bi-list"></i>
          </button>
        </div>
      </nav>
    </div>
  </header>
