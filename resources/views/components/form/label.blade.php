@props(['name', 'class' => null])

<label class="form-label text-capitalize {{ $class }}"
       for="{{ $name }}"
>
    {{ $name }}
</label>
