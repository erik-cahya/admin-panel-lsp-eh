@extends('admin.layouts.master')
@section('css_page')
    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="{{ asset('velonic_admin') }}/assets/vendor/daterangepicker/daterangepicker.css">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('velonic_admin') }}/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">
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

        <form enctype="multipart/form-data" method="POST" action="{{ route('surat-tugas-asesor.store') }}">
            @csrf
               <!-- start page title -->
               <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Form Elements</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Create Data Asesor</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Form Create Surat Tugas Asesor</h4>
                                    <p class="text-muted mb-0">
                                        Inputkan data asesor LSP pada form dibawah | <code> Anda dapat juga meng-upload foto asesor dan tanda tangan untuk mempermudah keperluan administrasi</code>
                                    </p>
                                </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 mb-4">
                                                <label class="form-label">Nama Asesor<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-newspaper-fill"></i> </div>
                                                    <input type="text" class="form-control" placeholder="Inputkan Nama Asesor">
                                                </div>

                                                @error('nomor_surat')
                                                    <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 mb-4">
                                                <label class="form-label">No REG<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-newspaper-fill"></i> </div>
                                                    <input type="text" class="form-control" placeholder="Inputkan No REG">
                                                </div>

                                                @error('nomor_surat')
                                                    <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 mb-4">
                                                <label class="form-label">No Telp<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-newspaper-fill"></i> </div>
                                                    <input type="text" class="form-control" placeholder="Inputkan Nama Asesor">
                                                </div>

                                                @error('nomor_surat')
                                                    <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 mb-4">
                                                <label class="form-label">Alamat<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-newspaper-fill"></i> </div>
                                                    <input type="text" class="form-control" placeholder="Inputkan No REG">
                                                </div>

                                                @error('nomor_surat')
                                                    <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="justify-content-start row">
                                            <div class="col-3">
                                                <button type="submit" class="btn btn-info">Save</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>

                <!-- [ Main Content ] end -->

        </form>

    </div>
    <!-- container -->

</div>
@endsection
@section('js_page')
     <!-- Vendor js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/vendor.min.js"></script>
     <!-- Daterangepicker js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/daterangepicker/moment.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/daterangepicker/daterangepicker.js"></script>

     <!-- Apex Charts js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>

     <!-- Vector Map js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

     <!-- Dashboard App js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/pages/dashboard.js"></script>
     <!-- App js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/app.min.js"></script>

@endsection
