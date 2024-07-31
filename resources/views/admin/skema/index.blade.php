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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Data LSP</a></li>
                            <li class="breadcrumb-item active">Skema LSP</li>
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
                                    <th>No</th>
                                    <th>Tempat Skema</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataSkema as $skema)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-start justify-content-between">
                                                <div class="d-flex">
                                                    <a class="social-list-item bg-dark-subtle text-secondary fs-16 border-0 me-2">
                                                        <i class="ri-building-line"></i>
                                                    </a>
                                                    <div class="info">
                                                        <h5 class="my-1" style="font-size: 13px">{{ $skema->nama_skema }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group mb-2">
                                                {{-- Edit Button --}}
                                                <a href="/asesor/{{ $skema->id }}/edit" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" data-bs-title="Edit">
                                                    <i class="ri-edit-line"></i>
                                                </a>

                                                 {{-- Delete Button --}}
                                                <form action="/skema/{{ $skema->id }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <input type="hidden" name="id_surat" value="{{ $skema->id }}">
                                                    <button type="button" id="deleteButton-{{ $skema->id }}" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" data-bs-title="Delete">
                                                        <i class="ri-delete-bin-2-line"></i>
                                                    </button>
                                                </form>
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

    {{-- Sweet Alert --}}
    <script>
        @foreach ($dataSkema as $skema)
            document.getElementById("deleteButton-{{ $skema->id }}").addEventListener("click", function() {

            Swal.fire({
                    title: "Are you sure?",
                    text: "Apakah anda yakin ingin mengapus Skema ?",
                    icon: "warning",
                    showCancelButton: true,
            }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        fetch("{{ route('skema.destroy', $skema->id) }}", {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                            Swal.fire(
                                'Terhapus',
                                'Data Skema Berhasil Dihapus',
                                'success'
                            ).then((result) =>{
                                if (result.isConfirmed){
                                window.location.href = "{{ route('skema.index') }}";
                                }
                            })
                            }
                        })
                    } else {
                    Swal.fire({
                        title: "Dibatalkan",
                        text: "Data Skema Batal Dihapus",
                        icon: "error",});
                    }
                });
            });
        @endforeach
    </script>
    {{-- /* End Sweet Alert --}}
@endsection
