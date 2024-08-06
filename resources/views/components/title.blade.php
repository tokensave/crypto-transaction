<div>
    <h3 class="text-base font-semibold leading-7 text-white">
        {{ $slot }}
    </h3>

    @isset($description)
        <p class="mt-1 max-w-2xl text-sm leading-6 text-white">
            {{ $description }}
        </p>
    @endisset

</div>
