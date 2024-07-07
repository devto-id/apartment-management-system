<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($_title) ? "$_title - " : '' }}{{ config('app.name', 'Laravel') }}</title>


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('plugins/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('plugins/adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        @include('layouts.partials.navbar')

        @include('layouts.partials.sidebar')

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>{{ $_title ?? '' }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @foreach ($_breadcrumbs as $k => $v)
                                    <li class="breadcrumb-item {{ $k == count($_breadcrumbs) - 1 ? 'active' : '' }}">
                                        <a href=" {{ $v[0] }}">
                                            {{ $v[1] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">

                    @yield('content')

                </div>
            </section>
        </div>


        @include('layouts.partials.footer')

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script src="{{ asset('plugins/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    @stack('scripts')

    <script src="{{ asset('plugins/adminlte/dist/js/adminlte.min.js') }}"></script>

    <script>
        $(function() {
            $("[data-trigger='logout']").on("click", function(e) {
                e.preventDefault();
                $("[data-content='form-logout']").submit();
            })

            $("[data-content='form-logout']").on("submit", function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You will be required to login again to access the system!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Log me out!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).off("submit").submit();
                    }
                });
            })

            $("[data-content='form-delete']").on("submit", function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).off("submit").submit();
                    }
                });
            })
        })
    </script>

    @if (session()->has('message'))
        @foreach (session()->get('message') as $message)
            <script>
                $(function() {
                    Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    }).fire({
                        icon: '{{ $message[0] }}',
                        title: '{{ ucwords($message[0]) }}',
                        text: '{{ ucwords($message[1]) }}',
                    });
                });
            </script>
        @endforeach
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                $(function() {
                    Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    }).fire({
                        icon: 'error',
                        title: 'Error',
                        text: '{{ $error }}',
                    });
                });
            </script>
        @endforeach
    @endif
</body>

</html>
