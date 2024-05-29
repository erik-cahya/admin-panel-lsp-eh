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


    <link id="theme-link" rel="stylesheet" href="{{ asset('noble_panel') }}/assets/css/demo2/style.css">


    <link rel="shortcut icon" href="{{ asset('noble_panel') }}/assets/images/favicon.png" />

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <style>
        .readonly {
            /* Tambahkan gaya yang ingin Anda terapkan di sini */
            cursor: not-allowed;
        }

        /* Mengaktifkan word-wrap pada kolom Alamat dan Contact Person */
        #dataTableExample td.text-wrap {
            word-wrap: break-word;
        }
        .hidden {
            display: none !important;
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
    {{-- <script src="{{ asset('noble_panel') }}/assets/js/template.js"></script> --}}
    <script src="{{ asset('js/page.js') }}"></script>



	<!-- Plugin js for this page -->
  <script src="{{ asset('noble_panel') }}/assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{ asset('noble_panel') }}/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
	<!-- End plugin js for this page -->


    {{-- Sweet Alert JS --}}
    <script src="{{ asset('noble_panel') }}/assets/vendors/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ asset('noble_panel') }}/assets/js/sweet-alert.js"></script>

    @yield('js_partials')



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


    {{-- Loading Effect --}}
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
          // Simulasikan waktu tunggu
          setTimeout(function() {
            // Setelah 2 detik, tampilkan data table dan sembunyikan loading spinner
            document.getElementById('loading').classList.add('hidden');
            document.getElementById('cardTable').classList.remove('hidden');
          }, 1100); // 2 Detik
        });
    </script>
    {{-- /* End Loading Effect --}}
</body>

</html>
