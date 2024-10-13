<div class="row">
    <div class="bg-light h-100 p-4 col-12 mb-4 d-flex align-items-center justify-content-between">
        <h3>Kuis Tingkat: {{ $tierName }}</h3>
        <x-btn-act href="{{ route('quizIndex') }}" color="danger">Kembali</x-btn-act>
    </div>

    @forelse ($quizzes as $index => $quiz)
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="row">
                    <div class="bg-secondary d-flex justify-content-between align-items-center">
                        <span class="text-white">{{ 'No. '. $index + 1 }}</span>
                        <span class="text-white">{{'Bobot '. $quiz->point }}</span>
                        <x-btn-act href="{{ route('quizEdit', $quiz->id) }}" color="secondary btn-sm">
                            <i class="fa fa-edit"></i>
                            Ubah
                        </x-btn-act>
                    </div>
                    <div class="col-md-6">
                        <article>
                            {!! $quiz->quiz_text !!}
                        </article>
                    </div>
                    <div class="col-md-6">
                        <span>Jawaban</span>
                        <ul class="list-group list-group-flush mb-3">
                            @php
                                $optionIndex = 0;
                            @endphp
                            @foreach ($answers[$quiz->id] as $answer)
                                <li class="list-group-item bg-transparent">
                                    <span class="badge bg-primary me-2">
                                        {{ chr(65 + $optionIndex) }} 
                                    </span>
                                    {{ $answer->answer }}

                                    @if($answer->answer === $quiz->correct_answer)
                                        <span class="badge bg-success ms-2">Benar</span>
                                    @endif
                                    
                                    @php
                                        $optionIndex++;
                                    @endphp
                                </li>
                            @endforeach
                        </ul>
                        <span>Kunci Jawaban</span>
                        <div class="p-2 mb-2 bg-success text-white">
                            <span class="badge bg-primary me-2">
                                {{ chr(65 + array_search($quiz->correct_answer, array_column($answers[$quiz->id]->toArray(), 'answer'))) }}
                            </span>
                            {{ $quiz->correct_answer }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <p class="text-center">Tidak ada kuis yang tersedia.</p>
        </div>
    @endforelse
</div>
