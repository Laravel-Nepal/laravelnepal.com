<?php
use Livewire\Attributes\Modelable;
use Livewire\Component;
?>

<div class="glass p-8 rounded-4xl space-y-8">
    <div>
        <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-neutral-400 mb-6">Filter by <?php echo e($label); ?></h4>
        <div class="flex flex-col gap-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $arrayValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arrayValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <label class="flex items-center group cursor-pointer" <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'array-value-'.e($arrayValue['value']).''; ?>wire:key="array-value-<?php echo e($arrayValue['value']); ?>">
                    <div class="relative flex items-center">
                        <input
                            type="checkbox"
                            wire:model="value"
                            value="<?php echo e($arrayValue['value']); ?>"
                            class="peer appearance-none w-5 h-5 rounded-md border border-white/10 bg-white/5 checked:bg-laravel-red checked:border-laravel-red transition-all cursor-pointer"
                        >
                        <svg class="absolute w-3 h-3 text-white opacity-0 peer-checked:opacity-100 left-1 transition-opacity pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span class="ml-3 text-sm text-zinc-400 group-hover:text-zinc-200 transition-colors uppercase font-bold tracking-tight">
                        <?php echo e($arrayValue['value']); ?>

                    </span>
                    <span class="ml-auto text-xs font-mono text-zinc-500 group-hover:text-laravel-red transition-colors">
                        (<?php echo e($arrayValue['bracketValue']); ?>)
                    </span>
                </label>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
</div><?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/storage/framework/views/livewire/views/fe8ab318.blade.php ENDPATH**/ ?>