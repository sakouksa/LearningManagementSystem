<script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/isotope.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/js/fancybox.js') }}"></script>
<script src="{{ asset('frontend/js/chart.js') }}"></script>
<script src="{{ asset('frontend/js/doughnut-chart.js') }}"></script>
<script src="{{ asset('frontend/js/bar-chart.js') }}"></script>
<script src="{{ asset('frontend/js/line-chart.js') }}"></script>
<script src="{{ asset('frontend/js/datedropper.min.js') }}"></script>
<script src="{{ asset('frontend/js/emojionearea.min.js') }}"></script>
<script src="{{ asset('frontend/js/animated-skills.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.MultiFile.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-te-1.4.0.min.js') }}"></script>
<script src=" {{ asset('frontend/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>


<!----Sweet Alert---->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.3/dist/echo.js"></script>

<!-- Sweet alert toast script -->
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4200,
        timerProgressBar: true,
        background: '#ffffff',
        color: '#333',
        customClass: {
            popup: 'beautiful-toast'
        },
    });

    @if (session('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}'
        });
    @elseif (session('error'))
        Toast.fire({
            icon: 'error',
            title: '{{ session('error') }}'
        });
    @endif
</script>

<style>
    /* Custom Toast Style */
    .beautiful-toast {
        border-radius: 14px !important;
        padding: 14px 18px !important;
        font-size: 15px !important;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        border: 1px solid #eaeaea;
        backdrop-filter: blur(6px);
        animation: fadeInUp 0.4s ease-out;
    }

    /* Smooth Slide Animation */
    @keyframes fadeInUp {
        from {
            transform: translateY(10px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Beautiful Success Color Glow */
    .swal2-icon-success {
        box-shadow: 0 0 12px rgba(56, 209, 34, 0.5);
        border-radius: 50%;
    }

    /* Beautiful Error Glow */
    .swal2-icon-error {
        box-shadow: 0 0 12px rgba(255, 68, 68, 0.5);
        border-radius: 50%;
    }
</style>
