import './bootstrap';

// Tampilkan / sembunyikan password pada form login.
const toggle = document.getElementById('toggle-password');
const passwordInput = document.getElementById('password');

if (toggle && passwordInput) {
    toggle.addEventListener('click', () => {
        const show = passwordInput.type === 'password';
        passwordInput.type = show ? 'text' : 'password';
        toggle.setAttribute('aria-pressed', String(show));
        toggle.setAttribute('aria-label', show ? 'Sembunyikan password' : 'Tampilkan password');
    });
}
