/**
 * LatticeWire — Shared site behavior
 * Loaded on every page. Keep this file framework-free and dependency-free
 * so any page can be dropped into another environment without a build step.
 */

document.addEventListener('DOMContentLoaded', () => {
  initNavToggle();
  initContactForm();
});

/**
 * Mobile navigation toggle.
 * Expects markup:
 *   <button class="c-nav__toggle" aria-expanded="false" aria-controls="primary-nav">Menu</button>
 *   <nav id="primary-nav" class="c-nav"> ... </nav>
 */
function initNavToggle() {
  const toggle = document.querySelector('.c-nav__toggle');
  const nav = document.getElementById('primary-nav');

  if (!toggle || !nav) return;

  toggle.addEventListener('click', () => {
    const isOpen = nav.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', String(isOpen));
    toggle.textContent = isOpen ? 'Close' : 'Menu';
  });

  // Close the mobile menu when a link is chosen.
  nav.querySelectorAll('.c-nav__link').forEach((link) => {
    link.addEventListener('click', () => {
      nav.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
      toggle.textContent = 'Menu';
    });
  });
}

/**
 * Contact form: lightweight client-side validation + submit feedback.
 * This does not send data anywhere on its own — wire the fetch() call
 * to your backend or form provider (e.g. Formspree, HubSpot) where noted.
 */
function initContactForm() {
  const form = document.getElementById('contact-form');
  if (!form) return;

  const statusEl = form.querySelector('.c-form__status');

  form.addEventListener('submit', async (event) => {
    event.preventDefault();

    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    const submitButton = form.querySelector('[type="submit"]');
    const originalLabel = submitButton.textContent;
    submitButton.disabled = true;
    submitButton.textContent = 'Sending…';

    try {
      // TODO: replace with your actual form endpoint.
      // const response = await fetch('/api/contact', {
      //   method: 'POST',
      //   headers: { 'Content-Type': 'application/json' },
      //   body: JSON.stringify(Object.fromEntries(new FormData(form))),
      // });
      // if (!response.ok) throw new Error('Request failed');

      await new Promise((resolve) => setTimeout(resolve, 600)); // demo delay

      if (statusEl) {
        statusEl.textContent = 'Message sent. We respond within one business day.';
        statusEl.hidden = false;
      }
      form.reset();
    } catch (error) {
      if (statusEl) {
        statusEl.textContent = 'Something went wrong. Please email us directly.';
        statusEl.hidden = false;
      }
    } finally {
      submitButton.disabled = false;
      submitButton.textContent = originalLabel;
    }
  });
}
