// Update time
function updateTime() {
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    document.getElementById('currentTime').textContent = `${hours}:${minutes}`;
}

updateTime();
setInterval(updateTime, 1000);

// Menu toggle functionality
const menuToggle = document.getElementById('menuToggle');
const hamburger = document.getElementById('hamburger');
const menuOverlay = document.getElementById('menuOverlay');
const body = document.body;

menuToggle.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    menuOverlay.classList.toggle('active');
    body.style.overflow = menuOverlay.classList.contains('active') ? 'hidden' : 'auto';
});

// Close menu when clicking on overlay
menuOverlay.addEventListener('click', (e) => {
    if (e.target === menuOverlay) {
        hamburger.classList.remove('active');
        menuOverlay.classList.remove('active');
        body.style.overflow = 'auto';
    }
});

// Close menu when pressing Escape
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && menuOverlay.classList.contains('active')) {
        hamburger.classList.remove('active');
        menuOverlay.classList.remove('active');
        body.style.overflow = 'auto';
    }
});

// Menu item click handlers
document.querySelectorAll('.menu-nav a, .secondary-menu a').forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        
        // Close menu
        hamburger.classList.remove('active');
        menuOverlay.classList.remove('active');
        body.style.overflow = 'auto';
        
        // Add a small delay for better UX
        setTimeout(() => {
            console.log(`Navigating to: ${link.textContent}`);
            // Navigate to the link's href
            window.location.href = link.href;
        }, 300);
    });
});

// Header scroll effect
let lastScrollTop = 0;
const header = document.querySelector('.header');

window.addEventListener('scroll', () => {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
    if (scrollTop > lastScrollTop && scrollTop > 100) {
        header.style.transform = 'translateY(-100%)';
    } else {
        header.style.transform = 'translateY(0)';
    }
    
    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
});

// Smooth entrance animation on load
window.addEventListener('load', () => {
    document.body.style.opacity = '1';
});
