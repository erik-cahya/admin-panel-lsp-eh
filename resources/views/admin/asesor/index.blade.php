@extends('admin.layouts.master')
@section('css_page')
    <!-- Datatables css -->
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="{{ asset('velonic_admin') }}/assets/js/config.js"></script>

    <!-- App css -->
    <link href="{{ asset('velonic_admin') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('velonic_admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

     <style>
        .hover-menu{
            display: none;
        }

        .hoverMenuContainer:hover .hover-menu{
            cursor: pointer;
            display: block;
        }

        /* .hover-menu-container:hover + .hover-menu{
            display: block;
            background-color: blue;
        } */
    </style>
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
                            Anda bisa menambahkan dan mendownload {{ $titlePage }}, foto, serta tanda tangan.
                        </p>
                        <a href="{{ route('asesor-compact') }}">Compact Mode</a>
                    </div>
                    <div class="card-body">
                        <table id="scroll-horizontal-datatable" class="table table-bordered w-100 nowrap" style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Asesor</th>
                                    <th>No REG</th>
                                    <th>No Telp</th>
                                    <th>Alamat</th>
                                    <th>No NPWP</th>
                                    <th>Data</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataAsesor as $asesor)
                                <tr class="hoverMenuContainer">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>

                                        <div class="d-flex align-items-start justify-content-between">
                                            <div class="d-flex">
                                                <a class="me-2" href="#" data-bs-toggle="modal" data-bs-target="#modalSurat{{ $asesor->id }}">
                                                    <img class="avatar-sm rounded-circle bx-s" src="{{ $asesor->foto_asesor == null ? asset('velonic_admin/assets/images/users/avatar-2.jpg') : asset('img/foto_asesor/' . $asesor->foto_asesor)  }}" alt="">
                                                </a>
                                                <div class="info">
                                                    <h6>{{ $asesor->nama_asesor }}</h6>

                                                    <div class="row hover-menu">
                                                        <div class="col">
                                                            Details | Edit |

                                                            {{-- Delete Button --}}
                                                            <form action="/asesor/{{ $asesor->id }}" method="POST" class="d-inline">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}

                                                                <input type="hidden" id="idAsesor" name="id_asesor" value="{{ $asesor->id }}">
                                                                <span type="button" class="text-danger deleteButton" data-nama="{{ $asesor->nama_asesor }}">Delete</span>
                                                            </form>
                                                            {{-- End Delete Button --}}

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td>{{ $asesor->no_reg }}</td>
                                    <td>{{ $asesor->no_telp }}</td>
                                    <td>{{ Str::limit($asesor->alamat, 50) }}</td>
                                    <td>{{ $asesor->no_npwp }}</td>
                                    <td>
                                        {{-- Download Foto Profile --}}
                                        @if ($asesor->foto_asesor == null)
                                                <span class="text-muted d-block">Tidak Ada Gambar Profile</span>
                                            @else
                                                <a class="d-block" href="{{ asset('img/foto_asesor/' . $asesor->foto_asesor) }}" download="{{ $asesor->foto_asesor }}">Download Profile</a>
                                        @endif

                                        {{-- Download Foto Profile --}}
                                        @if ($asesor->gambar_tanda_tangan == null)
                                                <span class="text-muted d-block">Tidak ada Tanda Tangan</span>
                                            @else
                                                <a class="d-block" href="{{ asset('img/gambar_tanda_tangan/' . $asesor->gambar_tanda_tangan) }}" download="{{ $asesor->gambar_tanda_tangan }}">Download Tanda Tangan</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group mb-2">
                                            {{-- See Details --}}
                                            <button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#modalSurat{{ $asesor->id }}">
                                                <i class="ri-eye-line"></i>
                                            </button>

                                            {{-- Edit Button --}}
                                            <a href="/asesor/{{ $asesor->id }}/edit" class="btn btn-md btn-success" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" data-bs-title="Edit">
                                                <i class="ri-edit-line"></i>
                                            </a>


                                            {{-- Delete Button --}}
                                            <form action="/asesor/{{ $asesor->id }}" method="POST" class="d-inline">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <input type="hidden" id="idAsesor" name="id_asesor" value="{{ $asesor->id }}">

                                                <span type="button" class="btn btn-md btn-danger deleteButton" data-nama="{{ $asesor->nama_asesor }}">
                                                    <i class="ri-delete-bin-2-line"></i>
                                                </span>


                                            </form>
                                            {{-- End Delete Button --}}

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
@foreach ($dataAsesor as $asesor)
<div class="modal fade" id="modalSurat{{ $asesor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title" id="info-header-modalLabel">Surat Tugas {{ $asesor->nama_asesor }}</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Modal Content --}}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Nama Asesor</label>
                                <input class="form-control" type="text" value="{{ $asesor->nama_asesor }}" disabled>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="skema" class="form-label">No REG Asesor</label>
                                <input class="form-control" type="text" value="{{ $asesor->no_reg }}" disabled>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="skema" class="form-label">NPWP Asesor</label>
                                <input class="form-control" type="text" value="{{ $asesor->no_npwp }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="skema" class="form-label">No Telp Asesor</label>
                                <input class="form-control" type="text" value="{{ $asesor->no_telp }}" disabled>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input class="form-control" type="text" value="{{ $asesor->alamat }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="skema" class="form-label">Foto Profile Asesor</label>
                                <img src="{{ $asesor->foto_asesor == null ? asset('velonic_admin/assets/images/users/avatar-2.jpg') : asset('img/foto_asesor/' . $asesor->foto_asesor)  }}" class="avatar-lg d-block" width="200px">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Tanda Tangan Asesor</label>
                                <img src="{{ $asesor->gambar_tanda_tangan == null ? asset('velonic_admin/assets/images/users/avatar-2.jpg') : asset('img/gambar_tanda_tangan/' . $asesor->gambar_tanda_tangan)  }}" class="avatar-lg d-block" width="200px">
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
        document.addEventListener("click", function (event) {
            if (event.target.classList.contains("deleteButton")) {
                const asesorId = event.target.closest("tr").querySelector('input[name="id_asesor"]').value;
                const namaAsesor = event.target.getAttribute("data-nama");

                console.log(namaAsesor);
                Swal.fire({
                    title: "Are you sure?",
                    text: "Apakah Anda ingin menghapus data " + namaAsesor + " ?",
                    icon: "warning",
                    showCancelButton: true,
                }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        // const url = `/asesor.destroy/${asesorId}`;
                        const url = `{{ route('asesor.destroy', ':id') }}`.replace(':id', asesorId);
                        console.log(url);
                        fetch(url, {

                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            }
                        }).then(response => {
                            if (response.ok) {
                                Swal.fire(
                                    'Terhapus',
                                    'Data Berhasil Dihapus',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                        // console.log("URL Fetch:", "{{ route('asesiDeleted'," . asesorId . ") }}");

                                });
                            } else {
                                Swal.fire({
                                    title: "Error",
                                    text: "Gagal menghapus data.",
                                    icon: "error",
                                });
                            }
                        }).catch(err => {
                            Swal.fire({
                                title: "Error",
                                text: "Terjadi kesalahan pada server.",
                                icon: "error",
                            });
                        });
                    } else {
                        Swal.fire({
                            title: "Dibatalkan",
                            text: "Data batal dihapus.",
                            icon: "error",
                        });
                    }
                });
            }
        });
    </script>
    {{-- /* End Sweet Alert --}}

@endsection
