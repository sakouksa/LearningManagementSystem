@extends('backend.admin.master')

@section('title', 'LMS Admins Dashboard')

@section('content')
    <div class="page-content">
        {{-- breadcrumb --}}
        @include('backend.section.breadcrumb', ['title' => 'Slider', 'sub_title' => 'All-Sliders'])
        {{-- end breadcrumb --}}
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0 text-uppercase">All Slider</h5>
            <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle-fill"></i> Add Slider
            </a>
        </div>
        <hr>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>

                        <tr>
                            <th>#No</th>
                            <th>Image</th>
                            <th>Thumbnail</th>
                            <th>Slider Description</th>
                            <th>Slider Intro</th>

                            <th>Action</th>
                        </tr>
                    </thead>

                    <body>
                        @foreach ($all_sliders as $index => $item)
                            <tr class="align-middle">
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset($item->image) }}" width="60" height="60"
                                            style="border-radius: 60px" alt="">
                                    @else
                                        <span>no image found</span>
                                    @endif
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ Str::limit($item->short_description, 50, '...') }}</td>
                                <td>{{ $item->video_url }}</td>

                                <td>
                                    <a href="{{ route('admin.slider.edit', $item->id) }}"
                                        class="icon-btn text-primary me-2">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="icon-btn text-danger delete-slider"
                                        data-id="{{ $item->id }}">
                                        <i class="bi bi-trash3-fill"></i>
                                    </a>
                                    <form action="{{ route('admin.slider.destroy', $item->id) }}" method="POST"
                                        id="delete-form-{{ $item->id }}" style="display: none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </body>

                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).on('click', '.delete-slider', function(e) {
            e.preventDefault();
            let sliderId = $(this).data('id');
            Swal.fire({
                html: `
            <div style="text-align:center;">
                <div style="background:rgba(255, 76, 76, 0.1);
                            width:90px; height:90px; border-radius:50%;
                            display:flex; align-items:center; justify-content:center;
                            margin:0 auto 20px;">
                    <i class="bi bi-trash-fill text-danger" style="font-size:3rem;"></i>
                </div>
                <h2 style="font-weight:700; color:#222;">Delete Sliders?</h2>
                <p style="color:#666; font-size:15px; margin-top:10px;">
                    This action cannot be undone. Are you sure you want to delete this Sliders?
                </p>
            </div>
        `,
                showCancelButton: true,
                confirmButtonText: '<i class="bi bi-check-circle"></i> Confirm Delete',
                cancelButtonText: '<i class="bi bi-x-circle"></i> Cancel',
                showCloseButton: true,
                focusConfirm: false,
                buttonsStyling: true,
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-dark ms-2',
                    popup: 'swal2-border-radius'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-form-' + sliderId).submit();
                }
            });
        });
    </script>
@endpush
