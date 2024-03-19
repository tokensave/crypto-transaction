@props(['to' => '#'])
<a href="{{ $to }}" {{ $attributes->class(["text-indigo-600 hover:text-indigo-500"]) }}>
    {{ $slot }}
</a>
