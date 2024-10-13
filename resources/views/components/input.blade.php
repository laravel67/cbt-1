@props(['type'=>'text','model'=> '', 'ph'=> '' ])
<div class="mb-3">
    <label for="{{ $model }}">
        {{ $slot }}
    </label>
    <input type="{{ $type }}" id="{{ $model }}" name="{{ $model }}" wire:model="{{ $model }}" class="form-control @error($model)
        is-invalid
    @enderror" placeholder="{{ $ph }}" >
    @error($model)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>