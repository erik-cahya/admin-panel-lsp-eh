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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">TUK LSP</a></li>
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
                            Anda bisa mendownload surat dengan format .pdf ataupun .doc
                        </p>
                    </div>
                    <div class="card-body">

                        <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tempat TUK</th>
                                    <th>Pengelola TUK</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataTuk as $tuk)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-start justify-content-between">
                                                <div class="d-flex">
                                                    <a class="social-list-item bg-dark-subtle text-secondary fs-16 border-0 me-2">
                                                        <i class="ri-building-line"></i>
                                                    </a>
                                                    <div class="info">
                                                        <h5 class="my-1">{{ $tuk->tuk_nama }}</h5>
                                                        <p class="text-muted">{{ $tuk->tuk_alamat }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-start justify-content-between">
                                                <div class="d-flex">
                                                    <a class="social-list-item bg-dark-subtle text-secondary fs-16 border-0 me-2" >
                                                        <i class="ri-user-line"></i>
                                                    </a>
                                                    @if ($tuk->tuk_namaCP !== null)
                                                        <div class="info">
                                                            <h5 class="my-1">{{ $tuk->tuk_namaCP }}</h5>
                                                            <p class="text-muted">{{ preg_replace('/(\d{4})(\d{4})(\d{4})/', '$1-$2-$3', str_pad($tuk->tuk_kontakCP, 12, '0', STR_PAD_RIGHT)) }}</p>
                                                        </div>
                                                    @else
                                                        <p class="text-muted">Tidak Ada Kontak</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="btn-group mb-2">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-equalizer-line me-1"></i> Details</button>
                                                    <div class="dropdown-menu">
                                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalSurat{{ $tuk->id }}">
                                                            <i class="ri-edit-fill"></i> Edit
                                                        </button>
                                                        
                                                        {{-- Delete Button --}}
                                                        <form action="{{ route('tukDeleted', $tuk->id) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}

                                                            <input type="hidden" name="id_surat" value="{{ $tuk->id }}">

                                                            <button type="button" id="deleteButton-{{ $tuk->id }}" class="dropdown-item">
                                                                <i class="ri-delete-bin-2-fill"></i> Delete TUK
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
@foreach ($dataTuk as $tuk)
    <div class="modal fade" id="modalSurat{{ $tuk->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title" id="info-header-modalLabel">Edit Data TUK {{ $tuk->tuk_nama }}
                    </h4>
                    <button type="button" class="btn-close btn-close-white"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Modal Content --}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="nama_tuk">Nama TUK</label>
                                <input id="nama_tuk" name="nama_tuk" type="text" class="form-control" value="{{ $tuk->tuk_nama }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="tuk_alamat" class="form-label">Alamat</label>
                                <input id="tuk_alamat" name="tuk_alamat" type="text" class="form-control" value="{{ $tuk->tuk_alamat }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="tuk_namaCP" class="form-label">Nama Contact Person</label>
                                <input id="tuk_namaCP" name="tuk_namaCP" type="text" class="form-control" value="{{ $tuk->tuk_namaCP }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="tuk_kontakCP" class="form-label">Nomor Contact Person</label>
                                <input id="tuk_kontakCP" name="tuk_kontakCP" type="text" class="form-control" value="{{ $tuk->tuk_kontakCP }}">
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
        @foreach ($dataTuk as $tuk)
            document.getElementById("deleteButton-{{ $tuk->id }}").addEventListener("click", function() {

            Swal.fire({
                    title: "Are you sure?",
                    text: "Apakah anda yakin ingin mengapus TUK ?",
                    icon: "warning",
                    showCancelButton: true,
            }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        fetch("{{ route('tukDeleted', $tuk->id) }}", {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                            Swal.fire(
                                'Terhapus',
                                'Data TUK Berhasil Dihapus',
                                'success'
                            ).then((result) =>{
                                if (result.isConfirmed){
                                window.location.href = "{{ route('tuk') }}";
                                }
                            })
                            }
                        })
                    } else {
                    Swal.fire({
                        title: "Dibatalkan",
                        text: "Data TUK Batal Dihapus",
                        icon: "error",});
                    }
                });
            });
        @endforeach
    </script>
    {{-- /* End Sweet Alert --}}
@endsection
