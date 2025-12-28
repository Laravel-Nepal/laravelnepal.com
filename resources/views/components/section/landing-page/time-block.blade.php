<h4
    x-data="{
        time: '',
        updateTime() {
            const now = new Date();
            this.time = now.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            });
        },
        init() {
            this.updateTime();

            const msToNextMinute = (60 - new Date().getSeconds()) * 1000;

            setTimeout(() => {
                this.updateTime();
                setInterval(() => this.updateTime(), 60000);
            }, msToNextMinute);
        }
    }"
    x-text="time"
    class="text-3xl font-black mt-1 text-laravel-red"
>
    {{ now()->format('h:i A') }}
</h4>
