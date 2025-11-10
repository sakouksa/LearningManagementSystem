{{-- include nstuctor master --}}
@extends('backend.instructor.master')
{{-- end include nstuctor master --}}
{{-- include section nstuctor Settings --}}
@section('title', 'Instructor Settings')
{{-- end section include nstuctor Settings --}}
{{-- content instuctor min  --}}
@section('content')
    <div class="page-content">
        {{-- breadcrumb  --}}
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('instructor.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- end breadcrumb  --}}

        <div class="container">
            <div class="main-body">
                <div class="row">
                    {{-- profile sidebar --}}
                    @include('backend.instructor.profile.sidebar')
                    {{-- end profile sidebar --}}

                    <!-- profile content -->
                    <div class="col-lg-8">
                        <div class="card">
                            <form action="{{ route('instructor.passwordSetting') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- error message --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center"
                                        role="alert">
                                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                        <div>
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                {{-- end error message --}}
                                <div class="card-body">
                                      <h5 class="mb-0">Change Password</h5>
                                    <hr>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Current Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" name="current_password" placeholder="Enter your current Password"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">New Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" name="new_password" placeholder="Enter your New Password"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Confirm Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" name="new_password_confirmation"
                                                placeholder="Enter your Confirm Password" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-9 offset-sm-3">
                                            <button type="submit" class="btn btn-primary w-100">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- end profile content  --}}
                </div>
            </div>
        </div>
    </div>
@endsection
