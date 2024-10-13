<div class="col-sm-12 col-xl-6">
    <div class="bg-light rounded h-100 p-4">
        <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
            <h6 class="mb-4">
                @if ($isEditing)
                    Ubah Tingkat
                @else
                    Tambah Tingkat
                @endif
            </h6>
            <x-input type="text" model="name" ph="Nama Tingkat">Nama Tingkat</x-input>
            <div class="text-end">
                <x-btn-act color="danger" model="cancel">Batal</x-btn-act>
                @if ($isEditing)
                    <x-update/>          
                @else
                    <x-store/> 
                @endif
            </div>
        </form>
    </div>
</div> 
