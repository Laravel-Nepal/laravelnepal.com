<?php
use App\Contracts\Contentable;
use App\Models\Comment;
use CyrildeWit\EloquentViewable\Contracts\Visitor;
use Livewire\Attributes\Validate;
use Livewire\Component;
?>

<?php
// Extract directive's "with" parameter (overrides component properties)
$__islandScope = (function($name = null, $token = null, $lazy = false, $defer = false, $always = false, $skip = false, $with = []) {
    return $with;
})(defer: true);
if (!empty($__islandScope)) {
    extract($__islandScope, EXTR_OVERWRITE);
}

// Extract runtime "with" parameter if provided (overrides everything)
if (isset($__runtimeWith) && is_array($__runtimeWith) && !empty($__runtimeWith)) {
    extract($__runtimeWith, EXTR_OVERWRITE);
}
?>

        <?php if (isset($__placeholder)) { ob_start(); } if (isset($__placeholder)): ?>
            <div class="space-y-6">
                <div class="glass p-8 rounded-[2.5rem] animate-pulse">
                    <div class="h-4 bg-white/10 rounded w-1/4 mb-6"></div>
                    <div class="h-3 bg-white/5 rounded w-full mb-3"></div>
                    <div class="h-3 bg-white/5 rounded w-2/3"></div>
                </div>
            </div>
        <?php endif; if (isset($__placeholder)) { echo ob_get_clean(); return; } ?>

        <div class="space-y-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $content->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'comment-'.e($comment->id).''; ?>wire:key="comment-<?php echo e($comment->id); ?>" class="glass p-8 rounded-[2.5rem] flex flex-col sm:flex-row gap-6 relative group transition-all duration-500 hover:border-white/10" wire:transition>

                <div class="flex flex-row sm:flex-col items-center gap-2">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('shared::upvote-content', ['content' => $comment]);

$__keyOuter = $__key ?? null;

$__key = 'vote-'.$comment->id;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3235363210-0', $__key);

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

                <div class="grow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <span class="text-sm font-black <?php echo e($comment->guest?->name ? 'text-white' : 'text-zinc-500 italic'); ?>">
                                <?php echo e($comment->guest?->name ?? 'Anonymous Artisan'); ?>

                            </span>
                            <span class="text-[10px] text-zinc-600 font-bold uppercase tracking-tighter">
                                <?php echo e($comment->created_at->diffForHumans()); ?>

                            </span>
                        </div>
                    </div>

                    <div class="prose prose-invert max-w-none prose-p:text-zinc-100 prose-p:leading-relaxed">
                        <?php echo app()->make(\Spatie\LaravelMarkdown\MarkdownRenderer::class)->toHtml($comment->content); ?>
                    </div>
                </div>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <div class="glass p-12 rounded-[2.5rem] border border-dashed border-white/5 text-center">
                <p class="text-zinc-500 italic text-sm">No comments yet. Be the first to share your thoughts!</p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/storage/framework/views/livewire/islands/2da37de2-1.blade.php ENDPATH**/ ?>