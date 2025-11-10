@extends('backend.admin.master')

@section('title', 'LMS Admins Dashboard')

@section('content')
    <div class="page-content">
        {{-- breadcrumb --}}
         @include('backend.section.breadcrumb', ['title' => 'Info Box', 'sub_title' => 'Managed-Info'])
        {{-- end breadcrumb --}}

        <div class="row">

            {{-- INFO BOX 1 --}}
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title mt-3" style="margin-left: 15px">
                        <h5>INFO BOX-1</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.info.update', $first_info->id ?? 1) }}" class="row g-3">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <label for="icon1" class="form-label">Icon SVG</label>
                                <textarea class="form-control" name="icon" id="icon1" rows="5">{{$first_info->icon ?? ''}}</textarea>
                                <small class="text-muted">Example: &lt;svg&gt;...&lt;/svg&gt;</small>
                            </div>

                            <div class="col-md-12">
                                <label for="title1" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title1"
                                    value="{{ $first_info->title ?? '' }}">
                            </div>

                            <div class="col-md-12">
                                <label for="description1" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description1" rows="5">{{ $first_info->description ?? '' }}</textarea>
                            </div>

                            <div class="col-12 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- INFO BOX 2 --}}
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title mt-3" style="margin-left: 15px">
                        <h5>INFO BOX-2</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.info.update', $second_info->id ?? 2) }}"
                            class="row g-3">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <label for="icon2" class="form-label">Icon SVG</label>
                                <textarea class="form-control" name="icon" id="icon2" rows="5">{{ $second_info->icon ?? '' }}</textarea>
                                <small class="text-muted">Example: &lt;svg&gt;...&lt;/svg&gt;</small>
                            </div>

                            <div class="col-md-12">
                                <label for="title2" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title2"
                                    value="{{ $second_info->title ?? '' }}">
                            </div>

                            <div class="col-md-12">
                                <label for="description2" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description2" rows="5">{{ $second_info->description ?? '' }}</textarea>
                            </div>

                            <div class="col-12 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- INFO BOX 3 --}}
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title mt-3" style="margin-left: 15px">
                        <h5>INFO BOX-3</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.info.update', $third_info->id ?? 3) }}"
                            class="row g-3">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <label for="icon3" class="form-label">Icon SVG</label>
                                <textarea class="form-control" name="icon" id="icon3" rows="5">{{ $third_info->icon ?? '' }}</textarea>
                                <small class="text-muted">Example: &lt;svg&gt;...&lt;/svg&gt;</small>
                            </div>

                            <div class="col-md-12">
                                <label for="title3" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title3"
                                    value="{{ $third_info->title ?? '' }}">
                            </div>

                            <div class="col-md-12">
                                <label for="description3" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description3" rows="5">{{ $third_info->description ?? '' }}</textarea>
                            </div>

                            <div class="col-12 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
