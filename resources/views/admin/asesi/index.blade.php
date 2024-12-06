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
                                    <th>NO</th>
                                    <th>Nama Asesi</th>
                                    <th>NIK</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kode Kabupaten</th>
                                    <th>Kode Provinsi</th>
                                    <th>Telp</th>
                                    <th>Email</th>
                                    <th>Kode Pendidikan</th>
                                    <th>Kode Pekerjaan</th>
                                    <th>Kode Jadwal</th>
                                    <th>Tanggal Uji</th>
                                    <th>Nomor Registrasi Asesor</th>
                                    <th>Kode Sumber Anggaran</th>
                                    <th>Kode Kementrian</th>
                                    <th>Status Kompeten</th>
                                    <th>Status Kompeten</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataAsesi as $asesi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $asesi->nama_asesi }}
                                    </td>
                                    <td>{{ $asesi->nik }}</td>
                                    <td>{{ $asesi->tempat_lahir }}</td>
                                    <td>{{ $asesi->tanggal_lahir }}</td>
                                    <td>{{ $asesi->jenis_kelamin }}</td>
                                    <td>{{ $asesi->tempat_tinggal }}</td>
                                    <td>{{ $asesi->kode_kabupaten }}</td>
                                    <td>{{ $asesi->kode_provinsi }}</td>
                                    <td>{{ $asesi->telp }}</td>
                                    <td>{{ $asesi->email }}</td>
                                    <td>{{ $asesi->kode_pendidikan }}</td>
                                    <td>{{ $asesi->kode_pekerjaan }}</td>
                                    <td>{{ $asesi->kode_jadwal }}</td>
                                    <td>{{ $asesi->tanggal_uji }}</td>
                                    <td>{{ $asesi->nomor_registrasi_asesor }}</td>
                                    <td>{{ $asesi->kode_sumber_anggaran }}</td>
                                    <td>{{ $asesi->kode_kementrian }}</td>
                                    <td>{{ $asesi->status_kompeten }}</td>
                                    
                                    <td>
                                        Edit | 
                                        
                                        {{-- Delete Button --}}
                                        <form action="/asesi/{{ $asesi->id }}" method="POST" class="d-inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <input type="hidden" name="id_surat" value="{{ $asesi->id }}">

                                            <span type="button" class="text-danger" id="deleteButton-{{ $asesi->id }}">Delete</span>
                                        </form>
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
        @foreach ($dataAsesi as $asesi)
            document.getElementById("deleteButton-{{ $asesi->id }}").addEventListener("click", function() {

            Swal.fire({
                    title: "Are you sure?",
                    text: "Apakah Anda Yakin Ingin Mengapus {{ $titlePage }} Ini ?",
                    icon: "warning",
                    showCancelButton: true,
            }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        fetch("{{ route('asesor.destroy', $asesi->id) }}", {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                            Swal.fire(
                                'Terhapus',
                                '{{ $titlePage }} Berhasil Dihapus',
                                'success'
                            ).then((result) =>{
                                if (result.isConfirmed){
                                window.location.href = "{{ route('asesor.index') }}";
                                }
                            })
                            }
                        })
                    } else {
                    Swal.fire({
                        title: "Dibatalkan",
                        text: "{{ $titlePage }} Batal Dihapus",
                        icon: "error",});
                    }
                });
            });
        @endforeach
    </script>
    {{-- /* End Sweet Alert --}}

@endsection
