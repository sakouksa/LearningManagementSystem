<div class="col-lg-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-5">
            <div class="d-flex flex-column align-items-center text-center">
                <div class="position-relative">
                    <img id="photoPriview"
                        src="{{ auth()->user()->photo ? asset(auth()->user()->photo) : asset('backend/assets/images/avatars/avatar-1.png') }}"
                        alt="User Profile" width="120" height="120"
                        class="rounded-circle border border-5 border-white shadow-sm">
                    <span class="position-absolute bottom-0 end-0 p-2 bg-success border border-2 border-white rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                </div>
                
                <div class="mt-4">
                    <h4 class="fw-bold text-dark">{{ auth()->user()->name }}</h4>
                    <p class="text-muted mb-2">{{ auth()->user()->email }}</p>
                    <p class="text-secondary font-size-sm">{{ auth()->user()->phone }}</p>

                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <a href="#" class="btn btn-primary rounded-pill px-4">Follow</a>
                        <a href="#" class="btn btn-outline-primary rounded-pill px-4">Message</a>
                    </div>
                </div>
            </div>

            <hr class="my-4" />
        </div>
    </div>
</div>