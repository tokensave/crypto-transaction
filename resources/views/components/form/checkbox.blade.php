@props(['name' => ''])

<label class="form-checkbox flex items-start">
    <input type="checkbox" name="{{ $name }}" value="1" @checked(old($name)) {{ $attributes }} class="ml-0 border-black-900 text-indigo-600 focus:ring-indigo-600 relative top=1">

    <div class=" ml-4 block text-sm leading-4 text-indigo-600 whitespace-nowrap">
        {{ $slot }}

        <x-form.error name="{{ $name }}" />
    </div>
</label>

