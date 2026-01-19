<div
    x-data="{
        nepalTime: '',
        relativeDiff: '',
        updateTime() {
            const now = new Date();
            const nowUTC = new Date(now.getTime() + now.getTimezoneOffset() * 60000);

            const nepalOffset = 345;
            const nepalDate = new Date(nowUTC.getTime() + nepalOffset * 60000);

            this.nepalTime = nepalDate.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            });
            this.$refs.time.textContent = this.nepalTime;

            const localOffset = -now.getTimezoneOffset();
            const diffMinutes = nepalOffset - localOffset;

            if (diffMinutes === 0) {
                this.relativeDiff = 'Local Time';
            } else {
                const sign = diffMinutes > 0 ? '+' : '-';
                const absDiff = Math.abs(diffMinutes);
                const hh = Math.floor(absDiff / 60);
                const mm = absDiff % 60;

                let diffStr = hh > 0 ? `${hh}h ` : '';
                diffStr += mm > 0 ? `${mm}m ` : '';
                diffStr += diffMinutes > 0 ? 'ahead' : 'behind';

                this.relativeDiff = `${diffStr}`;
            }

            this.$refs.relativeDiff.textContent = this.relativeDiff;
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
    class="flex flex-col"
>
    <h4 x-ref="time" class="text-3xl font-black mt-1 text-laravel-red leading-none">
        {{ now()->format('h:i A') }}
    </h4>

    <span x-ref="relativeDiff" class="text-[10px] font-mono font-bold text-zinc-500 tracking-widest mt-1 uppercase">
        Local Time
    </span>
</div>
