<?php
use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;
?>

<div>
    <?php if (isset($component)) { $__componentOriginal3c2f841b7f2c9562ccbff1084bedfdbc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3c2f841b7f2c9562ccbff1084bedfdbc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.shared.back-to-landing-page','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.back-to-landing-page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3c2f841b7f2c9562ccbff1084bedfdbc)): ?>
<?php $attributes = $__attributesOriginal3c2f841b7f2c9562ccbff1084bedfdbc; ?>
<?php unset($__attributesOriginal3c2f841b7f2c9562ccbff1084bedfdbc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3c2f841b7f2c9562ccbff1084bedfdbc)): ?>
<?php $component = $__componentOriginal3c2f841b7f2c9562ccbff1084bedfdbc; ?>
<?php unset($__componentOriginal3c2f841b7f2c9562ccbff1084bedfdbc); ?>
<?php endif; ?>

    <article>
        <header class="mb-16 space-y-8">
            <?php if (isset($component)) { $__componentOriginalefb189834daf46ca2751271f203e2ac9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalefb189834daf46ca2751271f203e2ac9 = $attributes; } ?>
<?php $component = App\View\Components\Shared\BreadCrumb::resolve(['breadCrumb' => $breadCrumb] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.bread-crumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Shared\BreadCrumb::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalefb189834daf46ca2751271f203e2ac9)): ?>
<?php $attributes = $__attributesOriginalefb189834daf46ca2751271f203e2ac9; ?>
<?php unset($__attributesOriginalefb189834daf46ca2751271f203e2ac9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalefb189834daf46ca2751271f203e2ac9)): ?>
<?php $component = $__componentOriginalefb189834daf46ca2751271f203e2ac9; ?>
<?php unset($__componentOriginalefb189834daf46ca2751271f203e2ac9); ?>
<?php endif; ?>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black leading-[0.9] tracking-tighter"><?php echo e($post->title); ?></h1>
            <hr class="border-white/5" />

            <div class="flex items-center gap-6">
                <?php if (isset($component)) { $__componentOriginalff0de1860668395a70502c95667eb446 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalff0de1860668395a70502c95667eb446 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.shared.author-stat','data' => ['author' => $post->author]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.author-stat'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['author' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post->author)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalff0de1860668395a70502c95667eb446)): ?>
<?php $attributes = $__attributesOriginalff0de1860668395a70502c95667eb446; ?>
<?php unset($__attributesOriginalff0de1860668395a70502c95667eb446); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff0de1860668395a70502c95667eb446)): ?>
<?php $component = $__componentOriginalff0de1860668395a70502c95667eb446; ?>
<?php unset($__componentOriginalff0de1860668395a70502c95667eb446); ?>
<?php endif; ?>

                <div class="h-8 w-px bg-white/5"></div>

                <?php if (isset($component)) { $__componentOriginaled1fd19ec86f6127cf3c832c945a5b03 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled1fd19ec86f6127cf3c832c945a5b03 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.shared.header-stat','data' => ['label' => 'Published','value' => $post->date->format('M d, Y')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.header-stat'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Published','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post->date->format('M d, Y'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled1fd19ec86f6127cf3c832c945a5b03)): ?>
<?php $attributes = $__attributesOriginaled1fd19ec86f6127cf3c832c945a5b03; ?>
<?php unset($__attributesOriginaled1fd19ec86f6127cf3c832c945a5b03); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled1fd19ec86f6127cf3c832c945a5b03)): ?>
<?php $component = $__componentOriginaled1fd19ec86f6127cf3c832c945a5b03; ?>
<?php unset($__componentOriginaled1fd19ec86f6127cf3c832c945a5b03); ?>
<?php endif; ?>

                <div class="h-8 w-px bg-white/5"></div>

                <?php if (isset($component)) { $__componentOriginaled1fd19ec86f6127cf3c832c945a5b03 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled1fd19ec86f6127cf3c832c945a5b03 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.shared.header-stat','data' => ['label' => 'Estimated','value' => $post->minutes_read_text]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.header-stat'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Estimated','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post->minutes_read_text)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled1fd19ec86f6127cf3c832c945a5b03)): ?>
