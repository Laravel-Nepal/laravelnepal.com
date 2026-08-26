<nav class="flex mb-8 text-[10px] font-bold uppercase tracking-widest text-zinc-500" aria-label="Breadcrumb">
    <ol class="flex flex-wrap items-center gap-2">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $breadCrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadCrumbItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$loop->first): ?>
                <li class="flex items-center">
                    <span class="px-2">/</span>
                </li>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <li
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    "flex items-center min-w-0",
                    "text-zinc-300" => $loop->last || !isset($breadCrumbItem['url']),
                ]); ?>"
                <?php if($loop->last): ?> aria-current="page" <?php endif; ?>
            >

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($loop->last || !isset($breadCrumbItem['url'])): ?>
                    <span class="truncate max-w-45 md:max-w-none">
                        <?php echo e($breadCrumbItem['label']); ?>

                    </span>
                <?php else: ?>
                    <a href="<?php echo e($breadCrumbItem['url']); ?>" wire:navigate.hover class="hover:text-laravel-red transition-colors whitespace-nowrap">
                        <?php echo e($breadCrumbItem['label']); ?>

                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </li>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </ol>
</nav>
<?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/resources/views/components/shared/bread-crumb.blade.php ENDPATH**/ ?>