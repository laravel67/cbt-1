<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <x-btn-act href="{{ route('quizCreate') }}" color="primary ms-2">
            <i class="fa fa-plus-circle"></i> Tambah
        </x-btn-act>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{ __('No') }}</th>
                        <th scope="col">{{ __('Tingkat Soal') }}</th>
                        <th scope="col">{{ __('Jumlah Soal') }}</th>
                        <th scope="col">{{ __('Opsi') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tiers as $index=> $row)
                    <tr>
                      <td>{{ $tiers->firstItem()+$index }}</td>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->quizzes->count() }} Butir</td>
                      <td>
                        <x-btn-act href="{{ route('quizDetail', $row->id) }}" color="success btn-sm">
                            <i class="fa fa-folder"></i>
                        </x-btn-act>  
                        {{-- <x-delete :model="$row->id" />        --}}
                      </td>
                    </tr>
                    @empty
                    @endforelse
                  </tbody>
            </table>
        </div>
    </div>
</div>