  <!-- Footer Section -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-grid">
        <div>
          <div class="footer-brand">
            <img src="logo2.png" alt="Logo Tujikinge na Ebola" class="footer-logo">
            <h3 class="text-white font-weight-bold"><?php echo htmlspecialchars(txt('campaign_name')); ?></h3>
          </div>
          <p class="text-muted small mb-3">
            <?php echo htmlspecialchars(txt('campaign_desc')); ?>
          </p>
          <div class="footer-tearfund-banner">
            <img src="tearfound.png" alt="Tearfund Logo" style="height: 36px; width: auto; object-fit: contain;">
            <div>
              <strong class="text-white d-block"><?php echo htmlspecialchars(txt('supported_by')); ?></strong>
              <span class="small text-muted"><?php echo htmlspecialchars(txt('footer_tearfund_subtext')); ?></span>
            </div>
          </div>
        </div>

        <div class="footer-links">
          <h4><?php echo htmlspecialchars(txt('footer_nav_title')); ?></h4>
          <ul>
            <li><a href="index"><i class="bi bi-chevron-right me-1"></i> <?php echo htmlspecialchars(txt('nav_home')); ?></a></li>
            <li><a href="faqs"><i class="bi bi-chevron-right me-1"></i> <?php echo htmlspecialchars(txt('nav_faqs')); ?></a></li>
          </ul>
        </div>

        <div>
          <h4 class="text-white mb-3"><?php echo htmlspecialchars(txt('footer_emergency_title')); ?></h4>
          <div class="bg-card p-3 rounded text-start mb-3 border">
            <span class="badge bg-danger mb-2"><?php echo htmlspecialchars(txt('footer_hotline_label')); ?></span>
            <div class="h4 font-weight-bold text-teal mb-1"><i class="bi bi-telephone-fill me-2"></i> 101 / 115</div>
            <p class="small text-muted mb-0"><?php echo htmlspecialchars(txt('footer_hotline_desc')); ?></p>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <p><?php echo htmlspecialchars(txt('copyright')); ?></p>
      </div>
    </div>
  </footer>

  <!-- Floating Emergency Call Button -->
  <div class="floating-fab">
    <a href="tel:101" class="fab-btn" title="<?php echo htmlspecialchars(txt('fab_call_title')); ?>">
      <i class="bi bi-telephone-fill"></i>
    </a>
  </div>

  <!-- Mandatory Lead Capture Popup Modal (Name & Phone) -->
  <div class="registration-modal" id="userRegistrationModal">
    <div class="registration-modal-card">
      <div class="text-center mb-4">
        <img src="logo.png" alt="Tujikinge na Ebola Logo" style="height: 60px; width: auto; margin-bottom: 1rem;">
        <h2 class="h3 font-weight-bold text-main mb-2"><?php echo htmlspecialchars(txt('modal_welcome_title')); ?></h2>
        <p class="text-muted small"><?php echo htmlspecialchars(txt('modal_welcome_desc')); ?></p>
      </div>

      <form id="leadCaptureForm">
        <div class="form-group mb-3">
          <label class="form-label" for="regFullname"><?php echo htmlspecialchars(txt('label_fullname')); ?></label>
          <input type="text" id="regFullname" name="fullname" class="form-control" placeholder="<?php echo htmlspecialchars(txt('ph_fullname')); ?>" required>
        </div>

        <div class="form-group mb-4">
          <label class="form-label" for="regPhone"><?php echo htmlspecialchars(txt('label_phone')); ?></label>
          <input type="tel" id="regPhone" name="phone" class="form-control" placeholder="<?php echo htmlspecialchars(txt('ph_phone')); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary w-100 btn-lg font-weight-bold">
          <?php echo htmlspecialchars(txt('modal_btn_continue')); ?> <i class="bi bi-arrow-right ms-2"></i>
        </button>
      </form>
    </div>
  </div>

  <!-- Clean Photo Viewer Modal (No Download Buttons) -->
  <div class="lightbox-modal" id="lightboxModal">
    <div class="photo-viewer-card">
      <button class="lightbox-close" id="lightboxClose">&times;</button>
      <div class="photo-viewer-img-container">
        <img id="lightboxImage" src="" alt="Photo de sensibilisation">
      </div>
      <div class="photo-viewer-footer">
        <span id="lightboxTitle" class="photo-viewer-caption"><?php echo htmlspecialchars(txt('lightbox_default_title')); ?></span>
        <div class="d-flex gap-2 ms-auto">
          <button class="btn btn-outline btn-sm" id="lightboxPrev"><i class="bi bi-chevron-left me-1"></i> <?php echo htmlspecialchars(txt('btn_prev')); ?></button>
          <button class="btn btn-outline btn-sm" id="lightboxNext"><?php echo htmlspecialchars(txt('btn_next')); ?> <i class="bi bi-chevron-right ms-1"></i></button>
        </div>
      </div>
    </div>
  </div>

  <!-- Pass posters data to JavaScript -->
  <script>
    <?php require_once __DIR__ . '/posters_data.php'; ?>
    window.POSTERS_DATA = <?php echo json_encode($posters_data); ?>;
  </script>

  <!-- Main JavaScript File -->
  <script src="assets/js/main.js"></script>
</body>
</html>
