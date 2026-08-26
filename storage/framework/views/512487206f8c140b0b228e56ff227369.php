<div class="container grid grid-cols-1 lg:grid-cols-2 gap-8 mt-18 items-start">
    <?php if (isset($component)) { $__componentOriginal975cb0ee9b50a1f24e0834fcf7d210b7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal975cb0ee9b50a1f24e0834fcf7d210b7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.section','data' => ['title' => 'Projects']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Projects']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalcb01ae2872ff96675184ff073b7fa115 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb01ae2872ff96675184ff073b7fa115 = $attributes; } ?>
<?php $component = App\View\Components\Shared\ProjectComponent::resolve(['project' => $project] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.project-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Shared\ProjectComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcb01ae2872ff96675184ff073b7fa115)): ?>
<?php $attributes = $__attributesOriginalcb01ae2872ff96675184ff073b7fa115; ?>
<?php unset($__attributesOriginalcb01ae2872ff96675184ff073b7fa115); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcb01ae2872ff96675184ff073b7fa115)): ?>
<?php $component = $__componentOriginalcb01ae2872ff96675184ff073b7fa115; ?>
<?php unset($__componentOriginalcb01ae2872ff96675184ff073b7fa115); ?>
<?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal975cb0ee9b50a1f24e0834fcf7d210b7)): ?>
<?php $attributes = $__attributesOriginal975cb0ee9b50a1f24e0834fcf7d210b7; ?>
<?php unset($__attributesOriginal975cb0ee9b50a1f24e0834fcf7d210b7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal975cb0ee9b50a1f24e0834fcf7d210b7)): ?>
<?php $component = $__componentOriginal975cb0ee9b50a1f24e0834fcf7d210b7; ?>
<?php unset($__componentOriginal975cb0ee9b50a1f24e0834fcf7d210b7); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal975cb0ee9b50a1f24e0834fcf7d210b7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal975cb0ee9b50a1f24e0834fcf7d210b7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.section','data' => ['title' => 'Packages']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Packages']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalc7530a14d1db3762d6ade55bed4c3d41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7530a14d1db3762d6ade55bed4c3d41 = $attributes; } ?>
<?php $component = App\View\Components\Shared\PackageComponent::resolve(['package' => $package] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.package-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Shared\PackageComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7530a14d1db3762d6ade55bed4c3d41)): ?>
<?php $attributes = $__attributesOriginalc7530a14d1db3762d6ade55bed4c3d41; ?>
<?php unset($__attributesOriginalc7530a14d1db3762d6ade55bed4c3d41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7530a14d1db3762d6ade55bed4c3d41)): ?>
<?php $component = $__componentOriginalc7530a14d1db3762d6ade55bed4c3d41; ?>
<?php unset($__componentOriginalc7530a14d1db3762d6ade55bed4c3d41); ?>
<?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal975cb0ee9b50a1f24e0834fcf7d210b7)): ?>
<?php $attributes = $__attributesOriginal975cb0ee9b50a1f24e0834fcf7d210b7; ?>
<?php unset($__attributesOriginal975cb0ee9b50a1f24e0834fcf7d210b7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal975cb0ee9b50a1f24e0834fcf7d210b7)): ?>
<?php $component = $__componentOriginal975cb0ee9b50a1f24e0834fcf7d210b7; ?>
<?php unset($__componentOriginal975cb0ee9b50a1f24e0834fcf7d210b7); ?>
<?php endif; ?>
</div>
<?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/resources/views/components/section/landing-page/projects-and-packages.blade.php ENDPATH**/ ?>