<?php
$active_page = 'home';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/faqs_data.php';
require_once __DIR__ . '/includes/posters_data.php';
?>

<!-- SECTION 1: HERO SECTION -->
<section class="hero-section">
  <div class="container">
    <div class="hero-grid">
      <div class="hero-content">
        <h1 class="hero-title"><?php echo htmlspecialchars(txt('hero_title')); ?></h1>
        
        <div class="hero-description">
          <p><?php echo htmlspecialchars(txt('campaign_desc')); ?></p>
        </div>

        <div class="hero-cta">
          <a href="faqs" class="btn btn-primary btn-lg">
            <i class="bi bi-question-circle-fill me-2"></i> <?php echo htmlspecialchars(txt('btn_view_faqs')); ?>
          </a>
          <a href="tel:101" class="btn btn-danger btn-lg">
            <i class="bi bi-telephone-fill me-2"></i> <?php echo htmlspecialchars(txt('btn_emergency_call')); ?>
          </a>
        </div>
      </div>

      <div class="hero-visual">
        <div class="photo-card-stack" onclick="openPhotoViewer(10)" style="cursor: pointer;">
          <img src="10.png" alt="Affiche 10.png Ebola - Guide d'Urgence" class="photo-card-img">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 2: CAMPAIGN PHOTOS SECTION (1.png to 10.png) -->
<section style="padding: 4rem 0; background: var(--bg-card); border-top: 1px solid var(--border-color);">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title"><?php echo htmlspecialchars(txt('sec_photos_title')); ?></h2>
      <p class="section-subtitle">
        <?php echo htmlspecialchars(txt('sec_photos_subtitle')); ?>
      </p>
    </div>

    <!-- Photos Grid: Clean photos with NO buttons underneath -->
    <div class="photos-grid">
      <?php foreach ($posters_data as $id => $p): ?>
        <div class="photo-card" onclick="openPhotoViewer(<?php echo $id; ?>)">
          <div class="photo-img-wrapper">
            <img src="<?php echo htmlspecialchars($p['img_thumb']); ?>" alt="<?php echo htmlspecialchars($p['title']); ?>" loading="lazy">
            <div class="photo-overlay-zoom">
              <i class="bi bi-zoom-in"></i>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- SECTION 3: APERÇU DES QUESTIONS ESSENTIELLES -->
<section style="padding: 4rem 0; background: var(--bg-accent);">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title"><?php echo htmlspecialchars(txt('sec_faq_preview_title')); ?></h2>
      <p class="section-subtitle">
        <?php echo htmlspecialchars(txt('sec_faq_preview_subtitle')); ?>
      </p>
    </div>

    <!-- Preview of 4 main questions -->
    <div class="faq-grid" style="max-width: 900px; margin: 0 auto 2.5rem;">
      <?php 
      $preview_faqs = array_slice($faqs_data, 0, 4);
      foreach ($preview_faqs as $faq):
        $q_text = $faq['q'][$current_lang] ?? $faq['q']['fr'];
        $a_text = $faq['a'][$current_lang] ?? $faq['a']['fr'];
      ?>
        <div class="faq-card">
          <div class="faq-header">
            <div class="faq-title-group">
              <div class="faq-icon-badge">
                <i class="bi bi-<?php echo htmlspecialchars($faq['icon']); ?>"></i>
              </div>
              <h3 class="faq-question"><?php echo htmlspecialchars($q_text); ?></h3>
            </div>
            <i class="bi bi-chevron-down faq-chevron"></i>
          </div>

          <div class="faq-body">
            <div class="faq-answer"><?php echo format_faq_paragraphs($a_text); ?></div>
            <?php if ($current_lang === 'fr'): ?>
              <div class="faq-toolbar">
                <button class="btn-audio" data-audio-text="<?php echo htmlspecialchars($faq['audio']); ?>">
                  <i class="bi bi-volume-up-fill me-1"></i> <span class="btn-audio-txt"><?php echo htmlspecialchars(txt('listen_audio')); ?></span>
                </button>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center">
      <a href="faqs" class="btn btn-primary btn-lg">
        <?php echo htmlspecialchars(txt('btn_view_all_13')); ?> <i class="bi bi-arrow-right ms-2"></i>
      </a>
    </div>
  </div>
</section>

<!-- SECTION 4: POUR PLUS D'INFORMATION (TEARFUND & OMS) -->
<section style="padding: 4rem 0; background: var(--bg-card); border-top: 1px solid var(--border-color);">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title"><?php echo htmlspecialchars(txt('sec_resources_title')); ?></h2>
      <p class="section-subtitle">
        <?php echo htmlspecialchars(txt('sec_resources_subtitle')); ?>
      </p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
      <!-- Tearfund Card -->
      <div style="background: var(--bg-accent); padding: 2rem; border-radius: var(--radius-lg); border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.25rem;">
          <img src="tearfound.png" alt="Tearfund Logo" style="height: 48px; width: auto; object-fit: contain;">
          <div>
            <h3 class="h4 font-weight-bold mb-0">Tearfund</h3>
            <span class="small text-teal font-weight-bold"><?php echo htmlspecialchars(txt('tearfund_role')); ?></span>
          </div>
        </div>
        <p class="text-muted small mb-4">
          <?php echo htmlspecialchars(txt('tearfund_desc')); ?>
        </p>
        <div class="alert alert-light border p-3 rounded mb-0">
          <strong class="d-block text-main mb-1"><i class="bi bi-telephone-fill text-danger me-2"></i> <?php echo htmlspecialchars(txt('emergency_numbers_label')); ?></strong>
          <span class="h4 font-weight-bold text-danger d-block mb-1">101 / 115</span>
          <span class="small text-muted"><?php echo htmlspecialchars(txt('emergency_free_text')); ?></span>
        </div>
      </div>

      <!-- OMS Card -->
      <div style="background: var(--bg-accent); padding: 2rem; border-radius: var(--radius-lg); border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.25rem;">
          <img src="oms.jpeg" alt="OMS Logo" style="height: 48px; width: auto; object-fit: contain; border-radius: 6px;">
          <div>
            <h3 class="h4 font-weight-bold mb-0">OMS</h3>
            <span class="small text-info font-weight-bold"><?php echo htmlspecialchars(txt('oms_role')); ?></span>
          </div>
        </div>
        <p class="text-muted small mb-4">
          <?php echo htmlspecialchars(txt('oms_desc')); ?>
        </p>
        <a href="https://www.afro.who.int/fr/health-topics/ebola-virus-disease/faq-vaccine" target="_blank" rel="noopener noreferrer" class="btn btn-outline w-100 font-weight-bold" style="border-color: #2563eb; color: #2563eb;">
          <i class="bi bi-box-arrow-up-right me-2"></i> <?php echo htmlspecialchars(txt('oms_faq_btn')); ?>
        </a>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
