<div class="row">
    <div class="col-sm-12 ">
        <div class="card border-success mb-3">
            <div class="card-header bg-transparent border-success">
                <i class="fas fa-info-circle"></i> Persiapan & Ketentuan
            </div>
            <div class="card-body text-success">
                <ol class="list-group list-group-numbered">
                    <h4 class="text-center text-success">OS Tingkat {{ $tierName }}</h4>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold">
                            Kotretan Jika Perlu
                          </div>
                        </div>
                        <span class="badge text-dark">
                            <i class="fas fa-pen-square"></i>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold">
                            Kerjakan dengan Jujur
                          </div>
                        </div>
                        <span class="badge text-dark">
                            <i class="fas fa-user-edit"></i>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold">
                              Koneksi stabil 
                          </div>
                        </div>
                        <span class="badge text-dark">
                            <i class="fas fa-wifi"></i>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold">
                              Batrei yang cukup 
                          </div>
                        </div>
                        <span class="badge text-dark">
                            <i class="fas fa-battery-full"></i>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold">
                              Tidak Keluar/Pindah Halaman 
                          </div>
                        </div>
                        <span class="badge text-dark">
                            <i class="fas fa-mobile-alt"></i>
                        </span>
                    </li>
                </ol>
            </div>
            <button wire:click="startnow" class="m-1 btn btn-success">
                <span wire:loading.remove wire:target="startnow">Mulai Kerjakan</span>
                <div class="spinner-border spinner-border-sm text-info ms-2" wire:loading wire:target="startnow" role="status">
                    <span class="visually-hidden">Memulai...</span>
                </div>
                <span wire:loading wire:target="startnow">Memulai...</span>
            </button>
          </div>
    </div>
</div>