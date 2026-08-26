<?php
use App\Contracts\Contentable;
use App\Models\Comment;
use CyrildeWit\EloquentViewable\Contracts\Visitor;
use Livewire\Attributes\Validate;
use Livewire\Component;
?>

<section class="mt-16 space-y-12">
    <div class="flex items-center justify-between border-b border-white/5 pb-6">
        <h2 class="text-3xl font-black flex items-center gap-3">
            Comments
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($content->total_comments > 0): ?>
                <span class="text-xs font-mono text-laravel-red bg-laravel-red/10 border border-laravel-red/20 px-3 py-1 rounded-full">
                    <?php echo e($content->total_comments); ?>

                </span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </h2>
    </div>

    <div
        class="glass p-8 rounded-[2.5rem] relative overflow-hidden group border border-white/5 focus-within:border-laravel-red/30 transition-all duration-500"
    >
        <form wire:submit="addComment" class="relative z-10 space-y-5">
            <div class="grow">
                <label class="block text-[10px] font-mono text-zinc-500 uppercase tracking-widest mb-2 ml-1">
                    Display Name <span class="text-zinc-700 italic">(Optional)</span>
                </label>
                <input
                    type="text"
                    placeholder="Anonymous Artisan"
                    wire:model="name"
                    class="w-full bg-black/40 border border-white/5 rounded-2xl px-5 py-3 text-sm text-zinc-300 focus:outline-none focus:border-laravel-red/50 focus:ring-1 focus:ring-laravel-red/20 transition-all"
                >
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[10px] font-bold text-laravel-red mt-2 ml-1 uppercase tracking-tight"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div>
                <label class="block text-[10px] font-mono text-zinc-500 uppercase tracking-widest mb-2 ml-1">
                    Your Thought
                </label>
                <textarea
                    placeholder="Share your feedback or ask a question..."
                    wire:model="message"
                    class="w-full bg-black/40 border border-white/5 rounded-3xl px-5 py-4 text-sm text-zinc-300 focus:outline-none focus:border-laravel-red/50 focus:ring-1 focus:ring-laravel-red/20 transition-all min-h-32 resize-none"
                ></textarea>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[10px] font-bold text-laravel-red mt-2 ml-1 uppercase tracking-tight"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="flex items-center justify-between pt-2">
                <div class="flex items-center gap-2">
                    <div class="w-1.5 h-1.5 rounded-full bg-green-500 shadow-[0_0_8px_rgba(34,197,94,0.4)]"></div>
                    <span class="text-[10px] font-mono text-zinc-500 uppercase tracking-tight">Markdown Enabled</span>
                </div>

                <button type="submit" wire:loading.attr="disabled" class="button-red small px-10 py-3 rounded-xl font-bold text-xs active:scale-95 disabled:opacity-50 transition-all">
                    <span wire:loading.remove wire:target="addComment">Post Comment</span>
                    <span wire:loading wire:target="addComment">Posting...</span>
                </button>
            </div>
        </form>
    </div>

    <?php if (isset($__livewire)) echo $__livewire->renderIslandDirective(defer: true, token: '2da37de2-1'); ?>
</section><?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/storage/framework/views/livewire/views/318099c0.blade.php ENDPATH**/ ?>