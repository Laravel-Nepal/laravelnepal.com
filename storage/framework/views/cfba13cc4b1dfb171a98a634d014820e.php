<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="scroll-smooth">
<head>
    <?php
        use App\Settings\SiteSettings;
        $siteSettings = app(SiteSettings::class);
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($siteSettings->favicon): ?>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('/storage/'.$siteSettings->favicon)); ?>">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(config('app.env') !== 'production'): ?>
        <meta name="robots" content="noindex, nofollow">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php echo $__env->yieldPushContent('seo'); ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        rel="preload"
        as="style"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        onload="this.onload=null;this.rel='stylesheet'"
    >
    <noscript>
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        >
    </noscript>

    <?php echo $siteSettings->header_scripts; ?>


    <?php echo app('Illuminate\Foundation\Vite')(["resources/js/app.js", "resources/css/app.css"]); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="container-xl antialiased bg-[#050505] text-white overflow-x-hidden">
    <?php if (isset($component)) { $__componentOriginal118181215a4a396ffabf05dfaef3fc54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal118181215a4a396ffabf05dfaef3fc54 = $attributes; } ?>
<?php $component = App\View\Components\Shared\Navbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Shared\Navbar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal118181215a4a396ffabf05dfaef3fc54)): ?>
<?php $attributes = $__attributesOriginal118181215a4a396ffabf05dfaef3fc54; ?>
<?php unset($__attributesOriginal118181215a4a396ffabf05dfaef3fc54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal118181215a4a396ffabf05dfaef3fc54)): ?>
<?php $component = $__componentOriginal118181215a4a396ffabf05dfaef3fc54; ?>
<?php unset($__componentOriginal118181215a4a396ffabf05dfaef3fc54); ?>
<?php endif; ?>
    <div class="bg"></div>
    <?php echo e($slot); ?>

    <?php if (isset($component)) { $__componentOriginal72de4ef3cdc643fec6b368f0cddc5016 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal72de4ef3cdc643fec6b368f0cddc5016 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.shared.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal72de4ef3cdc643fec6b368f0cddc5016)): ?>
<?php $attributes = $__attributesOriginal72de4ef3cdc643fec6b368f0cddc5016; ?>
<?php unset($__attributesOriginal72de4ef3cdc643fec6b368f0cddc5016); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal72de4ef3cdc643fec6b368f0cddc5016)): ?>
<?php $component = $__componentOriginal72de4ef3cdc643fec6b368f0cddc5016; ?>
<?php unset($__componentOriginal72de4ef3cdc643fec6b368f0cddc5016); ?>
<?php endif; ?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo $siteSettings->footer_scripts; ?>

</body>
</html>
<?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/resources/views/components/layouts/app.blade.php ENDPATH**/ ?>