<!doctype html>
<html lang="en">

<head>
    @include('backend.section.link')
    <title>@yield('title', 'LMS Instructor Dashboard')</title>

</head>
<style>
    
</style>
<body>
    <div class="wrapper">
        {{-- include sidebar --}}
        @include('backend.instructor.sidebar')
        {{-- end include sidebar --}}
        {{-- include header --}}
        @include('backend.instructor.header')
        {{-- end include header --}}
        {{-- main content --}}
        <div class="page-wrapper">
            @yield('content')
        </div>
        {{-- end main content --}}
        {{-- include footer --}}
        @include('backend.section.footer')
        {{-- end include footer --}}
    </div>
    {{-- include script --}}
    @include('backend.section.script')
    {{-- end include script --}}
</body>

</html>
