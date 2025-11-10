@extends('frontend.master')

@section('content')
    {{-- BREADCRUMB --}}
    @include('frontend.pages.course-detail.breadcrumb')

    {{-- COURSE DETAILS --}}
    <section class="course-details-area pb-20px">
        <div class="container">
            <div class="row">
                {{-- Main Content --}}
                <div class="col-lg-8 pb-5">
                    <div class="course-details-content-wrap pt-90px">
                        @include('frontend.pages.course-detail.learn-section')
                        @include('frontend.pages.course-detail.course-content')
                        @include('frontend.pages.course-detail.similar-courses')
                        @include('frontend.pages.course-detail.instructor-about')
                        @include('frontend.pages.course-detail.student-feedback')
                        @include('frontend.pages.course-detail.review')
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="col-lg-4">
                    @include('frontend.pages.course-detail.rigth-sidebar')
                </div>
            </div>
        </div>
    </section>

    {{-- RELATED & BECOME TEACHER --}}
    @include('frontend.pages.course-detail.related-course')
    @include('frontend.pages.course-detail.become-teacher')

    {{-- COURSE PREVIEW MODAL --}}
    @include('frontend.pages.course-detail.course-priview-modal')

    <div class="section-block"></div>
@endsection
