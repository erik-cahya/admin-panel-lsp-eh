@extends('admin.layouts.master')
@section('content')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
          <h4 class="mb-3 mb-md-0">Surat Tugas Asesor</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{ route('tuk') }}" class="btn btn-primary btn-sm">List TUK</a>
        </div>
    </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h6 class="card-title">Basic Form</h6>
                        <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('tukAdded') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="tuk_nama" class="form-label">Nama TUK</label>
                                <input type="text" id="tuk_nama" name="tuk_nama" class="form-control" autocomplete="off" placeholder="Nama TUK" required>
                            </div>

                            <div class="mb-3">
                                <label for="tuk_alamat" class="form-label">Alamat TUK</label>
                                <input type="text" name="tuk_alamat" id="tuk_alamat" class="form-control" autocomplete="off" placeholder="Alamat TUK" required>
                            </div>

                            <div class="mb-3">
                                <label for="tuk_namaCP" class="form-label">Nama Kontak Person TUK</label>
                                <input type="text" name="tuk_namaCP" id="tuk_namaCP" class="form-control" autocomplete="off" placeholder="Nama Kontak Person TUK" required>
                            </div>

                            <div class="mb-3">
                                <label for="tuk_kontakCP" class="form-label">Telp Kontak Person TUK</label>
                                <input type="text" name="tuk_kontakCP" id="tuk_kontakCP" class="form-control" autocomplete="off" placeholder="Telp Kontak Person TUK" required>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Add Data</button>
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
@endsection