<?php $attributes = $__attributesOriginaled1fd19ec86f6127cf3c832c945a5b03; ?>
<?php unset($__attributesOriginaled1fd19ec86f6127cf3c832c945a5b03); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled1fd19ec86f6127cf3c832c945a5b03)): ?>
<?php $component = $__componentOriginaled1fd19ec86f6127cf3c832c945a5b03; ?>
<?php unset($__componentOriginaled1fd19ec86f6127cf3c832c945a5b03); ?>
<?php endif; ?>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-12 gap-y-4">
            <div class="lg:col-span-8">
                <div class="glass py-8 px-6 md:p-12 rounded-[3rem] relative overflow-hidden">
                    <div class="absolute -top-24 -left-24 w-64 h-64 bg-laravel-red/5 blur-[100px] pointer-events-none"></div>

                    <div class="prose prose-invert max-w-none prose-a:text-laravel-red prose-a:font-bold">
                        <?php echo app()->make(\Spatie\LaravelMarkdown\MarkdownRenderer::class)->toHtml($post->content); ?>
                    </div>
                </div>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('shared::comments', ['content' => $post]);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-558044990-0', $__key);

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
            <aside class="lg:col-span-4 space-y-8">
                <div class="sticky top-12 flex flex-col gap-4">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('shared::vote-glass', ['content' => $post]);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-558044990-1', $__key);

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
                    <?php if (isset($component)) { $__componentOriginal086cd2c6c868d9165f49103ad4b47f1b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal086cd2c6c868d9165f49103ad4b47f1b = $attributes; } ?>
<?php $component = App\View\Components\Shared\TagsGlass::resolve(['tags' => $post->tags] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.tags-glass'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Shared\TagsGlass::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal086cd2c6c868d9165f49103ad4b47f1b)): ?>
<?php $attributes = $__attributesOriginal086cd2c6c868d9165f49103ad4b47f1b; ?>
<?php unset($__attributesOriginal086cd2c6c868d9165f49103ad4b47f1b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal086cd2c6c868d9165f49103ad4b47f1b)): ?>
<?php $component = $__componentOriginal086cd2c6c868d9165f49103ad4b47f1b; ?>
<?php unset($__componentOriginal086cd2c6c868d9165f49103ad4b47f1b); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalb78eca1546f9d69b494f948cdda82d83 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb78eca1546f9d69b494f948cdda82d83 = $attributes; } ?>
<?php $component = App\View\Components\Shared\ShareGlass::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.share-glass'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Shared\ShareGlass::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb78eca1546f9d69b494f948cdda82d83)): ?>
<?php $attributes = $__attributesOriginalb78eca1546f9d69b494f948cdda82d83; ?>
<?php unset($__attributesOriginalb78eca1546f9d69b494f948cdda82d83); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb78eca1546f9d69b494f948cdda82d83)): ?>
<?php $component = $__componentOriginalb78eca1546f9d69b494f948cdda82d83; ?>
<?php unset($__componentOriginalb78eca1546f9d69b494f948cdda82d83); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal1948f07c41753131bfff42bc9d93f5bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1948f07c41753131bfff42bc9d93f5bb = $attributes; } ?>
<?php $component = App\View\Components\Shared\SubscribeGlass::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.subscribe-glass'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Shared\SubscribeGlass::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1948f07c41753131bfff42bc9d93f5bb)): ?>
<?php $attributes = $__attributesOriginal1948f07c41753131bfff42bc9d93f5bb; ?>
<?php unset($__attributesOriginal1948f07c41753131bfff42bc9d93f5bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1948f07c41753131bfff42bc9d93f5bb)): ?>
<?php $component = $__componentOriginal1948f07c41753131bfff42bc9d93f5bb; ?>
<?php unset($__componentOriginal1948f07c41753131bfff42bc9d93f5bb); ?>
<?php endif; ?>
                </div>
            </aside>
        </div>
    </article>
</div>

<?php $__env->startPush('seo'); ?>
    <?php echo seo($post); ?>

<?php $__env->stopPush(); ?><?php /**PATH /Users/achyutkneupane/htdocs/laravel12/LaravelNepal/storage/framework/views/livewire/views/dcbe7e0e.blade.php ENDPATH**/ ?>