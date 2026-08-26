<a
    class="glass p-6 rounded-4xl flex flex-col justify-between group/tip cursor-pointer hover:border-laravel-red/50 transition-all h-full w-full"
    href="<?php echo e(route('page.tips.view', $tip)); ?>"
    wire:navigate.hover
>
    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-laravel-red blur-[80px] opacity-0 group-hover/tip:opacity-30 transition-opacity"></div>
    <div class="flex flex-wrap justify-between items-center mb-6 w-full gap-y-4">
        <div class="text-zinc-500 text-xs font-mono uppercase tracking-widest">
            <?php echo e($tip->date->format('M d, Y')); ?>

        </div>
        <div class="flex flex-wrap justify-end gap-2">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $tip->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <span class="badge">
                    <?php echo e(ucwords($tag)); ?>

                </span>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>

    <div class="flex-1">
        <h3 class="text-xl font-black leading-tight group-hover/tip:text-laravel-red transition-colors line-clamp-3">
            <?php echo e($tip->title); ?>

        </h3>
    </div>

    <div class="flex items-center justify-between mt-8 pt-4 border-t border-white/5 group-hover/tip:border-laravel-red/10">
        <div class="flex items-center gap-2">
            <span class="text-zinc-400 text-xs font-bold">
                <?php echo e($tip->author->name); ?> &middot; <?php echo e($tip->minutes_read_text); ?>

            </span>
        </div>
        <div class="text-[10px] font-black uppercase text-laravel-red group-hover/tip:translate-x-2 transition-transform flex items-center gap-1">
            Read <span>→</span>
        </div>
    </div>
</a>
<?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/resources/views/components/shared/tip-component.blade.php ENDPATH**/ ?>