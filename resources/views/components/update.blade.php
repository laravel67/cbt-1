@props(['class' => ''])

<button type="submit" class="btn btn-success me-2 {{ $class }}">
    <span wire:loading.remove wire:target="update">Ubah</span>
    <div class="spinner-border spinner-border-sm text-info ms-2" wire:loading wire:target="update" role="status">
        <span class="visually-hidden">Mengubah...</span>
    </div>
    <span wire:loading wire:target="update">Mengubah...</span>
</button>
