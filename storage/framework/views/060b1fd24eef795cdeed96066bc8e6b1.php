<?php
use App\Models\Author;
use App\Models\Post;
use App\Models\Tip;
use Livewire\Attributes\Computed;
use Livewire\Component;
?>

<div class="lg:col-span-5 relative animate__animated animate__fadeInRight">
    <div class="glass p-8 rounded-[2.5rem] relative z-10 overflow-hidden group">
        <div class="flex justify-between mb-8">
            <div>
                <p class="text-xs text-zinc-500 font-bold uppercase tracking-widest">Artisans</p>
                <p class="text-3xl font-black mt-1">
                    <?php echo e(Number::abbreviate($authors)); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($authors > 1000): ?>+<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </p>
            </div>
            <div class="text-right">
                <p class="text-xs text-zinc-500 font-bold uppercase tracking-widest">Current Time</p>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sections::landing-page.time-block', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-4273420999-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
            </div>
        </div>

        <div class="space-y-4">
            <div class="bg-white/5 rounded-2xl border border-white/5 hover:border-laravel-red/30 transition-all cursor-pointer p-4">
                <?php if (isset($component)) { $__componentOriginal2831d7c4695f5e13510707a6ca5f2c0c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2831d7c4695f5e13510707a6ca5f2c0c = $attributes; } ?>
<?php $component = App\View\Components\Shared\SimpleBlog::resolve(['post' => $post] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.simple-blog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Shared\SimpleBlog::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2831d7c4695f5e13510707a6ca5f2c0c)): ?>
<?php $attributes = $__attributesOriginal2831d7c4695f5e13510707a6ca5f2c0c; ?>
<?php unset($__attributesOriginal2831d7c4695f5e13510707a6ca5f2c0c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2831d7c4695f5e13510707a6ca5f2c0c)): ?>
<?php $component = $__componentOriginal2831d7c4695f5e13510707a6ca5f2c0c; ?>
<?php unset($__componentOriginal2831d7c4695f5e13510707a6ca5f2c0c); ?>
<?php endif; ?>
            </div>
            <div class="bg-white/5 rounded-2xl border border-white/5 hover:border-laravel-red/30 transition-all cursor-pointer p-4">
                <?php if (isset($component)) { $__componentOriginalb20c44a2785a95ac0a368ca6fb4ce2bd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb20c44a2785a95ac0a368ca6fb4ce2bd = $attributes; } ?>
<?php $component = App\View\Components\Shared\SimpleTip::resolve(['tip' => $tip] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.simple-tip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Shared\SimpleTip::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb20c44a2785a95ac0a368ca6fb4ce2bd)): ?>
<?php $attributes = $__attributesOriginalb20c44a2785a95ac0a368ca6fb4ce2bd; ?>
<?php unset($__attributesOriginalb20c44a2785a95ac0a368ca6fb4ce2bd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb20c44a2785a95ac0a368ca6fb4ce2bd)): ?>
<?php $component = $__componentOriginalb20c44a2785a95ac0a368ca6fb4ce2bd; ?>
<?php unset($__componentOriginalb20c44a2785a95ac0a368ca6fb4ce2bd); ?>
<?php endif; ?>
            </div>
        </div>
        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-laravel-red blur-[80px] opacity-20 group-hover:opacity-40 transition-opacity"></div>
    </div>

    <div class="absolute -top-10 -right-5 w-20 h-20 glass rounded-2xl animate-float rotate-12 flex items-center justify-center text-5xl shadow-2xl select-none">
        🇳🇵
    </div>
</div><?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/storage/framework/views/livewire/views/0cc533be.blade.php ENDPATH**/ ?>