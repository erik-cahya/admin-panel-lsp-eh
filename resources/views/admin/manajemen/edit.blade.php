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
        <form enctype="multipart/form-data" method="POST" action="{{ route('manajemen.update', $dataManajemen->id) }}">
            @csrf
            @method('PUT')
               <!-- start page title -->
               <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">LSP Engineering Hospitality Indonesia</a></li>
                                <li class="breadcrumb-item"><a href="/manajemen">{{ $titlePage }}</a></li>
                                <li class="breadcrumb-item active">Edit Data {{ $titlePage }}</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Data {{ $titlePage }}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Form Edit {{ $titlePage }}</h4>
                            <p class="text-muted mb-0">
                                Edit data {{ $titlePage }} pada form dibawah | <code> Anda dapat juga meng-upload foto asesor dan tanda tangan untuk mempermudah keperluan administrasi</code>
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <label class="form-label">Nama Manajemen<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ri-newspaper-fill"></i> </div>
                                        <input type="text" class="form-control" placeholder="Inputkan Nama Asesor" name="nama_manajemen" value="{{ old('nama_manajemen', $dataManajemen->nama_manajemen) }}">
                                    </div>

                                    @error('nama_manajemen')
                                        <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-4">
                                            <label class="form-label">No REG<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ri-newspaper-fill"></i> </div>
                                        <input type="text" class="form-control" placeholder="Inputkan No Telp" name="no_telp" value="{{ old('no_telp', $dataManajemen->no_telp) }}">
                                    </div>

                                    @error('no_telp')
                                        <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <label class="form-label">Jabatan<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ri-newspaper-fill"></i> </div>
                                        <input type="text" class="form-control" placeholder="Inputkan Jabatan" name="jabatan" value="{{ old('jabatan', $dataManajemen->jabatan) }}">
                                    </div>

                                    @error('jabatan')
                                        <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <label class="form-label">Alamat<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ri-newspaper-fill"></i> </div>
                                        <input type="text" class="form-control" placeholder="Inputkan Alamat Asesor" name="alamat" value="{{ old('alamat', $dataManajemen->alamat) }}">
                                    </div>

                                    @error('alamat')
                                        <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <label for="foto_manajemen" class="form-label">Upload Foto Manajemen (Opsional)</label>
                                    <input type="file" id="foto_manajemen" name="foto_manajemen" class="form-control" onchange="previewImage()">
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <label for="gambar_tanda_tangan" class="form-label">Upload Tanda Tangan (Opsional)</label>
                                    <input type="file" id="gambar_tanda_tangan" name="gambar_tanda_tangan" class="form-control" onchange="previewImageTandaTangan()">
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <img src="{{ asset($dataManajemen->foto_manajemen === null ? 'velonic_admin/assets/images/users/avatar-2.jpg' : 'img/foto_manajemen/'.$dataManajemen->foto_manajemen) }}" class="foto_manajemen img-thumbnail" width="200px">
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <img src="{{ asset($dataManajemen->gambar_tanda_tangan === null ? 'velonic_admin/assets/images/users/avatar-2.jpg' : 'img/gambar_tanda_tangan/'.$dataManajemen->gambar_tanda_tangan) }}" class="gambar_tanda_tangan img-thumbnail" width="200px">
                                </div>

                            </div>
                            <div class="justify-content-start row">
                                <div class="col-3">
                                    <button type="submit" class="btn btn-info">Save Data Asesor</button>
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
    <script>
        // untuk membuat preview gambar
        function previewImage() {
            const image = document.querySelector('#foto_manajemen');
            const imgPreview = document.querySelector('.foto_manajemen');

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
    <script>
        // untuk membuat preview gambar
        function previewImageTandaTangan() {
            const image = document.querySelector('#gambar_tanda_tangan');
            const imgPreview = document.querySelector('.gambar_tanda_tangan');

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
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
