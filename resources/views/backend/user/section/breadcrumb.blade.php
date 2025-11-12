<div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between mb-5">
    <div class="media media-card align-items-center">
        <div class="media-img media--img media-img-md rounded-full">
            <img class="rounded-full" src="{{ asset('backend/assets/images/avatars/avatar-1.png') }}"
                alt="Student thumbnail image">
        </div>
        <div class="media-body">
            <h2 class="section__title fs-30">Howdy, {{ auth()->user()->name }}</h2>

        </div> {{-- end media-body --}}
    </div> {{-- end media --}}

</div> {{-- end breadcrumb-content --}}
