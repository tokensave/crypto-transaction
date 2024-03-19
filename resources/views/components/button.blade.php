@props([
    'type' => 'button', // buttons, submit
    'color' => 'indigo', // white
    'to' => '',
])

@if($to)
    <a href="{{ $to }}" {{ $attributes->class([
    'button flex w-full justify-center rounded-md px-3 py-1.5 text-sm font-semibold leading-6 shadow-sm',
    'focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2',
    'bg-indigo-600 hover:bg-indigo-500 text-white focus-visible:outline-indigo-600' => ($color === 'indigo'),
    'bg-white hover:bg-gray-50 text-gray-900 ring-1 ring-inset ring-gray-300' => ($color === 'white'),
]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes }} class="button flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        {{ $slot }}
    </button>
@endif

