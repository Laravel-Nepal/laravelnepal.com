import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const dock = document.getElementById('dock');
    const footer = document.getElementById('footer');

    const observer = new IntersectionObserver(
        ([entry]) => {
            dock.classList.toggle('is-docked', entry.isIntersecting);
        },
        {
            root: null,
            threshold: 0,
        }
    );

    observer.observe(footer);
});
