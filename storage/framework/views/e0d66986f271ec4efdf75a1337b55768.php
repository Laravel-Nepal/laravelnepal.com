<a
    href="<?php echo e(route('page.post.view', $post)); ?>"
    wire:navigate.hover
    class="block group relative rounded-4xl overflow-hidden aspect-video glass w-full"
>
    <div class="absolute inset-0 bg-linear-to-tr from-laravel-red/10 group-hover:from-laravel-red/20 to-transparent"></div>
    <div class="absolute bottom-0 left-0 p-8 md:p-12">
        <div class="text-neutral-400 text-xs font-mono uppercase tracking-widest mb-4">
            <?php echo e($post->date->format('M d, Y')); ?>

        </div>
        <div
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                "flex justify-start items-center flex-wrap gap-4 h-full mb-4"
            ]); ?>"
        >
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="badge">
                    <?php echo e(ucwords($tag)); ?>

                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <h2 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold leading-tight mb-4 group-hover:underline decoration-laravel-red decoration-2 underline-offset-8">
            <?php echo e($post->title); ?>

        </h2>
        <p class="text-zinc-400 text-xs font-bold">
            <?php echo e($post->author->name); ?> &middot; <?php echo e($post->minutes_read_text); ?>

        </p>
    </div>
</a>
<?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/resources/views/components/shared/featured-blog.blade.php ENDPATH**/ ?>