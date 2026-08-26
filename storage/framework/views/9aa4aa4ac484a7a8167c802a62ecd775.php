<?php ($settings = resolve(App\Settings\SiteSettings::class)); ?>

<footer class="py-20 border-t border-white/5 text-center mt-20" id="footer">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($settings->logo): ?>
        <img
            src="<?php echo e(asset('/storage/'.$settings->logo)); ?>"
            alt="<?php echo e($settings->name); ?> Logo"
            class="p-1 object-cover w-24 h-24 mb-4 mx-auto"
        />
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <a href="<?php echo e(route('page.landingPage')); ?>" wire:navigate.hover class="text-neutral-300 uppercase tracking-[0.4em]">
        <?php echo e($settings->name); ?>

    </a>
    <div
        class="prose prose-invert max-w-2xl prose-a:text-laravel-red prose-a:font-bold mx-auto text-sm text-neutral-400 px-6 mt-8 uppercase leading-loose">
        <?php echo app()->make(\Spatie\LaravelMarkdown\MarkdownRenderer::class)->toHtml($settings->footer_text); ?>
    </div>
</footer>
<?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/resources/views/components/shared/footer.blade.php ENDPATH**/ ?>