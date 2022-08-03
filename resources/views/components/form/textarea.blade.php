@props(['name', 'label' => 'default'])

<x-form.field>
    @if($label != 'none')
        @if($label == 'default')
            <x-form.label name="{{ $name }}"/>
        @else
            <x-form.label name="{{ $label }}"/>
        @endif
    @endif

    <textarea class="form-control"
              name="{{ $name }}"
              id="{{ $name }}"
              required
    >{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}"/>
</x-form.field>
