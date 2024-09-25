@props(['value'])

<label {{ $attributes->merge(['style' => 'font-family:"Fredoka"', 'class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
