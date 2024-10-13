<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="row justify-content-start align-items-center">
            <div class="col-4">
                {{-- Menampil data berdasarkan Jumlah --}}
                <div class="d-flex align-items-center w-50">
                    <small class="mx-1">Tampilkan</small>
                    <select wire:model.lazy="select_row" class="form-select form-select-sm border-0">
                        @for ($i = 5; $i <= 100; $i += 5)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            {{-- Menampilkan data berdasarkan Tingkat --}}
            <div class="col-4">
                <div class="d-flex align-items-center w-50">
                    <small class="mx-1">Tingkat</small>
                    <select wire:model.lazy='select_tier' class="form-select form-select-sm border-0">
                        <option value="">Semua</option>
                        @forelse ($tiers as $tier)
                            <option value="{{ $tier->id }}">{{ $tier->name }}</option>
                        @empty
                            <option value="">Tidak ada data</option>
                        @endforelse
                    </select>
                </div>
            </div>

            <div class="col-4">
                <div class="d-flex align-items-center w-50">
                    <input type="search" wire:model.lazy="search" class="form-control form-control-sm" placeholder="Pencarian...">
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{ __('No') }}</th>
                        <th scope="col">{{ __('Nama') }}</th>
                        <th scope="col">{{ __('Nisn') }}</th>
                        <th scope="col">{{ __('Tingkat') }}</th>
                        <th scope="col">{{ __('Email') }}</th>
                        <th scope="col">{{ __('Opsi') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($competitors as $index => $row)
                        <tr>
                            <td>{{ $competitors->firstItem() + $index }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->nisn }}</td>
                            <td>{{ $row->tier->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>
                                <x-btn-act href="{{ route('competitorDetail', $row->id) }}" color="success btn-sm">
                                    <i class="fa fa-folder"></i>
                                </x-btn-act>  
                                {{-- <x-delete :model="$row->id" /> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data yang tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $competitors->links() }}
    </div>
</div>
