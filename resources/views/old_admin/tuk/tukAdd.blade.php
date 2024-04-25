@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                        <li class="breadcrumb-item">TUK</li>
                        <li class="breadcrumb-item active" aria-current="page">TAMBAH TUK</li>
                    </ol>
                </nav>
                <h1 class="m-0">Tambah TUK</h1>
            </div>
            <a href="{{ route('tuk') }}" class="btn btn-success ml-3">List TUK <i class="material-icons">add</i></a>
        </div>

        <div class="card card-form">
            <div class="row no-gutters">

                <div class="card-form__body card-body">

                    {{-- Form Add TUK --}}
                    <form enctype="multipart/form-data" method="POST" action="{{ route('tukAdded') }}">
                        @csrf

                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tuk_nama">Nama TUK</label>
                                    <input type="text" name="tuk_nama" class="form-control" placeholder="Nama TUK"
                                        required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tuk_alamat">Alamat TUK</label>
                                    <input id="tuk_alamat" name="tuk_alamat" type="text" class="form-control"
                                        placeholder="Alamat TUK" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tuk_namaCP">Nama Kontak Person TUK</label>
                                    <input type="text" name="tuk_namaCP" class="form-control"
                                        placeholder="Nama Kontak Person TUK">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tuk_kontakCP">Telp Kontak Person TUK</label>
                                    <input id="tuk_kontakCP" name="tuk_kontakCP" type="text" class="form-control"
                                        placeholder="Telp Kontak Person TUK">
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
@endsection
