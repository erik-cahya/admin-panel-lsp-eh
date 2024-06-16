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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Surat</a></li>
                            <li class="breadcrumb-item active">Surat Tugas Asesor</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Surat Tugas Asesor</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Data Surat Tugas</h4>
                        <p class="text-muted mb-0">
                            Anda bisa mendownload surat dengan format .pdf ataupun .doc
                        </p>
                    </div>
                    <div class="card-body">

                        <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                            <thead>
                                <tr>
                                    <th>No Surat</th>
                                    <th>Nama Asesor</th>
                                    <th>Tempat TUK</th>
                                    <th>Skema</th>
                                    <th>Tanggal Uji</th>
                                    <th>Tanggal Surat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_surat as $dt_surat)

                                <tr>
                                    <td><span class="badge bg-success">{{ $dt_surat->nomor_surat }}</span></td>
                                    <td>

                                        <div class="d-flex align-items-start justify-content-between">
                                            <div class="d-flex">
                                                <a class="me-2" href="#">
                                                    <img class="avatar-sm rounded-circle bx-s" src="{{ asset('velonic_admin') }}/assets/images/users/avatar-2.jpg" alt="">
                                                </a>

                                                <div class="info">
                                                    <h5 class="fs-14 my-1">{{ $dt_surat->nama_asesor }}</h5>
                                                    <p class="text-muted fs-12">{{ $dt_surat->no_reg }}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td>

                                        <div class="d-flex align-items-start justify-content-between">
                                            <div class="d-flex">


                                                <a class="social-list-item bg-dark-subtle text-secondary fs-16 border-0 me-2"
                                                title="" data-bs-toggle="tooltip" data-bs-placement="top"
                                                class="tooltips" href="" data-bs-title="Facebook"><i
                                                    class="ri-building-line"></i></a>

                                                <div class="info">
                                                    <h5 class="fs-14 my-1">{{ $dt_surat->nama_tuk }}</h5>
                                                    <p class="text-muted fs-12">{{ Str::limit($dt_surat->alamat_tuk, 50) }}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td>{{ Str::limit($dt_surat->skema, 40) }}</td>
                                    <td>{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $dt_surat->tanggal_uji)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</td>
                                    <td>{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $dt_surat->tanggal_surat)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</td>
                                    <td>
                                        <div class="btn-group mb-2">

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalSurat{{ $dt_surat->id }}"><i class="ri-eye-line"></i> </button>

                                            <div class="btn-group">

                                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-equalizer-line me-1"></i> Details</button>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('surat-tugas-asesor.generatePdf', $dt_surat->id) }}" target="_blank"><i class="ri-file-pdf-fill"></i> Download PDF</a>
                                                    <a class="dropdown-item" href="{{ route('surat-tugas-asesor.download', $dt_surat->id) }}"><i class="ri-file-word-fill"></i> Download DOC</a>

                                                     {{-- Edit Button --}}
                                                     <form action="{{ route('surat-tugas-asesor.edit', $dt_surat->id) }}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id_surat" value="{{ $dt_surat->id }}">
                                                        <div class="dropdown-divider"></div>

                                                        <button type="submit" class="dropdown-item">
                                                            <i class="ri-edit-fill"></i> Edit
                                                        </button>

                                                    </form>

                                                    {{-- Delete Button --}}
                                                    <form action="{{ route('surat-tugas-asesor.delete', $dt_surat->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <input type="hidden" name="id_surat" value="{{ $dt_surat->id }}">
                                                        <button type="button" id="deleteButton-{{ $dt_surat->id }}" class="dropdown-item">
                                                            <i class="ri-delete-bin-2-fill"></i> Delete Surat
                                                        </button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Modal --}}
@foreach ($data_surat as $dt_surat)
    <div class="modal fade" id="modalSurat{{ $dt_surat->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title" id="info-header-modalLabel">Surat Tugas {{ $dt_surat->nama_asesor }}
                    </h4>
                    <button type="button" class="btn-close btn-close-white"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Modal Content --}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Nomor Surat</label>
                                <input id="nomor_surat" name="nomor_surat" type="text" class="form-control" readonly value="{{ $dt_surat->nomor_surat }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="skema" class="form-label">Skema</label>
                                <input id="nomor_surat" name="nomor_surat" type="text" class="form-control" readonly value="{{ $dt_surat->skema }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="skema" class="form-label">Asesor</label>
                                <input id="nomor_surat" name="nomor_surat" type="text" class="form-control" readonly value="{{ $dt_surat->nama_asesor }}" disabled>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">NO Reg</label>
                                <input type="text" id="no_reg_asesor" class="form-control" id="no_reg" name="no_reg" value="{{ $dt_surat->no_reg }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="skema" class="form-label">Nama TUK</label>
                                <input id="nomor_surat" name="nomor_surat" type="text" class="form-control" readonly value="{{ $dt_surat->nama_tuk }}" disabled>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Alamat TUK</label>
                                <input id="alamat_tuk" name="alamat_tuk" type="text" class="form-control" value="{{ $dt_surat->alamat_tuk }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="skema" class="form-label">Tanggal Ujian</label>
                                <input id="nomor_surat" name="nomor_surat" type="text" class="form-control" readonly value="{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $dt_surat->tanggal_uji)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}" disabled>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Surat</label>
                                <input id="alamat_tuk" name="alamat_tuk" type="text" class="form-control" value="{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $dt_surat->tanggal_surat)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Dibuat Surat</label>
                                <input id="alamat_tuk" name="alamat_tuk" type="text" class="form-control" value="{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $dt_surat->created_at)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}" disabled>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Download Surat</label>
                                <div class="container">
                                    <a class="btn btn-info btn-sm" href="{{ route('surat-tugas-asesor.download', $dt_surat->id) }}"><i class="far fa-file-word"></i> Download Word </a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('surat-tugas-asesor.generatePdf', $dt_surat->id) }}" target="_blank"><i class="fas fa-file-pdf"></i> Download PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Modal Content --}}
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
    <script src="{{ asset('velonic_admin') }}/assets/js/pages/datatable.init.js"></script>

    <!-- App js -->
    <script src="{{ asset('velonic_admin') }}/assets/js/app.min.js"></script>

    <script>
        const exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const recipient = button.getAttribute('data-bs-whatever')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            const modalTitle = exampleModal.querySelector('.modal-title')
            const modalBodyInput = exampleModal.querySelector('.modal-body input')

            modalTitle.textContent = `New message to ${recipient}`
            modalBodyInput.value = recipient
        })
    </script>

    {{-- Sweet Alert --}}
    <script>
        @foreach ($data_surat as $dt_surat)
            document.getElementById("deleteButton-{{ $dt_surat->id }}").addEventListener("click", function() {

            Swal.fire({
                    title: "Are you sure?",
                    text: "Apakah anda yakin ingin mengapus surat tugas ini ?",
                    icon: "warning",
                    showCancelButton: true,
            }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        fetch("{{ route('surat-tugas-asesor.delete', $dt_surat->id) }}", {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                            Swal.fire(
                                'Terhapus',
                                'Surat Tugas Berhasil Dihapus',
                                'success'
                            ).then((result) =>{
                                if (result.isConfirmed){
                                window.location.href = "{{ route('surat-tugas-asesor.view') }}";
                                }
                            })
                            }
                        })
                    } else {
                    Swal.fire({
                        title: "Dibatalkan",
                        text: "Surat Tugas Batal Dihapus",
                        icon: "error",});
                    }
                });
            });
        @endforeach
    </script>
    {{-- /* End Sweet Alert --}}
@endsection
