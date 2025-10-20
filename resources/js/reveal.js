const SELECTOR_SCOPE = '[data-reveal-scope]';
const SELECTOR_REVEAL = '[data-reveal]';

function applyStagger(scopeEl) {
  const revealables = scopeEl.querySelectorAll(SELECTOR_REVEAL);
  revealables.forEach((el, index) => {
    // only set delay class if not already customized
    if (![...el.classList].some(c => c.startsWith('reveal-delay-'))) {
      const delayIndex = Math.min(index, 5); // cap at 5*80ms
      el.classList.add(`reveal-delay-${delayIndex}`);
    }
    el.classList.add('reveal-init');
  });
}

function observeReveal(root = document) {
  const options = { root: null, rootMargin: '0px 0px -10% 0px', threshold: 0.1 };
  const io = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      const el = entry.target;
      if (entry.isIntersecting) {
        el.classList.add('reveal-in');
        // once revealed, no need to observe further
        io.unobserve(el);
      }
    });
  }, options);

  root.querySelectorAll(SELECTOR_REVEAL).forEach((el) => io.observe(el));
}

function initReveal() {
  const scopes = document.querySelectorAll(SELECTOR_SCOPE);
  scopes.forEach((scope) => {
    applyStagger(scope);
    observeReveal(scope);
  });
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initReveal);
} else {
  initReveal();
}

export {};


