@extends('backend.admin.master')

@section('title', 'LMS Admins Dashboard')

@section('content')
    <div class="page-content">
        {{-- breadcrumb --}}
        @include('backend.section.breadcrumb', ['title' => 'Info Box Management', 'sub_title' => 'Update Content'])
        {{-- end breadcrumb --}}

        <div class="row">
            {{-- INFO BOX 1 --}}
            <div class="col-xl-4 col-lg-6 col-md-12 mb-4">
                {{-- Use simple border, no shadows --}}
                <div class="card border h-100">
                    <div class="card-header bg-white border-bottom text-primary">
                        <h5 class="mb-0 fw-bold">INFO BOX 1</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.info.update', $first_info->id ?? 1) }}" class="row g-3">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <label for="icon1" class="form-label">Icon SVG</label>
                                <textarea class="form-control" name="icon" id="icon1" rows="4" placeholder="Paste your SVG code here...">{{$first_info->icon ?? ''}}</textarea>
                                <small class="text-muted">Example: &lt;svg&gt;...&lt;/svg&gt;</small>
                            </div>

                            {{-- ICON PREVIEW --}}
                            <div class="col-md-12">
                                <label class="form-label">Icon Preview</label>
                                {{-- Icon displayed in a light grey box --}}
                                <div class="p-3 border rounded text-center bg-light" style="min-height: 80px; display: flex; align-items: center; justify-content: center; font-size: 2rem; color: #6c757d;">
                                    {!! $first_info->icon ?? '<i class="bi bi-box-fill"></i>' !!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="title1" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title1"
                                    value="{{ $first_info->title ?? '' }}" placeholder="Enter box title">
                            </div>

                            <div class="col-md-12">
                                <label for="description1" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description1" rows="3" placeholder="Enter a brief description...">{{ $first_info->description ?? '' }}</textarea>
                            </div>

                            <div class="col-12 d-grid mt-4">
                                {{-- Standard primary button --}}
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-arrow-up-circle me-2"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- INFO BOX 2 --}}
            <div class="col-xl-4 col-lg-6 col-md-12 mb-4">
                <div class="card border h-100">
                    <div class="card-header bg-white border-bottom text-primary">
                        <h5 class="mb-0 fw-bold">INFO BOX 2</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.info.update', $second_info->id ?? 2) }}"
                            class="row g-3">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <label for="icon2" class="form-label">Icon SVG</label>
                                <textarea class="form-control" name="icon" id="icon2" rows="4" placeholder="Paste your SVG code here...">{{ $second_info->icon ?? '' }}</textarea>
                                <small class="text-muted">Example: &lt;svg&gt;...&lt;/svg&gt;</small>
                            </div>

                            {{-- ICON PREVIEW --}}
                            <div class="col-md-12">
                                <label class="form-label">Icon Preview</label>
                                <div class="p-3 border rounded text-center bg-light" style="min-height: 80px; display: flex; align-items: center; justify-content: center; font-size: 2rem; color: #6c757d;">
                                    {!! $second_info->icon ?? '<i class="bi bi-book-fill"></i>' !!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="title2" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title2"
                                    value="{{ $second_info->title ?? '' }}" placeholder="Enter box title">
                            </div>

                            <div class="col-md-12">
                                <label for="description2" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description2" rows="3" placeholder="Enter a brief description...">{{ $second_info->description ?? '' }}</textarea>
                            </div>

                            <div class="col-12 d-grid mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-arrow-up-circle me-2"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- INFO BOX 3 --}}
            <div class="col-xl-4 col-lg-6 col-md-12 mb-4">
                <div class="card border h-100">
                    <div class="card-header bg-white border-bottom text-primary">
                        <h5 class="mb-0 fw-bold">INFO BOX 3</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.info.update', $third_info->id ?? 3) }}"
                            class="row g-3">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <label for="icon3" class="form-label">Icon SVG</label>
                                <textarea class="form-control" name="icon" id="icon3" rows="4" placeholder="Paste your SVG code here...">{{ $third_info->icon ?? '' }}</textarea>
                                <small class="text-muted">Example: &lt;svg&gt;...&lt;/svg&gt;</small>
                            </div>

                            {{-- ICON PREVIEW --}}
                            <div class="col-md-12">
                                <label class="form-label">Icon Preview</label>
                                <div class="p-3 border rounded text-center bg-light" style="min-height: 80px; display: flex; align-items: center; justify-content: center; font-size: 2rem; color: #6c757d;">
                                    {!! $third_info->icon ?? '<i class="bi bi-gear-fill"></i>' !!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="title3" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title3"
                                    value="{{ $third_info->title ?? '' }}" placeholder="Enter box title">
                            </div>

                            <div class="col-md-12">
                                <label for="description3" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description3" rows="3" placeholder="Enter a brief description...">{{ $third_info->description ?? '' }}</textarea>
                            </div>

                            <div class="col-12 d-grid mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-arrow-up-circle me-2"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection