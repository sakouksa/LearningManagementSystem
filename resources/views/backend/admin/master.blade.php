<!doctype html>
<html lang="en">

<head>
    {{-- include link --}}
    @include('backend.section.link')
    {{-- end include link --}}
    <title> @yield('title', 'Admin Dashboard|s-Learning System UHST')</title>

    {{-- Theme Style --}}
    <style>
        html {
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }
    </style>
    {{-- End Theme Style --}}
    {{-- Theme Script --}}
    <script>
        (function() {
            if (localStorage.getItem("theme") === "dark") {
                document.documentElement.classList.add("dark-theme");
            } else {
                document.documentElement.classList.add("light-theme");
            }
            document.documentElement.style.visibility = "visible";
            document.documentElement.style.opacity = "1";
        })();
    </script>
    {{-- End Theme Script --}}
</head>


<body>
    {{-- wrapper --}}
    <div class="wrapper">
        {{-- sidebar wrapper --}}
        @include('backend.section.sidebar')
        {{-- end sidebar wrapper --}}

        {{-- header --}}
        @include('backend.section.header')
        {{-- end header --}}

        {{-- page wrapper --}}
        <div class="page-wrapper">
            @yield('content')
        </div>
        {{-- end page wrapper --}}

        {{-- footer --}}
        @include('backend.section.footer')
        {{-- end footer --}}
    </div>
    {{-- end wrapper --}}

    {{-- script --}}
    @include('backend.section.script')
    {{-- end script --}}
</body>

</html>
