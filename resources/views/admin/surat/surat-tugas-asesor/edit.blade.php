@extends('admin.layouts.master')
@section('css_page')
     <!-- App favicon -->
     <link rel="shortcut icon" href="{{ asset('velonic_admin') }}/assets/images/favicon.ico">

     <!-- Select2 css -->
     <link href="{{ asset('velonic_admin') }}/assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

     <!-- Daterangepicker css -->
     <link href="{{ asset('velonic_admin') }}/assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />

     <!-- Bootstrap Touchspin css -->
     <link href="{{ asset('velonic_admin') }}/assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet"
         type="text/css" />

     <!-- Bootstrap Datepicker css -->
     <link href="{{ asset('velonic_admin') }}/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

     <!-- Bootstrap Timepicker css -->
     <link href="{{ asset('velonic_admin') }}/assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />

     <!-- Flatpickr Timepicker css -->
     <link href="{{ asset('velonic_admin') }}/assets/vendor/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

     <!-- Theme Config Js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/config.js"></script>

     <!-- App css -->
     <link href="{{ asset('velonic_admin') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

     <!-- Icons css -->
     <link href="{{ asset('velonic_admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
@endsection


@section('content')
<div class="content">
    <div class="container-fluid">
        <form enctype="multipart/form-data" method="POST" action="{{ route('surat-tugas-asesor.update', $dataSurat->id) }}">
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
                        <h4 class="page-title">Create Surat Tugas Asesor</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
                <!-- [ Main Content ] start -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Form Edit Surat Tugas Asesor</h4>
                                    <p class="text-muted mb-0">
                                        Edit data yang diperlukan untuk surat tugas asesor pada form dibawah | <code> Nomor Surat Tugas Tidak Dapat Diubah!</code>
                                    </p>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        {{-- Nomor Surat --}}
                                        <div class="col-lg-6 mb-4">
                                            <label class="form-label">Nomor Surat<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-user"></i></div>
                                                <input type="text" class="form-control" id="nomor_surat" oninput="capitalizeText()" name="nomor_surat" readonly value="{{ $dataSurat->nomor_surat }}">
                                            </div>
                                            @error('nomor_surat')
                                                <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Skema --}}
                                        <div class="col-lg-6 mb-4">
                                            <label class="form-label">Skema</label>
                                            <select class="form-control" data-select2-selector="city" id="skema" name="skema">
                                                <option data-city="bg-muted" selected readonly disabled>Pilih Skema Uji</option>
                                                @foreach ($dataSkema as $skema)
                                                    <option data-city="bg-warning" value="{{ $skema->nama_skema }}" {{ $dataSurat->skema == $skema->nama_skema ? 'selected' : '' }}>{{ $skema->nama_skema }}</option>
                                                @endforeach
                                            </select>
                                            @error('skema')
                                                <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">

                                        {{-- Nama Asesor --}}
                                        <div class="col-lg-6 mb-4">
                                            <label class="form-label">Nama Asesor:</label>
                                            <select class="form-select form-control" data-select2-selector="visibility" id="nama_asesor" name="nama_asesor" >
                                                <option data-icon="feather-user" selected readonly disabled>Pilih Asesor</option>
                                                @foreach ($dataAsesor as $asesor)
                                                    <option data-icon="feather-user" value="{{ $asesor->nama_asesor }}" {{ $dataSurat->nama_asesor == $asesor->nama_asesor ? 'selected' : '' }}>{{ $asesor->nama_asesor }}</option>
                                                @endforeach
                                            </select>
                                            @error('nama_asesor')
                                                <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- NO REG --}}
                                        <div class="col-lg-6 mb-4">
                                            <label class="form-label">NO REG<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="no_reg_asesor" placeholder="Pilih Nama Asesor"  name="no_reg" readonly>
                                        </div>

                                    </div>

                                    <div class="row">
                                        {{-- Nama TUK --}}
                                        <div class="col-lg-6 mb-4">
                                            <label class="form-label">Nama TUK:</label>
                                            <select class="form-select form-control" data-select2-selector="visibility" name="nama_tuk" id="nama_tuk">
                                                <option data-icon="feather-home" selected readonly disabled>Pilih TUK</option>
                                                @foreach ($tuk as $t)
                                                    <option data-icon="feather-home" value="{{ $t->tuk_nama }}" {{ $dataSurat->nama_tuk == $t->tuk_nama ? 'selected' : '' }}>{{ $t->tuk_nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('nama_tuk')
                                                <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Alamat TUK --}}
                                        <div class="col-lg-6 mb-4">
                                            <label class="form-label">Alamat TUK<span class="text-danger">*</span></label>
                                            <input id="alamat_tuk" name="alamat_tuk" type="text" class="form-control" placeholder="Alamat TUK" readonly>
                                        </div>

                                    </div>
                                    <div class="row">
                                        {{-- Tanggal Uji --}}
                                        <div class="col-lg-6 mb-4">
                                            <label class="form-label">Tanggal Uji <span class="text-danger">*</span></label>
                                            <input class="form-control" id="dateUji" placeholder="Pilih Tanggal Ujian" name="tanggal_uji" value="{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $dataSurat->tanggal_uji)->format('d/m/Y') }}">
                                            @error('tanggal_uji')
                                                <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Tanggal Surat --}}
                                        <div class="col-lg-6 mb-4">
                                            <label class="form-label">Tanggal Surat <span class="text-danger">*</span></label>
                                            <input class="form-control" id="dateSurat" placeholder="Pilih Tanggal Surat" name="tanggal_surat" value="{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $dataSurat->tanggal_surat)->format('d/m/Y') }}">
                                            @error('tanggal_surat')
                                                <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <!-- [ Main Content ] end -->

        </form>
    </div>
