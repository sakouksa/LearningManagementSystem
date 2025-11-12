@extends('frontend.master')

@section('content')
    {{-- START BREADCRUMB AREA --}}
    <section class="breadcrumb-area section-padding img-bg-2">
        <div class="overlay"></div>
        <div class="container">
            <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                <div class="section-heading">
                    <h2 class="section__title text-white">Forgot Password</h2>
                </div>
                <ul
                    class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                    <li><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li>Pages</li>
                    <li>Forgot Password</li>
                </ul>
            </div>
        </div>
    </section>
    {{-- END BREADCRUMB AREA --}}

    {{-- START PASSWORD RESET FORM --}}
    <section class="contact-area section--padding position-relative">
        <span class="ring-shape ring-shape-1"></span>
        <span class="ring-shape ring-shape-2"></span>
        <span class="ring-shape ring-shape-3"></span>
        <span class="ring-shape ring-shape-4"></span>
        <span class="ring-shape ring-shape-5"></span>
        <span class="ring-shape ring-shape-6"></span>
        <span class="ring-shape ring-shape-7"></span>

        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title text-center fs-24 lh-35 pb-4">Forgot Your Password?</h3>
                            <div class="section-block mb-4"></div>

                            <p class="text-center text-muted mb-4">
                                No problem! Just let us know your email address and we’ll send you a link to reset your
                                password.
                            </p>

                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                {{-- EMAIL FIELD --}}
                                <div class="input-box">
                                    <label class="label-text">Email Address</label>
                                    <div class="form-group">
                                        <input id="email" class="form-control form--control" type="email"
                                            name="email" placeholder="Enter your email" value="{{ old('email') }}"
                                            required autofocus>
                                        <span class="la la-envelope input-icon"></span>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                {{-- SUBMIT BUTTON --}}
                                <div class="btn-box text-center">
                                    <button type="submit" class="btn theme-btn">
                                        Send Password Reset Link <i class="la la-arrow-right icon ml-1"></i>
                                    </button>
                                    <p class="fs-14 pt-3">
                                        <a href="{{ route('login') }}" class="text-color hover-underline">
                                            <i class="la la-arrow-left mr-1"></i> Back to Login
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end contact-area -->
@endsection
