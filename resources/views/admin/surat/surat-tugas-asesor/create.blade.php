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
                                    <select id="selectOption" onchange="fillText()" name="nama_asesor" class="form-select" required>
                                        <option selected readonly disabled>Pilih Asesor</option>
                                        <option value="Alit Aditya Angga Widiarsah">Alit Aditya Angga Widiarsah</option>
                                        <option value="Anton Kurniawan">Anton Kurniawan</option>
                                        <option value="I Dewa Made Yudiarta">I Dewa Made Yudiarta</option>
                                        <option value="I Gede Sumerta">I Gede Sumerta</option>
                                        <option value="I Gede Swastika">I Gede Swastika</option>
                                        <option value="I Gusti Agung Putu Prawira Deasy Suharta">I Gusti Agung Putu Prawira Deasy Suharta</option>
                                        <option value="I Gusti Made Sutama Arsa">I Gusti Made Sutama Arsa</option>
                                        <option value="I Komang Sutarmika">I Komang Sutarmika</option>
                                        <option value="I Made Arta">I Made Arta</option>
                                        <option value="I Made Juni Suaryana">I Made Juni Suaryana</option>
                                        <option value="I Nengah Jati">I Nengah Jati</option>
                                        <option value="I Putu Angga Sukma Primantara">I Putu Angga Sukma Primantara</option>
                                        <option value="I Wayan Mudiarta">I Wayan Mudiarta</option>
                                        <option value="I Wayan Widiyasa">I Wayan Widiyasa</option>
                                        <option value="Ribut Ponco Purnomo">Ribut Ponco Purnomo</option>
                                        <option value="I Gusti Agung Wahyu Paranagita">I Gusti Agung Wahyu Paranagita</option>
                                        <option value="Ida Bagus Gde Widiantara, S.T., M.T.">Ida Bagus Gde Widiantara, S.T., M.T.</option>
                                    </select>

                                    @error('nama_asesor')
                                        <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">NO Reg</label>
                                    <input type="text" id="textInput" class="form-control" id="no_reg" name="no_reg" placeholder="Pilih Nama Asesor" readonly>
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
        function fillText() {
            var selectValue = document.getElementById("selectOption").value;
            var textField = document.getElementById("textInput");
            // Javascript untuk autofill asesor
            switch (selectValue) {
                case "Alit Aditya Angga Widiarsah":
                    textField.value = "MET.000.005572 2018";
                    break;
                case "Anton Kurniawan":
                    textField.value = "MET.000.005575 2018";
                    break;
                case "I Dewa Made Yudiarta":
                    textField.value = "MET.000.000877 2020";
                    break;
                case "I Gede Sumerta":
                    textField.value = "MET.000.009823 2018";
                    break;
                case "I Gede Swastika":
                    textField.value = "MET.000.005573 2018";
                    break;
                case "I Gusti Agung Putu Prawira Deasy Suharta":
                    textField.value = "MET.000.000882 2020";
                    break;
                case "I Gusti Made Sutama Arsa":
                    textField.value = "MET. 000.001817.2018";
                    break;
                case "I Komang Sutarmika":
                    textField.value = "MET.000.005577 2018";
                    break;
                case "I Made Arta":
                    textField.value = "MET.000.005574 2018";
                    break;
                case "I Made Juni Suaryana":
                    textField.value = "MET.000.005576 2018";
                    break;
                case "I Nengah Jati":
                    textField.value = "MET.000.010638 2016";
                    break;
                case "I Putu Angga Sukma Primantara":
                    textField.value = "MET.000.005590 2018";
                    break;
                case "I Wayan Mudiarta":
                    textField.value = "MET.000.000880 2020";
                    break;
                case "I Wayan Widiyasa":
                    textField.value = "MET.000.000878 2020";
                    break;
                case "Ribut Ponco Purnomo":
                    textField.value = "MET.000.000879 2020";
                    break;
                case "I Gusti Agung Wahyu Paranagita":
                    textField.value = "MET.000.005578 2018";
                    break;
                case "Ida Bagus Gde Widiantara, S.T., M.T.":
                    textField.value = "MET.000.006969 2021";
                    break;

                default:
                    textField.value = ""; // Bersihkan value jika tidak ada yang di select
            }
        }

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
                        console.log(response['data'][0].tuk_alamat);


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
