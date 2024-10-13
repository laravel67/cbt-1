<form wire:submit.prevent="submit">
    <div class="row">
        <div class="col-md-4">
            <x-input-select model="tier_id" :options="$tiers">
                {{ ('Tingkat') }}
            </x-input-select>
        </div>
    </div>
    @foreach($questions as $questionIndex => $question)
        <div class="bg-light bg-light rounded h-100 p-4">
            <div class="row">
                <div class="col-md-7">
                    <x-btn-act model="removeQuiz({{ $questionIndex }})" color="danger btn-sm">{{ __('Hapus') }}</x-btn-act>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Pertanyaan '. $questionIndex + 1) }}</label>
                        <x-editor-trix :model="'questions.' . $questionIndex . '.quiz_text'" :index="$questionIndex"></x-editor-trix>
                        @error('questions.' . $questionIndex . '.quiz_text') 
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                </div>
                <div class="col-md-5">
                    <x-btn-act model="addOption({{ $questionIndex }})" color="secondary mb-2">
                        <i class="fa fa-pen"></i>
                        Jawaban
                    </x-btn-act>
                    @foreach($question['options'] as $optionIndex => $option)
                    <div class="input-group mb-2">
                        <span class="input-group-text">
                            {{ $abjad[$optionIndex] ?? '' }}
                        </span>
                        <textarea class="form-control form-control-sm @error('questions.' . $questionIndex . '.options.' . $optionIndex) is-invalid @enderror"  wire:model.lazy="questions.{{ $questionIndex }}.options.{{ $optionIndex }}" placeholder="Masukkan pilihan jawaban" required></textarea>
                        <x-btn-act model="removeOption({{ $questionIndex }}, {{ $optionIndex }})" color="danger text-align-center">
                            <i class="fa fa-trash"></i>
                        </x-btn-act>
                    </div>
                    @endforeach
                    @error('questions.' . $questionIndex . '.options.*') <span class="text-danger">{{ $message }}</span> @enderror
                    <hr>
                    @if ($question['isShowAnswer'])
                        <div class="mb-3">
                            <label class="form-label">{{ __('Jawaban Benar') }}</label>
                            <select class="form-select" wire:model.defer="questions.{{ $questionIndex }}.correctAnswer" required>
                                <option value="" selected>{{ __('Pilih jawaban yang benar') }}</option>
                                @foreach($question['options'] as $index => $option)
                                    <option value="{{ $option }}">{{ $abjad[$index] ?? '' }}. {{ $option }}</option>
                                @endforeach
                            </select>
                            @error('questions.' . $questionIndex . '.correctAnswer') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Bobot Soal') }}</label>
                            <select class="form-select" wire:model.defer="questions.{{ $questionIndex }}.points" required>
                                <option value="" selected>{{ __('Pilih bobot soal') }}</option>
                                @foreach($pointsOptions as $point)
                                    <option value="{{ $point }}">{{ $point }}</option>
                                @endforeach
                            </select>
                            @error('questions.' . $questionIndex . '.points') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    <div class="row my-5">
        <div class="col-md-12 text-end">
            <x-btn-act href="{{ route('quizIndex') }}" color="secondary">
                  {{ __('Kembali') }}
                </x-btn-act>
            <x-btn-act model="addQuiz" color="primary">
                <i class="fa fa-plus-circle"></i>
                {{ __('Tambah') }}
            </x-btn-act>
            <x-submit text="Simpan" target="submit" load="Menyimpan..." />
        </div>
    </div>
</form>
