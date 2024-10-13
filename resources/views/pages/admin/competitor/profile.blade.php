<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Profile</h6>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="item">
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded-circle mx-auto mb-4" src="{{ $imageOld ? asset('storage/' . $imageOld) : asset('img/testimonial-1.jpg') }}" alt="{{ $name ?? 'Competitor' }}" style="width: 200px; height: 200px;">
                        <h5 class="mb-1">{{ $name ?? 'Nama Tidak Tersedia' }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item bg-transparent"><strong>NISN:</strong> {{ $nisn ?? '-' }}</li>
                    <li class="list-group-item bg-transparent"><strong>Olimpiade Sains Tingkat: </strong> {{ $tier_name ?? '-' }}</li>
                    <li class="list-group-item bg-transparent"><strong>Umur:</strong> {{ $old ?? '-' }} Tahun</li>
                    <li class="list-group-item bg-transparent"><strong>Tanggal Lahir:</strong> {{ $birthday ? \Carbon\Carbon::parse($birthday)->format('d M Y') : '-' }}</li>
                    <li class="list-group-item bg-transparent"><strong>Asal Sekolah:</strong> {{ $name_schools ?? '-' }}</li>
                    <li class="list-group-item bg-transparent"><strong>Email:</strong> {{ $email ?? '-' }}</li>
                </ul>
                <x-btn-act href="{{ route('competitorIndex') }}" color="secondary">Kembali</x-btn-act>
                <x-btn-act wire:click="openForm">Lengkapi Data</x-btn-act>
            </div>
        </div>
        @if ($isOpenForm)
        <form wire:submit.prevent="save" class="my-5">
            <x-input type="text" model='name'>Nama</x-input>
            <x-input type="number" model='nisn'>NISN</x-input>
            <x-input-select model="tier_id" :options="$tiers">Tingkat</x-input-select>
            <x-input type="date" model='birthday'>Tanggal Lahir</x-input>
            <x-input type="number" model='old'>Umur</x-input>
            <x-input type="text" model='name_schools'>Asal Sekolah</x-input>
            <x-input type="file" model='image'>Foto</x-input>
            <div class="text-end mb-3">
                <x-btn-act color="danger" wire:click="closeForm">Batal</x-btn-act>
                <x-submit text="Simpan" load="Menyimpan..." target="save"/>
            </div>
            @if ($image)
                 <img src="{{ $image->temporaryUrl() }}" width="200px">
            @elseif ($imageOld)
                <img src="{{ asset('storage/' . $imageOld) }}" width="200px">
            @endif
        </form>
        @endif
    </div>
</div>
