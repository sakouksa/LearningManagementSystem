<!DOCTYPE html>
<html lang="en">

<head>
    <title>s-Learning System UHST</title>

    <link rel="icon" sizes="16x16" href="{{ asset('frontend/images/favicon1.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('frontend.section.link')
</head>

<body>

    {{-- Loader --}}
    @include('frontend.section.loader')

    {{-- Header --}}
    @include('frontend.section.header')

    {{-- Content --}}
    @yield('content')

    {{-- Footer --}}
    @include('frontend.section.footer')

    {{-- Scroll Top --}}
    <div id="scroll-top">
        <i class="la la-arrow-up" title="Go top"></i>
    </div>

    {{-- Tooltip --}}
    @include('frontend.section.tooltip')

    {{-- Scripts --}}
    @include('frontend.section.script')
</body>

</html>
