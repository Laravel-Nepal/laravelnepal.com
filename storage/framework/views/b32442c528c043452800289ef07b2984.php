<div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
    "group",
    "flex flex-col gap-4 w-full",
    "justify-center items-center",
    $class ?? '',
]); ?>">
    <div class="flex flex-row gap-4 w-full items-between justify-center mb-6">
        <div class="section-title w-full"><?php echo $title; ?></div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($linkUrl) && isset($linkLabel)): ?>
            <a
                href="<?php echo e($linkUrl); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    "group/link",
                    "inline-flex",
                    "text-neutral-50",
                    "font-bold text-lg",
                    "leading-tight",
                    "underline-offset-4",
                    "hover:underline-laravel-red",
                    "hover:underline hover:text-laravel-red",
                    "transition-all",
                    "text-nowrap"
                ]); ?>"
            >
                <?php echo e($linkLabel); ?>

            </a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <?php echo e($slot); ?>

</div>
<?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/resources/views/components/layouts/section.blade.php ENDPATH**/ ?>