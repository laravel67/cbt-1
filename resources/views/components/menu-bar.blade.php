<x-link href="{{ route('dashboard') }}" active="dashboard">
    <i class="fa fa-tachometer-alt me-2"></i>{{ __('Dashboard') }}
</x-link>
<x-link href="{{ route('competitorProfile') }}" :active="['competitorProfile']">
    <i class="fa fa-tachometer-alt me-2"></i>{{ __('Profile') }}
</x-link>
<x-link href="{{ route('competitorIndex') }}" :active="['competitorIndex']">
    <i class="fa fa-tachometer-alt me-2"></i>{{ __('Peserta') }}
</x-link>
<x-link href="{{ route('quizIndex') }}" :active="['quizIndex', 'quizCreate', 'quizDetail', 'quizEdit']">
    <i class="fa fa-tachometer-alt me-2"></i>{{ __('Bank Soal') }}
</x-link>
<x-link href="{{ route('tierIndex') }}" :active="['tierIndex']">
    <i class="fa fa-tachometer-alt me-2"></i>{{ __('Tingkat Soal') }}
</x-link>
<x-link href="{{ route('tierIndex') }}" :active="['tierIndex']">
    <i class="fa fa-tachometer-alt me-2"></i>{{ __('Info Teknis') }}
</x-link>
<x-link href="{{ route('tierIndex') }}" :active="['tierIndex']">
    <i class="fa fa-tachometer-alt me-2"></i>{{ __('Buku Petunjuk') }}
</x-link>
<x-link href="{{ route('tierIndex') }}" :active="['tierIndex']">
    <i class="fa fa-tachometer-alt me-2"></i>{{ __('Ruang Kuis') }}
</x-link>