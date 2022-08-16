@props(['name', 'label', 'valid' => null])

<x-form.field>
    @if (isset($label))
        <x-form.label name="{{ $label }}" class="{{$valid}}"/>
    @else
        <x-form.label name="{{ $name }}"/>
    @endif

    <select class="form-select"
            name="{{ $name }}"
           id="{{ $name }}"
        {{ $attributes(['required' => true]) }}>
    {{ $slot }}
    </select>
    <x-form.error name="{{ $name }}"/>
</x-form.field>
