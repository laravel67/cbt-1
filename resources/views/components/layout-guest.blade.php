<div class="container-xxl position-relative bg-white d-flex p-0">
    <x-loading/>
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
</div>