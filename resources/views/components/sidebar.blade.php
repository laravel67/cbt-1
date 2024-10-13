<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                @if (Auth::user()->image)
                    <img class="rounded-circle" src="{{ asset('storage/'.Auth::user()->image) }}" alt="" style="width: 40px; height: 40px;">
                @else
                    <img class="rounded-circle" src="{{ asset('img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                @endif
                <div class="bg-success rounded-circle border border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                @if (Auth::user()->role =='competitor')
                    <span>{{ __('peserta') }}</span>
                @else
                    {{ Auth::user()->role }}
                @endif
            </div>
        </div>
        <div class="navbar-nav w-100">
            <x-menu-bar/>
        </div>
    </nav>
</div>