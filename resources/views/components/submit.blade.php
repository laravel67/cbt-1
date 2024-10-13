@props(['text' => '', 'load' => '', 'class' => '', 'target' => 'submit'])

<button wire:ignore type="submit" class="btn btn-success me-2 {{ $class }}">
    <span wire:loading.remove wire:target="{{ $target }}">{{ $text }}</span>
    <div class="spinner-border spinner-border-sm text-info ms-2" wire:loading wire:target="{{ $target }}" role="status">
        <span class="visually-hidden">{{ $load }}</span>
    </div>
    <span wire:loading wire:target="{{ $target }}">{{ $load }}</span>
</button>
