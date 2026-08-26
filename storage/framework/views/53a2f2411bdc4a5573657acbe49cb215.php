<a href="<?php echo e(route('page.artisan.view', $author)); ?>" wire:navigate.hover class="flex items-center gap-3 group/artisan">
    <div class="relative">
        <div
            class="absolute inset-0 bg-laravel-red/20 blur-md rounded-full opacity-0 group-hover/artisan:opacity-100 transition-opacity"></div>
        <img
            alt="<?php echo e($author->name); ?>"
            class="relative w-10 h-10 rounded-full border border-laravel-red/20 group-hover/artisan:border-laravel-red/50 transition-all object-cover"
            src="<?php echo e($author->avatar); ?>"
        />
    </div>
    <div>
        <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest leading-none">Artisan</p>
        <p class="text-sm font-bold mt-1 group-hover/artisan:text-laravel-red transition-colors">
            <?php echo e($author->name); ?>

        </p>
    </div>
</a>
<?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/resources/views/components/shared/author-stat.blade.php ENDPATH**/ ?>