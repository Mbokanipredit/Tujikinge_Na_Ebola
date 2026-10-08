<?php
$active_page = 'faqs';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/faqs_data.php';
?>

<section style="padding: 3rem 0; background: radial-gradient(circle at top right, rgba(13, 148, 136, 0.08), transparent 50%); border-bottom: 1px solid var(--border-color);">
  <div class="container">
    <div class="section-header">
      <h1 class="section-title"><?php echo htmlspecialchars(txt('faq_page_title')); ?></h1>
      <p class="section-subtitle">
        <?php echo htmlspecialchars(txt('faq_page_subtitle')); ?>
      </p>
    </div>

    <!-- Search Input Hub -->
    <div class="search-filter-hub mb-4" style="max-width: 900px; margin-left: auto; margin-right: auto;">
      <div class="search-box mb-0">
        <i class="bi bi-search search-icon"></i>
        <input type="text" id="faqSearchInput" class="search-input" placeholder="<?php echo htmlspecialchars(txt('search_placeholder')); ?>" autocomplete="off">
        <button id="faqSearchClear" class="search-clear">&times;</button>
      </div>
    </div>

    <!-- No Results Placeholder -->
    <div id="noFaqResults" style="display: none; text-align: center; padding: 4rem 2rem; background: var(--bg-card); border-radius: var(--radius-md); border: 1px solid var(--border-color); max-width: 900px; margin: 0 auto;">
      <i class="bi bi-search-heart text-muted display-3 mb-3"></i>
      <h3><?php echo htmlspecialchars(txt('no_results_title')); ?></h3>
      <p class="text-muted"><?php echo htmlspecialchars(txt('no_results_subtitle')); ?></p>
    </div>

    <!-- All 13 Questions Accordion List -->
    <div class="faq-grid" id="faqContainer" style="max-width: 900px; margin: 0 auto;">
      <?php foreach ($faqs_data as $faq): 
        $q_text = $faq['q'][$current_lang] ?? $faq['q']['fr'];
        $a_text = $faq['a'][$current_lang] ?? $faq['a']['fr'];
      ?>
        <div class="faq-card" id="faq-<?php echo $faq['id']; ?>">
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
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
