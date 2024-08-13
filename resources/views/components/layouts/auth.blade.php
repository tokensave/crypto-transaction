<x-layouts.base>
    <div class="dark:bg-slate-900 flex min-h-screen flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="dark:text-white mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                {{ $title }}
            </h2>
        </div>
        <div class="dark:bg-slate-900 mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
            {{ $slot }}

            @isset($crosslink)
                <div class="p-4 text-center text-sm text-gray-500">
                    {{ $crosslink }}
                </div>
            @endisset
        </div>
    </div>
    </div>
</x-layouts.base>
