<?php
use App\Models\Tip;
use Illuminate\Support\Collection;
use Livewire\Component;
?>

<?php if (isset($component)) { $__componentOriginal975cb0ee9b50a1f24e0834fcf7d210b7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal975cb0ee9b50a1f24e0834fcf7d210b7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.section','data' => ['title' => 'Tips','class' => 'container mt-18']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Tips','class' => 'container mt-18']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="grid grid-cols-1 lg:grid-cols-3 order-2 lg:order-3 gap-4 lg:gap-6 w-full">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $tips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal5d2b744484bbd1a9c2a15da0c1fe50eb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5d2b744484bbd1a9c2a15da0c1fe50eb = $attributes; } ?>
<?php $component = App\View\Components\Shared\TipComponent::resolve(['tip' => $tip] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.tip-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Shared\TipComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5d2b744484bbd1a9c2a15da0c1fe50eb)): ?>
<?php $attributes = $__attributesOriginal5d2b744484bbd1a9c2a15da0c1fe50eb; ?>
<?php unset($__attributesOriginal5d2b744484bbd1a9c2a15da0c1fe50eb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5d2b744484bbd1a9c2a15da0c1fe50eb)): ?>
<?php $component = $__componentOriginal5d2b744484bbd1a9c2a15da0c1fe50eb; ?>
<?php unset($__componentOriginal5d2b744484bbd1a9c2a15da0c1fe50eb); ?>
<?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal975cb0ee9b50a1f24e0834fcf7d210b7)): ?>
<?php $attributes = $__attributesOriginal975cb0ee9b50a1f24e0834fcf7d210b7; ?>
<?php unset($__attributesOriginal975cb0ee9b50a1f24e0834fcf7d210b7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal975cb0ee9b50a1f24e0834fcf7d210b7)): ?>
<?php $component = $__componentOriginal975cb0ee9b50a1f24e0834fcf7d210b7; ?>
<?php unset($__componentOriginal975cb0ee9b50a1f24e0834fcf7d210b7); ?>
<?php endif; ?><?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/storage/framework/views/livewire/views/62e87463.blade.php ENDPATH**/ ?>