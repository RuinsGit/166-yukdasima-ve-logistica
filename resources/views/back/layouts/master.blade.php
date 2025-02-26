<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/upcube/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Oct 2023 05:29:29 GMT -->

<head>

    <meta charset="utf-8" />
    <title>@yield('title') | Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Buy Brand Tools Admin" name="description" />
    <meta content="Buy Brand Tools Admin" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('back/assets/') }}/images/logo.svg">

    <!-- jquery.vectormap css -->
    <link href="{{ asset('back/assets/') }}/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
        rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ asset('back/assets/') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('back/assets/') }}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('back/assets/') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('back/assets/') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('back/assets/') }}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    @stack('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- App Css'den sonra ekle -->
    <link href="{{ asset('back/assets/css/custom.css') }}" rel="stylesheet" type="text/css">

    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
</head>

<body data-topbar="dark" 
      data-layout-color="{{ $themeSettings->dark_mode ? 'dark' : 'light' }}"
      data-sidebar-width="{{ $themeSettings->sidebar_width }}"
      style="@if($themeSettings->background_type === 'image') background-image: url('{{ asset($themeSettings->background_image) }}'); @else background-color: {{ $themeSettings->background_color }}; @endif background-size: cover; background-position: center;">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    @include('back.includes.header')
    @include('back.includes.sidebar')
    <!-- Begin page -->
    <div id="layout-wrapper">

        <div class="main-content" 
             style="background-color: {{ $themeSettings->background_color }}; 
                    background-image: url('{{ asset($themeSettings->background_image) }}'); 
                    background-size: cover; 
                    background-position: center; 
                    height: calc(100vh - 120px);
                    overflow-y: auto;
                    padding: 20px;">
            @yield('content')
            @include('back.includes.footer', ['themeSettings' => $themeSettings])
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('back/assets/') }}/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('back/assets/') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('back/assets/') }}/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('back/assets/') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('back/assets/') }}/libs/node-waves/waves.min.js"></script>


    <!-- apexcharts -->
    <script src="{{ asset('back/assets/') }}/libs/apexcharts/apexcharts.min.js"></script>

    <!-- jquery.vectormap map -->
    <script src="{{ asset('back/assets/') }}/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js">
    </script>
    <script src="{{ asset('back/assets/') }}/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js">
    </script>

    <!-- Required datatable js -->
    <script src="{{ asset('back/assets/') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('back/assets/') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('back/assets/') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('back/assets/') }}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="{{ asset('back/assets/') }}/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="{{ asset('back/assets/') }}/js/app.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // AJAX için CSRF token ayarı
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('js')
    <script src="{{ asset('back/assets/js/theme-settings.js') }}"></script>

    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <!-- Summernote init script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
    </script>

    <script>
    function deleteImage(index, imagePath) {
        Swal.fire({
            title: 'Əminsiniz?',
            text: "Bu şəkli silmək istədiyinizə əminsiniz?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Bəli, sil!',
            cancelButtonText: 'İmtina'
        }).then((result) => {
            if (result.isConfirmed) {
                const blogId = {{ $blog->id ?? 0 }};
                const url = `{{ route('back.pages.blogs.delete-image', ['blog' => ':blog', 'index' => ':index']) }}`
                    .replace(':blog', blogId)
                    .replace(':index', index);

                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if(!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if(data.success) {
                        // Tüm resim container'larını yeniden yükle
                        document.querySelectorAll(`[data-image-index="${index}"]`).forEach(element => {
                            element.remove();
                        });
                        Swal.fire('Silindi!', data.message, 'success');
                    } else {
                        Swal.fire('Xəta!', data.message, 'error');
                    }
                })
                .catch(error => {
                    Swal.fire('Xəta!', error.message, 'error');
                });
            }
        })
    }
    </script>
</body>


<!-- Mirrored from themesdesign.in/upcube/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Oct 2023 05:30:06 GMT -->

</html>
