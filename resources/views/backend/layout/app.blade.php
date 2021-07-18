<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            .ck-editor__editable {
                min-height: 350px;
            }
        </style>

        {{-- after include css --}}
        {{-- muc dich chen css o view con ra ngoai nay --}}
        @stack('stylesheets')
    </head>
    <body class="sb-nav-fixed">

        {{-- giao dien navbar --}}
        @include('backend.layout.partials.app.navbar')

        <div id="layoutSidenav">

            {{-- giao dien sidebar --}}
            @include('backend.layout.partials.app.sidebar')
            {{-- master layout --}}
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @include('backend.layout.partials.app.breadcrumd')
                        @yield('content_app')
                    </div>
                </main>
                {{-- giao dien footer --}}
                @include('backend.layout.partials.app.footer')
            </div>
        </div>
        <script src="{{ asset('backend/js/jquery-3.6.0.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('backend/js/scripts.js') }}"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> --}}
        {{-- <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('backend/js/datatables-simple-demo.js') }}"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
        <script>
            // setup call ajax
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // setup CKEditor
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    //console.error( error );
            } );
        </script>

        {{-- after include js --}}
        @stack('javascripts')
    </body>
</html>
