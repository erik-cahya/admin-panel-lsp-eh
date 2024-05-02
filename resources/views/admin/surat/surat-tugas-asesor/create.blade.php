@extends('admin.layouts.master')
@section('css_page')
	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/vendors/select2/select2.min.css">
	<link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/vendors/jquery-tags-input/jquery.tagsinput.min.css">
	<link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/vendors/dropzone/dropzone.min.css">
	<link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/vendors/dropify/dist/dropify.min.css">
	<link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/vendors/pickr/themes/classic.min.css">
	<link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/vendors/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/vendors/flatpickr/flatpickr.min.css">
	<!-- End plugin css for this page -->
@endsection
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
          <h4 class="mb-3 mb-md-0">Create Surat Tugas Asesor</h4>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Surat</h6>
                    <form enctype="multipart/form-data" method="POST" action="{{ route('surat-tugas-asesor.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Nomor Surat</label>
                                    <input id="nomor_surat" oninput="capitalizeText()" name="nomor_surat" type="text" class="form-control" readonly value="{{ $nomor_surat }}">

                                    @error('nomor_surat')
                                        <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="skema" class="form-label">Skema</label>
                                    <select id="skema" name="skema" class="form-select" required>
                                        <option selected readonly disabled>Pilih Skema Uji</option>
                                            <option value="Mekanik Heating, Ventilation Dan Air Condition (HVAC)">Mekanik Heating, Ventilation Dan Air Condition (HVAC)</option>
                                            <option value="Pelaksanaan Instalasi AC">Pelaksanaan Instalasi AC</option>
                                            <option value="Perawatan Mesin Pendingin / AC">Perawatan Mesin Pendingin / AC</option>
                                            <option value="Teknisi Lemari Pendingin">Teknisi Lemari Pendingin</option>
                                            <option value="Teknisi Refrigerasi Domestik">Teknisi Refrigerasi Domestik</option>
                                    </select>

                                    @error('skema')
                                        <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="skema" class="form-label">Asesor</label>
                                    <select id="nama_asesor" name="nama_asesor" class="form-select" required>
                                        <option selected readonly disabled>Pilih Asesor</option>
                                        @foreach ($dataAsesor as $asesor)
                                            <option value="{{ $asesor->nama_asesor }}">{{ $asesor->nama_asesor }}</option>
                                        @endforeach
                                    </select>

                                    @error('nama_asesor')
                                        <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">NO Reg</label>
                                    <input type="text" id="no_reg_asesor" class="form-control" id="no_reg" name="no_reg" placeholder="Pilih Nama Asesor" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="skema" class="form-label">Nama TUK</label>
                                    <select name="nama_tuk" id="nama_tuk" class="form-select" required>
                                        <option selected readonly disabled>Pilih TUK</option>
                                        @foreach ($tuk as $t)
                                            <option value="{{ $t->tuk_nama }}">{{ $t->tuk_nama }}</option>
                                        @endforeach
                                    </select>

                                    @error('nama_tuk')
                                        <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Alamat TUK</label>
                                    <input id="alamat_tuk" name="alamat_tuk" type="text" class="form-control" placeholder="Alamat TUK" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Tanggal Uji</h6>
                                        <div class="input-group flatpickr" id="flatpickr-date">
                                            <input type="text" name="tanggal_uji" class="form-control" placeholder="Select date" data-input>
                                            <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Tanggal Surat</h6>
                                        <div class="input-group flatpickr" id="flatpickr-date">
                                            <input type="text" name="tanggal_surat" class="form-control" placeholder="Select date" data-input>
                                            <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js_partials')

    <script src="{{ asset('admin_panel') }}/assets/vendor/jquery.mask.min.js"></script>

    {{-- !-- Flatpickr --> --}}
    <script src="{{ asset('admin_panel') }}/assets/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="{{ asset('admin_panel') }}/assets/js/flatpickr.js"></script>


    <script>

        function capitalizeText() {
            var input = document.getElementById("nomor_surat");
            input.value = input.value.toUpperCase();
        }
    </script>

    {{-- Get Location TUK Automatic --}}
    <script src="{{ asset('noble_panel/assets/js/jquery-3.5.1.min.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

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

    <!-- Custom js for this page -->
	<script src="{{ asset('noble_panel') }}/assets/js/flatpickr.js"></script>


    <!-- Plugin js for this page -->
	<script src="{{ asset('noble_panel') }}/assets/vendors/flatpickr/flatpickr.min.js"></script>


@endsection
