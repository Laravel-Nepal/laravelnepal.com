<a
    href="<?php echo e(route('page.post.view', $post)); ?>"
    wire:navigate.hover
    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        $class,
        "group/item border-b border-white/20 pb-4 last:border-0 last:pb-0",
    ]); ?>"
>
    <p class="text-[10px] text-neutral-300 font-mono block mb-2">
        <?php echo e($post->author->name); ?> &middot; <?php echo e($post->date->format('M d, Y')); ?> &middot; <?php echo e($post->minutes_read_text); ?>

    </p>
    <h3 class="font-bold text-lg leading-tight group-hover/item:text-laravel-red transition">
        <?php echo e($post->title); ?>

    </h3>
</a>
<?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/resources/views/components/shared/simple-blog.blade.php ENDPATH**/ ?>