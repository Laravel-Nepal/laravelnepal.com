import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const dock = document.getElementById('dock');
    const footer = document.getElementById('footer');

    const observer = new IntersectionObserver(
        ([entry]) => {
            dock.classList.toggle('is-docked', entry.isIntersecting);

            if (entry.isIntersecting && window.Alpine) {
                const alpineData = Alpine.$data(dock);
                if(alpineData) alpineData.open = false;
            }
        },
        { threshold: 0 }
    );

    observer.observe(footer);
});
