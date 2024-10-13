<div class="row g-4">
    <div class="col-sm-12 col-xl-6">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Data Tingkat Soal</h6>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Tingkat</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tiers as $index=> $row)
                        <tr>
                            <th scope="row">{{ $tiers->firstItem()+$index }}</th>
                            <td>{{ $row->name }}</td>
                            <td>
                                <x-btn-act model="edit({{ $row->id }})" color="warning text-white btn-sm">
                                    <i class="fas fa-edit"></i>
                                </x-btn-act>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <livewire:admin.tier.create>
</div>
