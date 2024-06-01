@extends('admin.layouts.master')
@section('css_page')
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/vendors.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/tagify.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/tagify-data.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/quill.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/select2.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/select2-theme.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/datepicker.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/css/theme.min.css">
@endsection


@section('content')
<form enctype="multipart/form-data" method="POST" action="{{ route('surat-tugas-asesor.store') }}">
    @csrf
    <div class="nxl-content" style="min-height: 100vh">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Create Surat Tugas Asesor</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Surat Tugas Asesor</li>
                    <li class="breadcrumb-item">Create</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex d-md-none">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                        <button type="submit" class="btn btn-primary">
                            <i class="feather-save me-2"></i>
                            <span>Save</span>
                        </button>
                    </div>
                </div>
                <div class="d-md-none d-flex align-items-center">
                    <a href="javascript:void(0)" class="page-header-right-open-toggle">
                        <i class="feather-align-right fs-20"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- [ page-header ] end -->
        <!-- [ Main Content ] start -->
        <div class="main-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card stretch stretch-full">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label class="form-label">Nomor Surat<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="text" class="form-control" id="nomor_surat" oninput="capitalizeText()" name="nomor_surat" readonly value="{{ $nomor_surat }}">
                                        </div>
                                        @error('nomor_surat')
                                            <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <label class="form-label">Skema</label>
                                        <select class="form-control" data-select2-selector="city" id="skema" name="skema">
                                            <option data-city="bg-muted" selected readonly disabled>Pilih Skema Uji</option>
                                            @foreach ($dataSkema as $skema)
                                                <option data-city="bg-warning" value="{{ $skema->nama_skema }}">{{ $skema->nama_skema }}</option>
                                            @endforeach
                                        </select>
                                        @error('skema')
                                            <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label class="form-label">Nama Asesor:</label>
                                        <select class="form-select form-control" data-select2-selector="visibility" id="nama_asesor" name="nama_asesor" >
                                            <option data-icon="feather-user" selected readonly disabled>Pilih Asesor</option>
                                            @foreach ($dataAsesor as $asesor)
                                                <option data-icon="feather-user" value="{{ $asesor->nama_asesor }}">{{ $asesor->nama_asesor }}</option>
                                            @endforeach
                                        </select>
                                        @error('nama_asesor')
                                            <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 mb-4">
                                        <label class="form-label">NO REG<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="no_reg_asesor" placeholder="Pilih Nama Asesor"  name="no_reg" readonly>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label class="form-label">Nama TUK:</label>
                                        <select class="form-select form-control" data-select2-selector="visibility" name="nama_tuk" id="nama_tuk">
                                            <option data-icon="feather-home" selected readonly disabled>Pilih TUK</option>
                                            @foreach ($tuk as $t)
                                                <option data-icon="feather-home" value="{{ $t->tuk_nama }}">{{ $t->tuk_nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('nama_tuk')
                                            <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 mb-4">
                                        <label class="form-label">Alamat TUK<span class="text-danger">*</span></label>
                                        <input id="alamat_tuk" name="alamat_tuk" type="text" class="form-control" placeholder="Alamat TUK" readonly>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label class="form-label">Tanggal Uji <span class="text-danger">*</span></label>
                                        <input class="form-control" id="startDate" placeholder="Pilih Tanggal Ujian" name="tanggal_uji">
                                        @error('tanggal_uji')
                                            <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <label class="form-label">Tanggal Surat <span class="text-danger">*</span></label>
                                        <input class="form-control" id="dueDate" placeholder="Pilih Tanggal Surat" name="tanggal_surat">
                                        @error('tanggal_surat')
                                            <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</form>
@endsection
@section('js_page')


<script>
    function capitalizeText() {
        var input = document.getElementById("nomor_surat");
        input.value = input.value.toUpperCase();
    }
</script>

    {{-- Get Location TUK Automatic --}}
    {{-- <script src="{{ asset('noble_panel/assets/js/jquery-3.5.1.min.js') }}"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type='text/javascript'>
        $(document).ready(function() {
            $('#nama_tuk').change(function() {
                var tuk_id = $("#nama_tuk").val();
                $.ajax({
                    url: '../get_data_tuk/' + tuk_id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        $("#alamat_tuk").val(response['data'][0].tuk_alamat);
                    }
                });
            });
        });
    </script>

    {{-- Get Asesor NO Reg Automatic --}}
    <script type='text/javascript'>
        $(document).ready(function() {
            $('#nama_asesor').change(function() {
                var asesor_id = $("#nama_asesor").val();
                $.ajax({
                    url: '../get_data_asesor/' + asesor_id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        $("#no_reg_asesor").val(response['data'][0].no_reg);
                    }
                });
            });
        });
    </script>


    <script src="{{ asset('admin_template') }}/assets/vendors/js/vendors.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/vendors/js/tagify.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/vendors/js/tagify-data.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/vendors/js/quill.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/vendors/js/select2.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/vendors/js/select2-active.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/vendors/js/datepicker.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/js/common-init.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/js/proposal-create-init.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/js/theme-customizer-init.min.js"></script>





    <!-- Custom js for this page -->
	{{-- <script src="{{ asset('noble_panel') }}/assets/js/flatpickr.js"></script> --}}


    <!-- Plugin js for this page -->
	{{-- <script src="{{ asset('noble_panel') }}/assets/vendors/flatpickr/flatpickr.min.js"></script> --}}
@endsection
