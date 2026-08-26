<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sections::landing-page.hero-section', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1214811403-0', $__key);

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
    <?php if (isset($component)) { $__componentOriginal31fc946f6718c9ff1dd5d147ff97c4f1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal31fc946f6718c9ff1dd5d147ff97c4f1 = $attributes; } ?>
<?php $component = App\View\Components\Section\LandingPage\PostsAndNews::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section.landing-page.posts-and-news'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Section\LandingPage\PostsAndNews::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal31fc946f6718c9ff1dd5d147ff97c4f1)): ?>
<?php $attributes = $__attributesOriginal31fc946f6718c9ff1dd5d147ff97c4f1; ?>
<?php unset($__attributesOriginal31fc946f6718c9ff1dd5d147ff97c4f1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal31fc946f6718c9ff1dd5d147ff97c4f1)): ?>
<?php $component = $__componentOriginal31fc946f6718c9ff1dd5d147ff97c4f1; ?>
<?php unset($__componentOriginal31fc946f6718c9ff1dd5d147ff97c4f1); ?>
<?php endif; ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sections::landing-page.tips-list', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1214811403-1', $__key);

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
    <?php if (isset($component)) { $__componentOriginalb059e53111417ac25e7fa8b31970bd3a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb059e53111417ac25e7fa8b31970bd3a = $attributes; } ?>
<?php $component = App\View\Components\Section\LandingPage\ProjectsAndPackages::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section.landing-page.projects-and-packages'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Section\LandingPage\ProjectsAndPackages::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb059e53111417ac25e7fa8b31970bd3a)): ?>
<?php $attributes = $__attributesOriginalb059e53111417ac25e7fa8b31970bd3a; ?>
<?php unset($__attributesOriginalb059e53111417ac25e7fa8b31970bd3a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb059e53111417ac25e7fa8b31970bd3a)): ?>
<?php $component = $__componentOriginalb059e53111417ac25e7fa8b31970bd3a; ?>
<?php unset($__componentOriginalb059e53111417ac25e7fa8b31970bd3a); ?>
<?php endif; ?>
    <?php $__env->startPush('seo'); ?>
        <?php
            $page = \App\Models\Page::whereType(\App\Enums\PageType::LandingPage)->first();
            views($page)->record();
        ?>

        <?php echo seo($page); ?>

    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/resources/views/components/page/landing-page.blade.php ENDPATH**/ ?>