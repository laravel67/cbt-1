<div class="container-xxl position-relative bg-white d-flex p-0">
    <x-loading/>
    <x-sidebar/>
    <div class="content">
        <x-navbar/>
        <div class="container-fluid pt-4 px-4">
            {{ $slot }}
        </div>

        @if (!request()->routeIs('starting') && !request()->routeIs('start.quiz'))
            <livewire:home.button />
        @endif
    </div>
</div>