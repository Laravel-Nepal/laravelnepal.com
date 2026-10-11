import './bootstrap';

document.addEventListener('alpine:init', () => {
    Alpine.data('nepalClock', () => ({
        nepalTime: '',
        relativeDiff: '',
        updateTime() {
            this.nepalTime = new Date().toLocaleTimeString('en-US', {
                timeZone: 'Asia/Kathmandu',
                hour: '2-digit',
                minute: '2-digit',
                hour12: true,
            });

            this.relativeDiff = this.formatOffset(345 + new Date().getTimezoneOffset());
        },
        formatOffset(diffMinutes) {
            if (diffMinutes === 0) {
                return 'Local Time';
            }

            const abs = Math.abs(diffMinutes);
            const hours = Math.floor(abs / 60);
            const minutes = abs % 60;

            let diff = hours > 0 ? `${hours}h ` : '';
            diff += minutes > 0 ? `${minutes}m ` : '';
            diff += diffMinutes > 0 ? 'ahead' : 'behind';

            return diff;
        },
        init() {
            this.updateTime();

            const msToNextMinute = (60 - new Date().getSeconds()) * 1000;

            setTimeout(() => {
                this.updateTime();
                setInterval(() => this.updateTime(), 60000);
            }, msToNextMinute);
        },
    }));
});

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
