@props(['name'])

@error($name)
<p class="text-warning fs-6 mt-2">{{ $message }}</p>
@enderror
