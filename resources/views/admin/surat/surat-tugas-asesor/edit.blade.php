@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                        <li class="breadcrumb-item">SURAT</li>
                        <li class="breadcrumb-item active" aria-current="page">SURAT TUGAS ASESOR</li>
                    </ol>
                </nav>
                <h1 class="m-0">Edit Surat Tugas Asesor</h1>
            </div>
            <a href="{{ route('surat-tugas-asesor.view') }}" class="btn btn-success ml-3">Lihat Surat<i
                    class="material-icons">add</i></a>
        </div>

        <div class="card card-form">
            <div class="row no-gutters">

                <div class="card-form__body card-body">

                    {{-- Form Surat --}}
                    <form enctype="multipart/form-data" method="POST"
                        action="{{ route('surat-tugas-asesor.update', $dataSurat->id) }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nomor_surat">Nomor Surat</label>
                                    <input id="nomor_surat" oninput="capitalizeText()" name="nomor_surat" type="text"
                                        class="form-control" placeholder="26/ST-LSP-EHI/IV/2023"
                                        value="{{ $dataSurat->nomor_surat }}" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">


                                    <label for="skema">Skema</label>

                                    <select id="skema" name="skema" class="form-control" required>
                                        <option selected readonly disabled>Pilih Skema Uji</option>

                                        <option value="Mekanik Heating, Ventilation Dan Air Condition (HVAC)"
                                            {{ $dataSurat->skema == 'Mekanik Heating, Ventilation Dan Air Condition (HVAC)' ? 'selected' : '' }}>
                                            Mekanik
                                            Heating, Ventilation Dan Air Condition (HVAC)</option>

                                        <option value="Pelaksanaan Instalasi AC"
                                            {{ $dataSurat->skema == 'Pelaksanaan Instalasi AC' ? 'selected' : '' }}>
                                            Pelaksanaan Instalasi AC</option>

                                        <option value="Perawatan Mesin Pendingin / AC"
                                            {{ $dataSurat->skema == 'Perawatan Mesin Pendingin / AC' ? 'selected' : '' }}>
                                            Perawatan
                                            Mesin Pendingin / AC
                                        </option>

                                        <option value="Teknisi Lemari Pendingin"
                                            {{ $dataSurat->skema == 'Teknisi Lemari Pendingin' ? 'selected' : '' }}>
                                            Teknisi
                                            Lemari Pendingin</option>

                                        <option value="Teknisi Refrigerasi Domestik"
                                            {{ $dataSurat->skema == 'Teknisi Refrigerasi Domestik' ? 'selected' : '' }}>
                                            Teknisi
                                            Refrigerasi Domestik</option>
                                    </select>


                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                {{-- <label for="nama_asesor">Nama Asesor</label> --}}

                                <label for="selectOption">Asesor</label>

                                <select id="selectOption" onchange="fillText()" name="nama_asesor" class="form-control"
                                    required>
                                    <option selected readonly disabled>Pilih Asesor</option>
                                    <option value="Alit Aditya Angga Widiarsah"
                                        {{ $dataSurat->nama_asesor == 'Alit Aditya Angga Widiarsah' ? 'selected' : '' }}>
                                        Alit Aditya Angga Widiarsah</option>
                                    <option value="Anton Kurniawan"
                                        {{ $dataSurat->nama_asesor == 'Anton Kurniawan' ? 'selected' : '' }}>
                                        Anton Kurniawan</option>
                                    <option value="I Dewa Made Yudiarta"
                                        {{ $dataSurat->nama_asesor == 'I Dewa Made Yudiarta' ? 'selected' : '' }}>I
                                        Dewa Made Yudiarta</option>
                                    <option value="I Gede Sumerta"
                                        {{ $dataSurat->nama_asesor == 'I Gede Sumerta' ? 'selected' : '' }}>I
                                        Gede Sumerta</option>
                                    <option value="I Gede Swastika"
                                        {{ $dataSurat->nama_asesor == 'I Gede Swastika' ? 'selected' : '' }}>I
                                        Gede Swastika</option>
                                    <option value="I Gusti Agung Putu Prawira Deasy Suharta"
                                        {{ $dataSurat->nama_asesor == 'I Gusti Agung Putu Prawira Deasy Suharta' ? 'selected' : '' }}>
                                        I
                                        Gusti Agung Putu Prawira
                                        Deasy Suharta</option>
                                    <option value="I Gusti Made Sutama Arsa"
                                        {{ $dataSurat->nama_asesor == 'I Gusti Made Sutama Arsa' ? 'selected' : '' }}>I
                                        Gusti Made Sutama Arsa</option>
                                    <option value="I Komang Sutarmika"
                                        {{ $dataSurat->nama_asesor == 'I Komang Sutarmika' ? 'selected' : '' }}>I
                                        Komang Sutarmika</option>
                                    <option value="I Made Arta"
                                        {{ $dataSurat->nama_asesor == 'I Made Arta' ? 'selected' : '' }}>I
                                        Made Arta</option>
                                    <option value="I Made Juni Suaryana"
                                        {{ $dataSurat->nama_asesor == 'I Made Juni Suaryana' ? 'selected' : '' }}>I
                                        Made Juni Suaryana</option>
                                    <option value="I Nengah Jati"
                                        {{ $dataSurat->nama_asesor == 'I Nengah Jati' ? 'selected' : '' }}>I
                                        Nengah Jati</option>
                                    <option value="I Putu Angga Sukma Primantara"
                                        {{ $dataSurat->nama_asesor == 'I Putu Angga Sukma Primantara' ? 'selected' : '' }}>
                                        I
                                        Putu Angga Sukma Primantara</option>
                                    <option value="I Wayan Mudiarta"
                                        {{ $dataSurat->nama_asesor == 'I Wayan Mudiarta' ? 'selected' : '' }}>I
                                        Wayan Mudiarta</option>
                                    <option value="I Wayan Widiyasa"
                                        {{ $dataSurat->nama_asesor == 'I Wayan Widiyasa' ? 'selected' : '' }}>I
                                        Wayan Widiyasa</option>
                                    <option value="Ribut Ponco Purnomo"
                                        {{ $dataSurat->nama_asesor == 'Ribut Ponco Purnomo' ? 'selected' : '' }}>
                                        Ribut Ponco Purnomo</option>
                                    <option value="I Gusti Agung Wahyu Paranagita"
                                        {{ $dataSurat->nama_asesor == 'I Gusti Agung Wahyu Paranagita' ? 'selected' : '' }}>
                                        I Gusti Agung Wahyu Paranagita</option>
                                </select>

                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="no_reg">No REG</label>
                                <input type="text" id="textInput" class="form-control" id="no_reg" name="no_reg"
                                    placeholder="Pilih Nama Asesor" readonly>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nama_tuk">Nama TUK</label>
                                    <input type="text" name="nama_tuk" class="form-control" placeholder="Nama TUK"
                                        value="{{ $dataSurat->nama_tuk }}" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="alamat_tuk">Alamat TUK</label>
                                    <input id="alamat_tuk" name="alamat_tuk" type="text" class="form-control"
                                        placeholder="Alamat TUK" value="{{ $dataSurat->alamat_tuk }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tangal_uji">Tanggal Uji</label>
                                    <input type="date" id="tanggal_uji" name="tanggal_uji" class="form-control"
                                        value="{{ $dataSurat->tanggal_uji }}" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tanggal_surat">Tanggal Surat</label>
                                    <input type="date" id="tanggal_surat" name="tanggal_surat" class="form-control"
                                        value="{{ $dataSurat->tanggal_surat }}" required>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
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
        window.onload = function() {
            fillText();
        };

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
@endsection
