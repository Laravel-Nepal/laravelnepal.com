<section class="relative min-h-screen flex items-center justify-center px-6 pt-10 mb-10 lg:mb-0">
    <div class="container grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-7 space-y-8 animate__animated animate__fadeInLeft">
            <h1 class="text-4xl md:text-5xl font-black leading-none">
                Join Laravel Nepal.<br/>
                <span class="text-laravel-red">The Open Community</span> <br />
                <span>for Laravel Developers</span>
            </h1>

            <p class="text-zinc-400 text-lg max-w-xl leading-relaxed">
                A collaborative space for Laravel enthusiasts to share knowledge, build projects, and grow together in Nepal's thriving tech community.
            </p>

            <div class="flex flex-wrap gap-4 pt-4">
                <a class="button-red" href="https://github.com/Laravel-Nepal/contents" target="_blank" rel="noopener">
                    Join Community
                </a>
                <a class="button-outlined" href="#explore">
                    Explore
                </a>
            </div>
        </div>
        <?php if (isset($component)) { $__componentOriginal5d16a18424da207cfd184fdb955ea719 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5d16a18424da207cfd184fdb955ea719 = $attributes; } ?>
<?php $component = App\View\Components\Section\LandingPage\HeroSectionRight::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section.landing-page.hero-section-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Section\LandingPage\HeroSectionRight::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5d16a18424da207cfd184fdb955ea719)): ?>
<?php $attributes = $__attributesOriginal5d16a18424da207cfd184fdb955ea719; ?>
<?php unset($__attributesOriginal5d16a18424da207cfd184fdb955ea719); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5d16a18424da207cfd184fdb955ea719)): ?>
<?php $component = $__componentOriginal5d16a18424da207cfd184fdb955ea719; ?>
<?php unset($__componentOriginal5d16a18424da207cfd184fdb955ea719); ?>
<?php endif; ?>
    </div>
</section>

<?php $__env->startPush('styles'); ?>
    <link
        rel="preload"
        as="style"
        href="//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        onload="this.onload=null;this.rel='stylesheet'">

    <noscript>
        <link
            rel="stylesheet"
            href="//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        >
    </noscript>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/resources/views/components/section/landing-page/hero-section.blade.php ENDPATH**/ ?>