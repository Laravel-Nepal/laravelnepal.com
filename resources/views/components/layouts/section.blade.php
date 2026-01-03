<div @class([
    "group",
    "flex flex-col gap-4 w-full",
    "justify-center items-center",
    $class ?? '',
])>
    <div class="flex flex-row gap-4 w-full items-between justify-center mb-6">
        <div class="section-title w-full">{!! $title !!}</div>
        @if(isset($linkUrl) && isset($linkLabel))
            <a
                href="{{ $linkUrl }}"
                @class([
                    "group/link",
                    "inline-flex",
                    "text-neutral-50",
                    "font-bold text-lg",
                    "leading-tight",
                    "underline-offset-4",
                    "hover:underline-laravel-red",
                    "hover:underline hover:text-laravel-red",
                    "transition-all",
                    "text-nowrap"
                ])
            >
                {{ $linkLabel }}
            </a>
        @endif
    </div>
    {{ $slot }}
</div>
