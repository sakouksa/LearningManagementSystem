@extends('frontend.master')

@section('content')
    {{-- START HERO AREA --}}
    @include('frontend.section.hero')
    {{-- END HERO AREA --}}
    {{-- START FEATURE AREA --}}
    @include('frontend.section.feature')
    {{-- END FEATURE AREA --}}
    {{-- START CATEGORY AREA --}}
    @include('frontend.section.category')
    {{-- END CATEGORY AREA --}}
    {{-- START COURSE AREA --}}
    @include('frontend.section.course-area-first')

    {{-- END COURSE AREA --}}
@endsection
