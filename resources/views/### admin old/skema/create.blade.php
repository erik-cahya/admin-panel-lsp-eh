@extends('admin.layouts.master')
@section('content')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
          <h4 class="mb-3 mb-md-0">Tambah Data Skema Ujian LSP Engineering</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="/asesor" class="btn btn-primary btn-sm">List Skema</a>
        </div>
    </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h6 class="card-title">Form add data skema</h6>
                        <form class="forms-sample mt-4" enctype="multipart/form-data" method="POST" action="/skema">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_skema" class="form-label">Nama Skema</label>
                                <input type="text" id="nama_skema" name="nama_skema" class="form-control" autocomplete="off" placeholder="Masukkan Nama Skema Ujian" value="{{ old('nama_skema') }}">
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
<script>
    @if ($errors->has('nama_skema'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });

        Toast.fire({
            icon: 'error',
            title: "{{ $errors->first('nama_skema') }}",
        });
    @endif
</script>
@endsection
