@extends('admin.layouts.master')
@section('content')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
          <h4 class="mb-3 mb-md-0">Tambah Data Asesor LSP Engineering</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="/asesor" class="btn btn-primary btn-sm">List Asesor</a>
        </div>
    </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h6 class="card-title">Form add data asesor</h6>
                        <form class="forms-sample mt-4" enctype="multipart/form-data" method="POST" action="/asesor/{{ $dataAsesor->id }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_asesor" class="form-label">Nama Asesor</label>
                                <input type="text" id="nama_asesor" name="nama_asesor" class="form-control" autocomplete="off" placeholder="Nama Asesoe" value="{{ old('nama_asesor', $dataAsesor->nama_asesor) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="no_reg" class="form-label">NO REG</label>
                                <input type="text" name="no_reg" id="no_reg" class="form-control" autocomplete="off" placeholder="Masukkan No REG Asesor" value="{{ old('no_reg', $dataAsesor->no_reg) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="no_telp" class="form-label">No Telp</label>
                                <input type="text" name="no_telp" id="no_telp" class="form-control" autocomplete="off" placeholder="Masukkan No Telp Asesor" value="{{ old('no_telp', $dataAsesor->no_telp) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" autocomplete="off" placeholder="Masukkan Alamat Asesor" value="{{ old('alamat', $dataAsesor->alamat) }}" required>
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

@endsection
