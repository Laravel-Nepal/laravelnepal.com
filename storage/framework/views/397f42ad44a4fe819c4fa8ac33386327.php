<?php
use App\Models\News;
use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Component;
?>

<div class="grid grid-cols-1 lg:grid-cols-5 gap-4 lg:gap-y-6 lg:gap-x-12 container scroll-mt-24" id="explore">
    <div class="col-span-1 lg:col-span-3 order-1 lg:order-1">
        <?php if (isset($component)) { $__componentOriginal975cb0ee9b50a1f24e0834fcf7d210b7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal975cb0ee9b50a1f24e0834fcf7d210b7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.section','data' => ['title' => 'Blogs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Blogs']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <?php if (isset($component)) { $__componentOriginal7a491de4a057169417336c1d89dccfff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a491de4a057169417336c1d89dccfff = $attributes; } ?>
<?php $component = App\View\Components\Shared\FeaturedBlog::resolve(['post' => $posts->first()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.featured-blog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Shared\FeaturedBlog::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7a491de4a057169417336c1d89dccfff)): ?>
<?php $attributes = $__attributesOriginal7a491de4a057169417336c1d89dccfff; ?>
<?php unset($__attributesOriginal7a491de4a057169417336c1d89dccfff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a491de4a057169417336c1d89dccfff)): ?>
<?php $component = $__componentOriginal7a491de4a057169417336c1d89dccfff; ?>
<?php unset($__componentOriginal7a491de4a057169417336c1d89dccfff); ?>
<?php endif; ?>
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
    <div class="col-span-1 lg:col-span-2 order-3 lg:order-2">
        <?php if (isset($component)) { $__componentOriginal975cb0ee9b50a1f24e0834fcf7d210b7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal975cb0ee9b50a1f24e0834fcf7d210b7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.section','data' => ['title' => 'News']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'News']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <div class="glass rounded-4xl w-full p-6 flex-1 flex flex-col gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal2831d7c4695f5e13510707a6ca5f2c0c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2831d7c4695f5e13510707a6ca5f2c0c = $attributes; } ?>
<?php $component = App\View\Components\Shared\SimpleBlog::resolve(['post' => $newsItem->post] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <p class="text-center text-neutral-500 col-span-full">No news available.</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
<?php endif; ?>
    </div>
    <div class="col-span-full grid grid-cols-1 lg:grid-cols-3 order-2 lg:order-3 gap-4 lg:gap-6">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $posts->slice(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal4a3cf5b21d25502b7ac0a2a70260f01f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a3cf5b21d25502b7ac0a2a70260f01f = $attributes; } ?>
<?php $component = App\View\Components\Shared\SingleBlog::resolve(['post' => $post] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.single-blog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Shared\SingleBlog::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4a3cf5b21d25502b7ac0a2a70260f01f)): ?>
<?php $attributes = $__attributesOriginal4a3cf5b21d25502b7ac0a2a70260f01f; ?>
<?php unset($__attributesOriginal4a3cf5b21d25502b7ac0a2a70260f01f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a3cf5b21d25502b7ac0a2a70260f01f)): ?>
<?php $component = $__componentOriginal4a3cf5b21d25502b7ac0a2a70260f01f; ?>
<?php unset($__componentOriginal4a3cf5b21d25502b7ac0a2a70260f01f); ?>
<?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</div><?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/storage/framework/views/livewire/views/e5cf635f.blade.php ENDPATH**/ ?>