</div>
@endsection
@section('js_page')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var datepicker = new Datepicker(document.getElementById('dateUji'), {
            format: 'dd/mm/yyyy'
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var datepicker = new Datepicker(document.getElementById('dateSurat'), {
            format: 'dd/mm/yyyy'
        });
    });
</script>


<script>
    function capitalizeText() {
        var input = document.getElementById("nomor_surat");
        input.value = input.value.toUpperCase();
    }
</script>

    {{-- Get Location TUK Automatic --}}
    {{-- <script src="{{ asset('noble_panel/assets/js/jquery-3.5.1.min.js') }}"></script> --}}
    <script src="{{ asset('noble_panel/assets/js/jquery-3.5.1.min.js') }}"></script>

    <script type='text/javascript'>
        $(document).ready(function() {

            loadDataTuk();

                function loadDataTuk() {
                    var tuk_id = $("#nama_tuk").val();
                    $.ajax({
                        url: '../../get_data_tuk/' + tuk_id,
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            $("#alamat_tuk").val(response['data'][0].tuk_alamat);
                        }
                    });
                }
            $('#nama_tuk').change(function() {
                loadDataTuk();
            });
        });
    </script>

    {{-- Get Asesor NO Reg Automatic --}}
    <script type='text/javascript'>
        $(document).ready(function() {

            loadDataAsesor();

            function loadDataAsesor(){
                var asesor_id = $("#nama_asesor").val();
                $.ajax({
                    url: '../../get_data_asesor/' + asesor_id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        $("#no_reg_asesor").val(response['data'][0].no_reg);
                    }
                });
            }
            $('#nama_asesor').change(function(){
                loadDataAsesor();
            });
        });
    </script>



     <!-- Vendor js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/vendor.min.js"></script>

     <!--  Select2 Plugin Js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/select2/js/select2.min.js"></script>

     <!-- Daterangepicker Plugin js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/daterangepicker/moment.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/daterangepicker/daterangepicker.js"></script>

     <!-- Bootstrap Datepicker Plugin js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

     <!-- Bootstrap Timepicker Plugin js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>

     <!-- Input Mask Plugin js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/jquery-mask-plugin/jquery.mask.min.js"></script>

     <!-- Bootstrap Touchspin Plugin js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

     <!-- Bootstrap Maxlength Plugin js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

     <!-- Typehead Plugin js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/handlebars/handlebars.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/typeahead.js/typeahead.bundle.min.js"></script>

     <!-- Flatpickr Timepicker Plugin js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/flatpickr/flatpickr.min.js"></script>

     <!-- Typehead Demo js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/pages/typehead.init.js"></script>

     <!-- Timepicker Demo js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/pages/timepicker.init.js"></script>

     <!-- App js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/app.min.js"></script>


@endsection
