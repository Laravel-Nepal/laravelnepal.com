<a
    href="<?php echo e(route('page.tips.view', $tip)); ?>"
    wire:navigate.hover
    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        $class,
        "group/item border-b border-white/20 last:border-0 last:pb-0",
    ]); ?>"
>
    <p class="text-[10px] text-neutral-300 font-mono block mb-2">
        <?php echo e($tip->author->name); ?> &middot; <?php echo e($tip->date->format('M d, Y')); ?> &middot; <?php echo e($tip->minutes_read_text); ?>

    </p>
    <h3 class="font-bold text-lg leading-tight group-hover/item:text-laravel-red transition">
        <?php echo e($tip->title); ?>

    </h3>
</a>
<?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/resources/views/components/shared/simple-tip.blade.php ENDPATH**/ ?>