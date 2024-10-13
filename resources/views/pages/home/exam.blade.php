<div class="row rounded justify-content-center mx-0 mb-5">
    <form wire:submit.prevent="sending" class="col-md-6 text-center mb-5">
        <h4 class="bg-info py-1 text-white" id="demo"></h4>
        @foreach ($quizs as $index => $quiz)
            <div class="mb-3 my-5 border border-success p-1">
                <article class="text-start w-100 text-dark my-2">
                    {{ ($index + 1) . '.' }} {!! $quiz->quiz_text !!}
                </article>
                <ul class="list-group text-start mb-2">
                    @php
                        $optionIndex = 0;
                    @endphp
                    @foreach ($quiz->answers as $answer)
                        <li class="list-group-item">
                            {{ chr(65 + $optionIndex) }}. {{ $answer->answer }}
                        </li>
                        @php
                            $optionIndex++;
                        @endphp
                    @endforeach
                </ul>
                <div class="d-flex justify-content-around my-0">
                    @foreach ($quiz->answers as $answer)
                        <div>
                            <input 
                                type="radio" 
                                class="btn-check" 
                                wire:model="selectedAnswers.{{ $quiz->id }}" 
                                name="answer_{{ $quiz->id }}" 
                                id="btnradio_{{ $quiz->id }}_{{ $loop->index }}" 
                                value="{{ $answer->answer }}" 
                                autocomplete="off">
                            <label class="btn btn-outline-primary" for="btnradio_{{ $quiz->id }}_{{ $loop->index }}">
                                {{ chr(65 + $loop->index) }}
                            </label>
                        </div>
                    @endforeach
                </div>                    
            </div>
        @endforeach
        <button type="submit" class="btn btn-success w-100">Kirim Jawaban</button>
    </form>    
    @push('js')
        <script>
            var countDownDate = new Date().getTime() + (2 * 60 * 60 * 1000);
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("demo").innerHTML = '<i class="bi bi-alarm"></i> ' + hours + " : " +
                    (minutes < 10 ? "0" + minutes : minutes) + " : " +
                    (seconds < 10 ? "0" + seconds : seconds);
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                }
            }, 1000);
        </script>
    @endpush
</div>
