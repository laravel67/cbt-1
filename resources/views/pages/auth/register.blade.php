<form wire:submit.prevent="register">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <a href="index.html" class="">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
        </a>
    </div>
    <x-input type="text" model="name" ph="Nama Lengkap">Nama</x-input>
    <x-input type="email" model="email" ph="Alamat Email">Email</x-input>
    <x-input type="password" model="password" ph="Kata Sandi">Kata Sandi</x-input>
    <x-input type="password" model="password_confirmation" ph="Konfirmasi Sandi">Kata Sandi</x-input>
    <x-submit text="Register" load="Mengautentikasi..." target="register" class="w-100"/>
    <div class="d-flex align-items-center justify-content-between my-4">
        <a wire:navigate href="{{ route('login') }}">Login</a>
    </div>
</form>