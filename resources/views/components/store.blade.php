@props(['class' => ''])

<button type="submit" class="btn btn-success me-2 {{ $class }}">
    <span wire:loading.remove wire:target="store">Simpan</span>
    <div class="spinner-border spinner-border-sm text-info ms-2" wire:loading wire:target="store" role="status">
        <span class="visually-hidden">Menyimpan...</span>
    </div>
    <span wire:loading wire:target="store">Menyimpan...</span>
</button>
