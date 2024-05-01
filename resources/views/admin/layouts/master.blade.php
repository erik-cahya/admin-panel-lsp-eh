<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>LSP Engineering Hospitality Indonesia</title>

    @yield('css_page')

    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/vendors/sweetalert2/sweetalert2.min.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/vendors/core/core.css">

    <link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/vendors/mdi/css/materialdesignicons.min.css">

    <link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/css/demo2/style.css">
    <link rel="shortcut icon" href="{{ asset('noble_panel') }}/assets/images/favicon.png" />

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <style>
        .readonly {
            /* Tambahkan gaya yang ingin Anda terapkan di sini */
            cursor: not-allowed;
        }
    </style>

</head>

<body>
    <div class="main-wrapper">

        {{-- Sidebar --}}
        @include('admin.layouts.sidebar')

        <div class="page-wrapper">

            <!-- navbar/header -->
            @include('admin.layouts.header')


            {{-- Content Web --}}
            @yield('content')


            {{-- Footer --}}
            @include('admin.layouts.footer')

        </div>
    </div>

    <script src="{{ asset('noble_panel') }}/assets/vendors/core/core.js"></script>
    <script src="{{ asset('noble_panel') }}/assets/vendors/feather-icons/feather.min.js"></script>
    <script src="{{ asset('noble_panel') }}/assets/js/template.js"></script>



	<!-- Plugin js for this page -->
  <script src="{{ asset('noble_panel') }}/assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{ asset('noble_panel') }}/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
	<!-- End plugin js for this page -->

	@yield('js_partials')

    <script>
        var readonlyInputs = document.querySelectorAll('input[readonly], select[readonly], textarea[readonly]');
        // Loop melalui setiap elemen dan tambahkan kelas CSS 'readonly'
        readonlyInputs.forEach(function(element) {
            element.classList.add('readonly');
        });
    </script>

    {{-- Sweet Alert JS --}}
    <script src="{{ asset('noble_panel') }}/assets/vendors/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ asset('noble_panel') }}/assets/js/sweet-alert.js"></script>


    {{-- Sweet Alert / Flash Massage --}}
    <script>
        @if(session('flashData'))
            var flashData = @json(session('flashData'));

            Swal.fire({
                title: flashData.judul,
                text: flashData.pesan,
                icon: flashData.swalFlashIcon,
                confirmButtonText: 'OK'
            });
        @endif
    </script>

    {{-- /* End Sweet Alert / Flash Massage --}}
</body>

</html>
