<div class="glass p-8 rounded-4xl space-y-8">
    <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-neutral-400 mb-6">
        <?php echo e($title ?? 'Share'); ?>

    </h4>
    <div class="flex flex-wrap gap-4">
        <div
            x-data="{
                copied: false,
                copyLink() {
                    navigator.clipboard.writeText('<?php echo e($share->url); ?>');
                    this.copied = true;
                    setTimeout(() => this.copied = false, 2000);
                }
            }"
            class="relative"
        >
            <button
                @click="copyLink"
                class="cursor-pointer transition-all duration-300 group relative"
                aria-label="Copy to Clipboard"
            >
                <?php echo e(svg('fas-link', 'text-white group-hover:text-laravel-red w-6 h-6')); ?>


                <span
                    x-show="copied"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    class="absolute -top-10 left-1/2 -translate-x-1/2 bg-laravel-red text-white text-[9px] font-black px-2 py-1 rounded-md tracking-widest uppercase pointer-events-none"
                    style="display: none;"
                >
                    Copied!
                </span>
            </button>
        </div>
        <a href="<?php echo e($share->gmail()); ?>" target="_blank" alt="Share via Gmail">
            <?php echo e(svg('fab-google', 'text-white hover:text-laravel-red w-6 h-6')); ?>

        </a>
        <a href="<?php echo e($share->linkedin()); ?>" target="_blank" alt="Share via LinkedIn">
            <?php echo e(svg('fab-linkedin', 'text-white hover:text-laravel-red w-6 h-6')); ?>

        </a>
        <a href="<?php echo e($share->facebook()); ?>" target="_blank" alt="Share via Facebook">
            <?php echo e(svg('fab-facebook-f', 'text-white hover:text-laravel-red w-6 h-6')); ?>

        </a>
        <a href="<?php echo e($share->twitter()); ?>" target="_blank" alt="Share via X (Twitter)">
            <?php echo e(svg('fab-x-twitter', 'text-white hover:text-laravel-red w-6 h-6')); ?>

        </a>
        <a href="<?php echo e($share->whatsapp()); ?>" target="_blank" alt="Share via WhatsApp">
            <?php echo e(svg('fab-whatsapp', 'text-white hover:text-laravel-red w-6 h-6')); ?>

        </a>
        <a href="<?php echo e($share->viber()); ?>" target="_blank" alt="Share via Viber">
            <?php echo e(svg('fab-viber', 'text-white hover:text-laravel-red w-6 h-6')); ?>

        </a>
        <a href="<?php echo e($share->reddit()); ?>" target="_blank" alt="Share via Reddit">
            <?php echo e(svg('fab-reddit', 'text-white hover:text-laravel-red w-6 h-6')); ?>

        </a>
        <a href="<?php echo e($share->telegram()); ?>" target="_blank" alt="Share via Telegram">
            <?php echo e(svg('fab-telegram', 'text-white hover:text-laravel-red w-6 h-6')); ?>

        </a>
    </div>
</div>
<?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/resources/views/components/shared/share-glass.blade.php ENDPATH**/ ?>