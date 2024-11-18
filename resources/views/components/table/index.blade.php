{{--<div class="overflow-auto">--}}
{{--    <table class="table-auto w-full text-white border-separate border-spacing-y-2 text-sm">--}}
{{--            {{ $slot }}--}}
{{--    </table>--}}
{{--</div>--}}



<div {{ $attributes->merge(['class' => 'relative overflow-x-auto shadow-md sm:rounded-lg']) }}>
    <table class="w-full text-sm text-left text-gray-500 dark:text-white">
        {{ $slot }}
    </table>
</div>

