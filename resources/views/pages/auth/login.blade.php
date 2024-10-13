<form wire:submit.prevent="login">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <a href="index.html" class="">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
        </a>
    </div>
    <x-input type="email" model="email" ph="Alamat Email">Email</x-input>
    <x-input type="password" model="password" ph="Kata Sandi">Kata Sandi</x-input>
    
    <x-submit text="Login" load="Mengautentikasi..." target="login" class="w-100"/>
    <div class="d-flex align-items-center justify-content-between my-4">
        <a href="">Lupa Sandi</a>
        <a wire:navigate href="{{ route('register') }}">Daftar Akun</a>
    </div>
</form>