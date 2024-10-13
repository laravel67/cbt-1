<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Detail Peserta</h6>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="item">
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded-circle mx-auto mb-4" src="{{ asset('img/testimonial-1.jpg') }}" alt="{{ $competitor->name }}" style="width: 200px; height: 200px;">
                        <h5 class="mb-1">{{ $competitor->name }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item bg-transparent"><strong>NISN:</strong> {{ $competitor->nisn }}</li>
                    <li class="list-group-item bg-transparent"><strong>Olimpiade Sains Tingkat: </strong> {{ $competitor->tier->name }}</li>
                    <li class="list-group-item bg-transparent"><strong>Umur:</strong> {{ $competitor->old ? $competitor->old : 'N/A' }} Tahun</li>
                    <li class="list-group-item bg-transparent"><strong>Tanggal Lahir:</strong> {{ $competitor->birthday ? \Carbon\Carbon::parse($competitor->birthday)->format('d M Y') : 'N/A' }}</li>
                    <li class="list-group-item bg-transparent"><strong>Asal Sekolah:</strong> {{ $competitor->name_schools }}</li>
                    <li class="list-group-item bg-transparent"><strong>Email:</strong> {{ $competitor->email }}</li>
                </ul>
                <x-btn-act href="{{ route('competitorIndex') }}" color="secondary">Kembali</x-btn-act>
            </div>
        </div>
    </div>
</div>
