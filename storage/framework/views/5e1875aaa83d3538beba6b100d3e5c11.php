<a href="<?php echo e(route('page.post.view', $post)); ?>" wire:navigate.hover class="glass p-6 rounded-4xl hover:-translate-y-2 transition-transform group/blog">
    <div class="h-40 bg-zinc-900 rounded-2xl mb-4 overflow-hidden relative">
        <div
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                "flex justify-center items-center flex-wrap gap-x-4 h-full",
                "bg-linear-to-tr from-laravel-red/20 group-hover/blog:from-laravel-red/30 to-transparent"
            ]); ?>"
        >
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="badge">
                    <?php echo e(ucwords($tag)); ?>

                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
    <div class="text-neutral-400 text-xs font-mono uppercase tracking-widest mb-2">
        <?php echo e($post->date->format('M d, Y')); ?>

    </div>
    <h4 class="font-bold text-xl mb-2 group-hover/blog:text-laravel-red transition">
        <?php echo e($post->title); ?>

    </h4>
    <p class="text-zinc-400 text-xs font-bold">
        <?php echo e($post->author->name); ?> &middot; <?php echo e($post->minutes_read_text); ?>

    </p>
</a>
<?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/resources/views/components/shared/single-blog.blade.php ENDPATH**/ ?>