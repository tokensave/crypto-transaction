@props([
    'name' => '',
     'type' => 'text',
     'value' => ''
     ])

<input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" {{ $attributes }} class="bg-transparent border-none text-white w-full"
       placeholder="Введите курс">

<x-form.error name="{{ $name }}"/>
