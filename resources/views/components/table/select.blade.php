@props([
    'name' => '',
    'value' => '',
    'placeholder' => '',
    'options' => []
])

<div>
    <select name="{{ $name }}" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6 bg-transparent text-white ">
        @if($placeholder !== '')
            <option value="" disabled selected>{{ $placeholder }}</option>
        @endif
        @foreach($options as $key => $text)
            <option value="{{ $key }}" @selected($key === old($name, $value))>
                {{ $text }}
            </option>
        @endforeach
    </select>

    <x-form.error name="{{ $name }}"></x-form.error>
</div>
