{{-- include nstuctor master --}}
@extends('backend.instructor.master')
{{-- end include nstuctor master --}}
{{-- include section nstuctor Profile --}}
@section('title', 'Instructor Profile')
{{-- end section include nstuctor Profile --}}
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
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                            <form action="{{ route('instructor.profile.store') }}" method="POST"
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
                                    <h5 class="mb-0">Personal Detail</h5>
                                    <hr>
                                    <!-- Full Name -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text"
                                                class="form-control @error('name') is-invalid

                                            @enderror"
                                                name="name" value="{{ auth()->user()->name }}"
                                                placeholder="Enter your full name" />
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid

                                            @enderror"
                                                name="email" value="{{ auth()->user()->email }}"
                                                placeholder="Enter your email" />
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ auth()->user()->phone }}" placeholder="Enter your phone number" />
                                        </div>
                                    </div>

                                    <!-- City -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">City</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="city"
                                                value="{{ auth()->user()->city }}" placeholder="Enter your city" />
                                        </div>
                                    </div>

                                    <!-- Country -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Country</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="country"
                                                value="{{ auth()->user()->country }}" placeholder="Enter your country" />
                                        </div>
                                    </div>

                                    <!-- Gender -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Gender</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select class="form-select" name="gender">
                                                <option value="male"
                                                    {{ auth()->user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female"
                                                    {{ auth()->user()->gender == 'female' ? 'selected' : '' }}>Female
                                                </option>
                                                <option value="other"
                                                    {{ auth()->user()->gender == 'other' ? 'selected' : '' }}>Other
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Experience -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Experience</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="exprience"
                                                value="{{ auth()->user()->exprience }}"
                                                placeholder="Example: Web Developer, Designer, Teacher" />
                                        </div>
                                    </div>

                                    <!-- Bio -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Bio</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <textarea class="form-control" name="bio" rows="4" placeholder="Write a short bio about yourself">
                                                {!! auth()->user()->bio !!}
                                            </textarea>
                                        </div>
                                    </div>
                                    <!-- Address -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text"
                                                class="form-control @error('address') is-invalid @enderror" name="address"
                                                value="{{ auth()->user()->address }}" placeholder="Enter your address" />
                                        </div>
                                    </div>
                                    <!-- Profile Image -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Profile Image</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="photo" class="form-control">
                                        </div>
                                    </div>

                                    <!-- Update Button -->
                                    <div class="row mb-3">
                                        <div class="col-sm-9 offset-sm-3">
                                            <button type="submit" class="btn btn-primary w-100">Update Profile</button>
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
