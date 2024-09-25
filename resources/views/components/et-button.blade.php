<x-primary-button {{ $attributes->merge(['type' => 'button', 'style' => 'background-color: white !important; color:var(--main-color) !important; font-size:20px !important;', 'class' => 'col-3'])}}>
    {{ $slot }}
</x-primary-button>