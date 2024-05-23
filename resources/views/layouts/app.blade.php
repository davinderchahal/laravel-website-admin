@use('Illuminate\Support\Facades\Vite')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin') }}</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ Vite::assets('img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ Vite::assets('img/favicon.png') }}" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />
    <!-- Icons -->
    <link rel="stylesheet" href="{{ Vite::assets('css/nucleo-icons.css') }}" />
    <!-- CSS -->
    <link rel="stylesheet" href="{{ Vite::assets('css/black-dashboard.css?v=1.0.0') }}" />
    <link rel="stylesheet" href="{{ Vite::assets('css/theme.css') }}" />
    <link rel="stylesheet" href="{{ Vite::assets('css/wysiwyg.css') }}" />
    <!-- Scripts -->

</head>

<body class="{{ $class ?? '' }}">
    @auth()
    <div class="wrapper">
        @include('layouts.navbars.sidebar')
        <div class="main-panel">
            @include('layouts.navbars.navbar')
            <div class="content">
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>
    </div>
    @else
    <div class="wrapper wrapper-full-page">
        <div class="full-page {{ $contentClass ?? '' }}">
            <div class="content">
                <div class="container">
                    @yield('content')
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
    @endauth

    <script src="{{ Vite::assets('js/core/jquery.min.js') }}"></script>
    <script src="{{ Vite::assets('js/core/popper.min.js') }}"></script>
    <script src="{{ Vite::assets('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ Vite::assets('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <!-- Place this tag in your head or just before your close body tag. -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}

    <!-- Chart JS -->
    {{-- <script src="{{ Vite::assets('js/plugins/chartjs.min.js') }}"></script> --}}
    <!--  Notifications Plugin    -->
    <script src="{{ Vite::assets('js/plugins/bootstrap-notify.js') }}"></script>

    <script src="{{ Vite::assets('js/black-dashboard.min.js?v=1.0.0') }}"></script>
    <script src="{{ Vite::assets('js/theme.js') }}"></script>
    <script src="{{ Vite::assets('js/wysiwyg.js') }}"></script>
    @vite('resources/js/app.js');

    @stack('js')

    <script type="module">
        $(document).ready(function() {
            @if(session($key ?? 'status'))
            demo.showNotification("{{ session($key ?? 'status') }}");
            @endif
            @if(session($key ?? 'fail'))
            demo.showNotification("{{ session($key ?? 'fail') }}", 4);
            @endif
            $('[data-toggle="tooltip"]').tooltip();
            $('.text-editor').wysiwyg();

            var sidebar = $('.sidebar');

            var navbar = $('.navbar');
            var main_panel = $('.main-panel');

            var full_page = $('.full-page');

            var sidebar_responsive = $('body > .navbar-collapse');
            var sidebar_mini_active = true;
            var white_color = false;

            var window_width = $(window).width();

            var fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            $('.fixed-plugin a').click(function(event) {
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .background-color span').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if (sidebar.length != 0) {
                    sidebar.attr('data', new_color);
                }

                if (main_panel.length != 0) {
                    main_panel.attr('data', new_color);
                }

                if (full_page.length != 0) {
                    full_page.attr('filter-color', new_color);
                }

                if (sidebar_responsive.length != 0) {
                    sidebar_responsive.attr('data', new_color);
                }
            });

            $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                var $btn = $(this);

                if (sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    sidebar_mini_active = false;
                    blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                } else {
                    $('body').addClass('sidebar-mini');
                    sidebar_mini_active = true;
                    blackDashboard.showSidebarMessage('Sidebar mini activated...');
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);
            });

            $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                var $btn = $(this);

                if (white_color == true) {
                    $('body').addClass('change-background');
                    setTimeout(function() {
                        $('body').removeClass('change-background');
                        $('body').removeClass('white-content');
                    }, 900);
                    white_color = false;
                } else {
                    $('body').addClass('change-background');
                    setTimeout(function() {
                        $('body').removeClass('change-background');
                        $('body').addClass('white-content');
                    }, 900);

                    white_color = true;
                }
            });

        });
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        $(document).on('click', '.dsc-delete-btn', function(e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest('form').submit();
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>