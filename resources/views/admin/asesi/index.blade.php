@extends('admin.layouts.master')
@section('css_page')
    <!-- Datatables css -->
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="{{ asset('velonic_admin') }}/assets/js/config.js"></script>

    <!-- Select2 css -->
    <link href="{{ asset('velonic_admin') }}/assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />


    <!-- App css -->
    <link href="{{ asset('velonic_admin') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('velonic_admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <style>
        .hover-menu{
            display: none;
        }

        .hoverMenuContainer:hover > .hover-menu{
            display: block;
        }

        /* .hover-menu-container:hover + .hover-menu{
            display: block;
            background-color: blue;
        } */
    </style>
@endsection

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">{{ $titlePage }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ $titlePage }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <label class="form-label">Judul Skema Data</label>
                        <select class="form-select form-control select2" data-toggle="select2" data-select2-selector="visibility" id="nama_asesor" name="nama_asesor" >
                            <option data-icon="feather-user" selected readonly disabled>Pilih Data Skema...</option>
                                <option data-icon="feather-user" value="Badung">PEMKAB BADUNG 2024 | 300</option>
                                <option data-icon="feather-user" value="Badung">PEMKAB BADUNG 2023 | 156</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary mt-2">Search Data</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">{{ $titlePage }}</h4>
                        <p class="text-muted mb-0">
                            Anda bisa menambahkan dan mendownload {{ $titlePage }}, foto, serta tanda tangan.
                        </p>
                        <a href="{{ route('asesiCompact') }}">Compact Mode</a>
                    </div>
                    <div class="card-body">
                        <table id="scroll-horizontal-datatable" class="table table-bordered w-100 nowrap" style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Lengkap Asesi</th>
                                    <th>Nama Tempat Bekerja</th>
                                    <th>Alamat Tempat Bekerja</th>
                                    <th>NIK</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat Tempat Tinggal</th>
                                    <th>No Telp</th>
                                    <th>Email</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Jabatan Pekerjaan</th>
                                    <th>Skema Sertifikasi</th>
                                    <th>Rencana Uji Kompetensi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataAsesi as $asesi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="hoverMenuContainer">
                                        {{ $asesi->nama_lengkap }} 
                                        
                                        <div class="row hover-menu">
                                            <div class="col">
                                                Edit | 
                                                {{-- Delete Button --}}
                                                <form action="/asesi/{{ $asesi->id }}" method="POST" class="d-inline">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    
                                                    <input type="hidden" id="idAsesi" name="id_surat" value="{{ $asesi->id }}">
                                                    <span type="button" class="text-danger deleteButton" data-nama="{{ $asesi->nama_lengkap }}">Delete</span>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $asesi->nama_tempat_bekerja }}</td>
                                    <td>{{ Str::limit($asesi->alamat, 30) }}</td>
                                    <td>{{ $asesi->nik }}</td>
                                    <td>{{ $asesi->tempat_lahir }}</td>
                                    <td>{{ $asesi->tanggal_lahir }}</td>
                                    <td>{{ $asesi->jenis_kelamin }}</td>
                                    <td>{{ $asesi->alamat_tempat_tinggal }}</td>
                                    <td>{{ $asesi->telp }}</td>
                                    <td>{{ $asesi->email }}</td>
                                    <td>{{ $asesi->pendidikan_terakhir }}</td>
                                    <td>{{ $asesi->jabatan_pekerjaan }}</td>
                                    <td>{{ $asesi->skema_sertifikasi }}</td>
                                    <td>{{ $asesi->rencana_uji_kompetensi }}</td>
                                    
                                    <td>
                                        Edit | 
                                        
                                        {{-- Delete Button --}}
                                        <form action="/asesi/{{ $asesi->id }}" method="POST" class="d-inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <input type="hidden" id="idAsesi" name="id_surat" value="{{ $asesi->id }}">
                                            <span type="button" class="text-danger deleteButton" data-nama="{{ $asesi->nama_lengkap }}">Delete</span>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->

    </div>
    <!-- container -->

</div>

@endsection
@section('js_page')
     <!-- Vendor js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/vendor.min.js"></script>

     <!--  Select2 Plugin Js -->
    <script src="{{ asset('velonic_admin') }}/assets/vendor/select2/js/select2.min.js"></script>

     <!-- Datatables js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

     <!-- Datatable Demo Aapp js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/pages/datatable.js"></script>

     <!-- App js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/app.js"></script>

     {{-- Sweet Alert --}}
    <script>
        document.addEventListener("click", function (event) {
            if (event.target.classList.contains("deleteButton")) {
                const asesId = event.target.closest("tr").querySelector('input[name="id_surat"]').value;
                const namaAsesor = event.target.getAttribute("data-nama");

                Swal.fire({
                    title: "Are you sure?",
                    text: "Apakah Anda ingin menghapus data " + namaAsesor + " ?",
                    icon: "warning",
                    showCancelButton: true,
                }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        fetch(`/asesi/${asesId}`, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            }
                        }).then(response => {
                            if (response.ok) {
                                Swal.fire(
                                    'Terhapus',
                                    'Data Berhasil Dihapus',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: "Error",
                                    text: "Gagal menghapus data.",
                                    icon: "error",
                                });
                            }
                        }).catch(err => {
                            Swal.fire({
                                title: "Error",
                                text: "Terjadi kesalahan pada server.",
                                icon: "error",
                            });
                        });
                    } else {
                        Swal.fire({
                            title: "Dibatalkan",
                            text: "Data batal dihapus.",
                            icon: "error",
                        });
                    }
                });
            }
        });
    </script>
    {{-- /* End Sweet Alert --}}

@endsection
