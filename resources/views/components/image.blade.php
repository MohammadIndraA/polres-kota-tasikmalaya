<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
</div>@props([
    'name' => '',
    'label' => '',
    'existingFile' => null,
    'required' => false,
    'class' => 'filepond h-56',
    'accept' => 'image/png, image/jpeg, image/gif, image/webp, image/jpg',
])

<div class="w-full h-56 mx-auto mb-4">
    @if ($label)
        <label for="{{ $name }}" class="font-medium text-sm text-slate-600 dark:text-slate-400">
            {{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <input type="file" {{ $attributes->merge(['class' => $class]) }} name="{{ $name }}"
        accept="{{ $accept }}" @if ($required) required @endif
        @if ($existingFile) data-existing-file="{{ $existingFile }}" @endif />

    @error($name)
        <div class="text-red-500 text-sm mt-1">
            {{ $message }}
        </div>
    @enderror
</div>
