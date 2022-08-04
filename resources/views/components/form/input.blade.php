@props(['name', 'label'])

<x-form.field>
    @if (isset($label))
        <x-form.label name="{{ $label }}"/>
    @else
        <x-form.label name="{{ $name }}"/>
    @endif

    <input class="form-control"
           name="{{ $name }}"
           id="{{ $name }}"
        {{ $attributes(['value' => old($name), 'required' => true]) }}
    >

    <x-form.error name="{{ $name }}"/>
</x-form.field>
