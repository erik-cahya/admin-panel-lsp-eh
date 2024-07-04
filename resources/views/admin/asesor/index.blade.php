@extends('admin.layouts.master')
@section('css_page')
    <!-- Datatables css -->
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Theme Config Js -->
    <script src="{{ asset('velonic_admin') }}/assets/js/config.js"></script>

    <!-- App css -->
    <link href="{{ asset('velonic_admin') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('velonic_admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Surat</a></li>
                            <li class="breadcrumb-item active">Surat Tugas Asesor</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Surat Tugas Asesor</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Data Asesor</h4>
                        <p class="text-muted mb-0">
                            Anda bisa menambahkan dan mendownload data asesor, foto, serta tanda tangan.
                        </p>
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons"
                            class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Nama Asesor</th>
                                    <th>No REG</th>
                                    <th>No Telp</th>
                                    <th>Alamat</th>
                                    <th>Data</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataAsesor as $asesor)

                                <tr>
                                    <td>

                                        <div class="d-flex align-items-start justify-content-between">
                                            <div class="d-flex">
                                                <a class="me-2" href="#">
                                                    <img class="avatar-sm rounded-circle bx-s" src="{{ $asesor->foto_asesor == null ? asset('velonic_admin/assets/images/users/avatar-2.jpg') : asset('img/foto_asesor/' . $asesor->foto_asesor)  }}" alt="">
                                                </a>
                                                <div class="info">
                                                    <h5 class="fs-14 my-1">{{ $asesor->nama_asesor }}</h5>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td>{{ $asesor->no_reg }}</td>
                                    <td>{{ $asesor->no_telp }}</td>
                                    <td>
                                        {{ Str::limit($asesor->alamat, 50) }}
                                    </td>
                                    <td>
                                        {{-- Download Foto Profile --}}
                                        @if ($asesor->foto_asesor == null)
                                                <span class="text-muted">Tidak Ada Gambar</span>
                                            @else
                                                <a class="d-block" href="{{ asset('img/foto_asesor/' . $asesor->foto_asesor) }}" download="{{ $asesor->foto_asesor }}">Download Foto</a>
                                        @endif

                                        <a class="d-block" href="#">Download Tanda Tangan</a>
                                    </td>
                                    <td>
                                        {{-- <a href="javascript: void(0);" class="text-reset fs-16 px-1"> <i
                                        class="ri-delete-bin-2-line"></i></a> --}}

                                         {{-- Delete Button --}}
                                         <form action="/asesor/{{ $asesor->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?')">
                                                <i class="ri-delete-bin-2-line"></i>
                                            </button>
                                        </form>

                                        <a href="javascript: void(0);" class="text-reset fs-16 px-1"> <i
                                        class="ri-edit-line"></i></a>
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
     <script src="{{ asset('velonic_admin') }}/assets/js/pages/datatable.init.js"></script>

     <!-- App js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/app.min.js"></script>

@endsection
