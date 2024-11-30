@extends('admin.layouts.master')
@section('css_page')
    <!-- Datatables css -->
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('velonic_admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('velonic_admin') }}/assets/js/config.js"></script>
@endsection

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">{{ $titlePage }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ $titlePage }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">{{ $titlePage }}</h4>
                        <p class="text-muted mb-0">
                            Anda bisa menambahkan dan mendownload data asesor, foto, serta tanda tangan.
                        </p>
                        <a href="{{ route('manajemen-compact') }}">Compact Mode</a>
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped w-100 nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No Telp</th>
                                    <th>Alamat</th>
                                    <th>Jabatan</th>
                                    <th>Data</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataManajemen as $manajemen)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>

                                        <div class="d-flex align-items-start justify-content-between">
                                            <div class="d-flex">
                                                <a class="me-2" href="#" data-bs-toggle="modal" data-bs-target="#modalSurat{{ $manajemen->id }}">
                                                    <img class="avatar-sm rounded-circle bx-s" src="{{ $manajemen->foto_manajemen == null ? asset('velonic_admin/assets/images/users/avatar-2.jpg') : asset('img/foto_manajemen/' . $manajemen->foto_manajemen)  }}" alt="">
                                                </a>
                                                <div class="info">
                                                    <h5 class="fs-14 my-1">{{ $manajemen->nama_manajemen }}</h5>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td>{{ $manajemen->no_telp }}</td>
                                    <td>
                                        {{ Str::limit($manajemen->alamat, 50) }}
                                    </td>
                                    <td>{{ $manajemen->jabatan }}</td>

                                    <td>
                                        {{-- Download Foto Profile --}}
                                        @if ($manajemen->foto_manajemen == null)
                                                <span class="text-muted d-block">Tidak Ada Gambar Profile</span>
                                            @else
                                                <a class="d-block" href="{{ asset('img/foto_manajemen/' . $manajemen->foto_manajemen) }}" download="{{ $manajemen->foto_manajemen }}">Download Profile</a>
                                        @endif

                                        {{-- Download Foto Profile --}}
                                        @if ($manajemen->gambar_tanda_tangan == null)
                                                <span class="text-muted d-block">Tidak ada Tanda Tangan</span>
                                            @else
                                                <a class="d-block" href="{{ asset('img/gambar_tanda_tangan/' . $manajemen->gambar_tanda_tangan) }}" download="{{ $manajemen->gambar_tanda_tangan }}">Download Tanda Tangan</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group mb-2">
                                            {{-- See Details --}}
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSurat{{ $manajemen->id }}">
                                                <i class="ri-eye-line"></i>
                                            </button>

                                            {{-- Edit Button --}}
                                            <a href="/asesor/{{ $manajemen->id }}/edit" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" data-bs-title="Edit">
                                                <i class="ri-edit-line"></i>
                                            </a>

                                             {{-- Delete Button --}}
                                            <form action="/asesor/{{ $manajemen->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <input type="hidden" name="id_surat" value="{{ $manajemen->id }}">

                                                <button type="button" id="deleteButton-{{ $manajemen->id }}" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" data-bs-title="Delete">
                                                    <i class="ri-delete-bin-2-line"></i>
                                                </button>
                                            </form>




                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->

    </div>
    <!-- container -->

</div>
{{-- Modal --}}
@foreach ($dataManajemen as $manajemen)
    <div class="modal fade" id="modalSurat{{ $manajemen->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title" id="info-header-modalLabel">Data Manajemen {{ $manajemen->nama_manajemen }}</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Modal Content --}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Manajemen</label>
                                <input class="form-control" type="text" value="{{ $manajemen->nama_manajemen }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="skema" class="form-label">No Telp</label>
                                <input class="form-control" type="text" value="{{ $manajemen->no_telp }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="skema" class="form-label">Jabatan</label>
                                <input class="form-control" type="text" value="{{ $manajemen->jabatan }}" disabled>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input class="form-control" type="text" value="{{ $manajemen->alamat }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="skema" class="form-label">Foto Profile Asesor</label>
                                <img src="{{ $manajemen->foto_manajemen == null ? asset('velonic_admin/assets/images/users/avatar-2.jpg') : asset('img/foto_manajemen/' . $manajemen->foto_manajemen)  }}" class="avatar-lg d-block" width="200px">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Tanda Tangan Asesor</label>
                                <img src="{{ $manajemen->gambar_tanda_tangan == null ? asset('velonic_admin/assets/images/users/avatar-2.jpg') : asset('img/gambar_tanda_tangan/' . $manajemen->gambar_tanda_tangan)  }}" class="avatar-lg d-block" width="200px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- /* End Modal -->
@endsection
@section('js_page')
     <!-- Vendor js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/vendor.min.js"></script>

     <!-- Datatables js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

     <!-- Datatable Demo Aapp js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/pages/datatable.js"></script>

     <!-- App js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/app.js"></script>

     {{-- Sweet Alert --}}
    <script>
        @foreach ($dataManajemen as $manajemen)
            document.getElementById("deleteButton-{{ $manajemen->id }}").addEventListener("click", function() {
                Swal.fire({
                        title: "Are you sure?",
                        text: "Apakah Anda Yakin Ingin Mengapus Data Manajemen Ini ?",
                        icon: "warning",
                        showCancelButton: true,
                }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        fetch("{{ route('manajemen.destroy', $manajemen->id) }}", {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                            Swal.fire(
                                'Terhapus',
                                'Data Manajemen Berhasil Dihapus',
                                'success'
                            ).then((result) =>{
                                if (result.isConfirmed){
                                window.location.href = "{{ route('manajemen.index') }}";
                                }
                            })
                            }
                        })
                    } else {
                    Swal.fire({
                        title: "Dibatalkan",
                        text: "Data Manajemen Batal Dihapus",
                        icon: "error",});
                    }
                });
            });
        @endforeach
    </script>
    {{-- /* End Sweet Alert --}}
@endsection
