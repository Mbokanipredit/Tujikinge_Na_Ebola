/**
 * TUJIKINGE NA EBOLA — Frontend Engine
 */

document.addEventListener('DOMContentLoaded', () => {
  initNavbar();
  initLeadRegistrationModal();
  initFaqSearch();
  initFaqAccordions();
  initAudioReader();
  initPhotoViewer();
});

/* Mobile Navigation */
function initNavbar() {
  const mobileToggle = document.getElementById('mobileToggle');
  const navLinks = document.getElementById('navLinks');

  if (mobileToggle && navLinks) {
    mobileToggle.addEventListener('click', () => {
      navLinks.classList.toggle('show');
    });
  }
}

/* Lead Capture Popup Modal (Name & Phone Number) */
function initLeadRegistrationModal() {
  const modal = document.getElementById('userRegistrationModal');
  const form = document.getElementById('leadCaptureForm');

  if (!modal || !form) return;

  // Check sessionStorage so the modal pops up on new site visits/sessions if not submitted
  const isRegisteredSession = sessionStorage.getItem('tujikinge_user_registered');

  if (!isRegisteredSession) {
    setTimeout(() => {
      modal.classList.add('active');
      document.body.style.overflow = 'hidden';
    }, 200);
  }

  // Global helper to open modal on demand if needed
  window.openVisitorModal = function() {
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
  };

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const btn = form.querySelector('button[type="submit"]');
    const originalText = btn.innerHTML;
    btn.disabled = true;
    btn.textContent = "Traitement en cours...";

    const formData = new FormData(form);

    try {
      await fetch('api/user_handler.php', {
        method: 'POST',
        body: formData
      });

      sessionStorage.setItem('tujikinge_user_registered', 'true');
      localStorage.setItem('tujikinge_user_registered', 'true');
      modal.classList.remove('active');
      document.body.style.overflow = 'auto';
    } catch (err) {
      console.error(err);
      sessionStorage.setItem('tujikinge_user_registered', 'true');
      localStorage.setItem('tujikinge_user_registered', 'true');
      modal.classList.remove('active');
      document.body.style.overflow = 'auto';
    } finally {
      btn.disabled = false;
      btn.innerHTML = originalText;
    }
  });
}

/* FAQ Search Filter */
function initFaqSearch() {
  const searchInput = document.getElementById('faqSearchInput');
  const clearBtn = document.getElementById('faqSearchClear');
  const faqCards = document.querySelectorAll('.faq-card');

  function filterFaqs() {
    const query = searchInput ? searchInput.value.toLowerCase().trim() : '';

    if (clearBtn) {
      clearBtn.style.display = query.length > 0 ? 'block' : 'none';
    }

    let visibleCount = 0;

    faqCards.forEach(card => {
      const question = card.querySelector('.faq-question')?.textContent.toLowerCase() || '';
      const answer = card.querySelector('.faq-answer')?.textContent.toLowerCase() || '';

      const matchesQuery = (query === '' || question.includes(query) || answer.includes(query));

      if (matchesQuery) {
        card.style.display = 'block';
        visibleCount++;
      } else {
        card.style.display = 'none';
      }
    });

    const noResultsMsg = document.getElementById('noFaqResults');
    if (noResultsMsg) {
      noResultsMsg.style.display = visibleCount === 0 ? 'block' : 'none';
    }
  }

  if (searchInput) {
    searchInput.addEventListener('input', filterFaqs);
  }

  if (clearBtn) {
    clearBtn.addEventListener('click', () => {
      searchInput.value = '';
      filterFaqs();
      searchInput.focus();
    });
  }
}

/* FAQ Accordion Expansion */
function initFaqAccordions() {
  const faqHeaders = document.querySelectorAll('.faq-header');

  faqHeaders.forEach(header => {
    header.addEventListener('click', () => {
      const card = header.closest('.faq-card');
      const isOpen = card.classList.contains('open');

      document.querySelectorAll('.faq-card.open').forEach(c => {
        if (c !== card) c.classList.remove('open');
      });

      card.classList.toggle('open', !isOpen);
    });
  });
}

/* Text-to-Speech Audio Read-Aloud */
function initAudioReader() {
  const audioBtns = document.querySelectorAll('.btn-audio');

  audioBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      const text = btn.getAttribute('data-audio-text');

      if (!('speechSynthesis' in window)) {
        alert("La lecture vocale n'est pas supportée par votre navigateur.");
        return;
      }

      if (window.speechSynthesis.speaking) {
        window.speechSynthesis.cancel();
        btn.classList.remove('playing');
        btn.querySelector('.btn-audio-txt').textContent = "Écouter l'explication";
        return;
      }

      const utterance = new SpeechSynthesisUtterance(text);
      utterance.lang = 'fr-FR';
      utterance.rate = 0.95;

      utterance.onstart = () => {
        btn.classList.add('playing');
        btn.querySelector('.btn-audio-txt').textContent = "Arrêter la lecture";
      };

      utterance.onend = () => {
        btn.classList.remove('playing');
        btn.querySelector('.btn-audio-txt').textContent = "Écouter l'explication";
      };

      window.speechSynthesis.speak(utterance);
    });
  });
}

/* Clean Photo Viewer Modal (No Action Buttons) */
let currentPhotoId = 1;
const postersDataMap = window.POSTERS_DATA || {};

function initPhotoViewer() {
  const modal = document.getElementById('lightboxModal');
  const closeBtn = document.getElementById('lightboxClose');
  const prevBtn = document.getElementById('lightboxPrev');
  const nextBtn = document.getElementById('lightboxNext');

  if (!modal) return;

  window.openPhotoViewer = function(id) {
    currentPhotoId = parseInt(id, 10);
    updatePhotoViewerContent();
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
  };

  function updatePhotoViewerContent() {
    const item = postersDataMap[currentPhotoId];
    if (!item) return;

    document.getElementById('lightboxImage').src = item.img_full;
    document.getElementById('lightboxTitle').textContent = item.title;
  }

  if (closeBtn) {
    closeBtn.addEventListener('click', () => {
      modal.classList.remove('active');
      document.body.style.overflow = 'auto';
    });
  }

  modal.addEventListener('click', (e) => {
    if (e.target === modal) {
      modal.classList.remove('active');
      document.body.style.overflow = 'auto';
    }
  });

  if (prevBtn) {
    prevBtn.addEventListener('click', () => {
      currentPhotoId = currentPhotoId > 1 ? currentPhotoId - 1 : 10;
      updatePhotoViewerContent();
    });
  }

  if (nextBtn) {
    nextBtn.addEventListener('click', () => {
      currentPhotoId = currentPhotoId < 10 ? currentPhotoId + 1 : 1;
      updatePhotoViewerContent();
    });
  }
}
