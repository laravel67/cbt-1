@props(['model' => '', 'index' => ''])
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
@endpush
<div wire:ignore>
    <input id="{{ $model }}" type="hidden" name="{{ $model }}" wire:model.defer="{{ $model }}" required>
    <trix-editor input="{{ $model }}" class="trix-content" id="trix-editor-{{ $index }}"></trix-editor>
</div>

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <script>
        document.addEventListener('trix-change', function(event) {
            const editorId = event.target.getAttribute('id');
            const inputId = event.target.getAttribute('input');
            @this.set(inputId, event.target.value);
        });
    </script>
    @livewireScripts
@endpush