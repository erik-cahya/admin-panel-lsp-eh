@extends('admin.layouts.master')
@section('css_page')
    <link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
    <style>
        .hide-column {
            display: none;
        }
        .hidden {
            display: none !important;
        }

    </style>
@endsection

{{-- Content Web --}}
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
          <h4 class="mb-3 mb-md-0">Surat Tugas Asesor</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <span class="badge rounded-pill bg-info text-dark">Nomor Surat Terakhir : {{ $nomor_surat_terakhir['nomor_surat'] }}</span>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <span>Filter Table</span>

            <a href="javascript:void(0)" id="NoRegFilterButton" class="badge border bg-primary">No Reg</a>
            <a href="javascript:void(0)" id="tempatTukFilterButton" class="badge border bg-primary">Tempat TUK</a>
            <a href="javascript:void(0)" id="alamatTUKFilterButton" class="badge border bg-primary">Alamat TUK</a>
            <a href="javascript:void(0)" id="skemaFilter" class="badge border bg-primary">Skema</a>
            <a href="javascript:void(0)" id="tanggalUjiFilterButton" class="badge border bg-primary">Tanggal Uji</a>
            <a href="javascript:void(0)" id="tanggalSuratFilterButton" class="badge border bg-primary">Tanggal Surat</a>

        </div>

    </div>


    <div class="row">

        {{-- Loading --}}
        <div class="spinnder d-flex justify-content-center">
            <div id="loading" class="spinner-grow text-danger"></div>
        </div>
        {{-- /* End Loading --}}

        <div class="col-md-12 grid-margin stretch-card hidden" id="cardTable">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Surat Tugas Asesor</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-bordered" style="min-height: 50vh;">
                            <thead>
                                <tr>
                                    <th width="100px">Action</th>
                                    <th width="100px" class="">No Surat</th>
                                    <th class="">Nama Asesor</th>
                                    <th class="columnNoReg">No REG</th>
                                    <th class="columnTempatTuk">Tempat TUK</th>
                                    <th class="columnAlamatTuk">Alamat TUK</th>
                                    <th class="columnSkema">Skema</th>
                                    <th class="columnTanggalUji">Tanggal Uji</th>
                                    <th class="columnTanggalSurat">Tanggal Surat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_surat as $dt_surat)
                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-xs btn-danger btn-icon" data-bs-toggle="modal" data-bs-target="#modalSurat{{ $dt_surat->id }}">
                                                <i data-feather="eye"></i>
                                            </button>

                                            <div class="dropdown" style="display: inline">
                                                <button class="btn btn-success btn-xs dropdown-toggle" type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                                    <a class="dropdown-item" href="{{ route('surat-tugas-asesor.download', $dt_surat->id) }}">Download Word</a>
                                                    <a class="dropdown-item" href="{{ route('surat-tugas-asesor.generatePdf', $dt_surat->id) }}" target="_blank">Download PDF</a>

                                                    {{-- Edit Button --}}
                                                    <form action="{{ route('surat-tugas-asesor.edit', $dt_surat->id) }}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id_surat" value="{{ $dt_surat->id }}">
                                                        <div class="dropdown-divider"></div>
                                                        <button type="submit" class="dropdown-item">
                                                            <i class="link-icon" data-feather="edit" style="width:16px; height:auto"></i>Edit
                                                        </button>

                                                    </form>

                                                    {{-- Delete Button --}}
                                                    <form action="{{ route('surat-tugas-asesor.delete', $dt_surat->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <input type="hidden" name="id_surat" value="{{ $dt_surat->id }}">
                                                        <button type="submit" class="dropdown-item">
                                                            <i class="link-icon" data-feather="trash" style="width:16px; height:auto"></i>Delete Surat
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="badge bg-warning text-dark">{{ $dt_surat->nomor_surat }}</span>
                                        </td>
                                        <td class="text-wrap">{{ $dt_surat->nama_asesor }}</td>
                                        <td class="columnNoReg text-wrap">{{ $dt_surat->no_reg }}</td>
                                        <td class="columnTempatTuk text-wrap">{{ $dt_surat->nama_tuk }}</td>
                                        {{-- <td class="columnAlamatTuk text-wrap">{{ Str::limit($dt_surat->alamat_tuk, 50) }}</td> --}}
                                        <td class="columnAlamatTuk text-wrap">{{ $dt_surat->alamat_tuk }}</td>
                                        <td class="columnSkema text-wrap">{{ $dt_surat->skema }}</td>
                                        <td class="columnTanggalUji">{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $dt_surat->tanggal_uji)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</td>
                                        <td class="columnTanggalSurat">{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $dt_surat->tanggal_surat)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</td>

                                    </tr>
                                @endforeach
                                <!-- Penambahan baris data lainnya -->
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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Surat Tugas {{ $dt_surat->nama_asesor }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
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
<!-- Modal -->

@endsection

@section('js_partials')

    <script src="{{ asset('noble_panel') }}/assets/js/data-table.js"></script>
    <script>

        // Filter Data Skema Table
        document.addEventListener("DOMContentLoaded", function () {
            const toggleButton = document.getElementById("skemaFilter");
            toggleButton.addEventListener("click", function () {
                const columnsSkema = document.querySelectorAll("#dataTableExample th.columnSkema");
                columnsSkema.forEach(column => {
                    column.classList.toggle("hide-column");
                    const index = Array.from(column.parentNode.children).indexOf(column);
                    const rows = document.querySelectorAll("#dataTableExample tbody tr");
                    rows.forEach(row => {
                        const cells = row.querySelectorAll("td");
                        cells[index].classList.toggle("hide-column");
                    });
                });
            });
            toggleButton.addEventListener("click", function () {
                toggleButton.classList.toggle("border-primary");
                toggleButton.classList.toggle("bg-primary");
            });
        });

        // Filter Data Tempat TUK
        document.addEventListener("DOMContentLoaded", function () {
         const toggleButton = document.getElementById("tempatTukFilterButton");
            toggleButton.addEventListener("click", function () {
                const columnTempatTuks = document.querySelectorAll("#dataTableExample th.columnTempatTuk");
                columnTempatTuks.forEach(column => {
                    column.classList.toggle("hide-column");
                    const index = Array.from(column.parentNode.children).indexOf(column);
                    const rows = document.querySelectorAll("#dataTableExample tbody tr");
                    rows.forEach(row => {
                        const cells = row.querySelectorAll("td");
                        cells[index].classList.toggle("hide-column");
                    });
                });
            });
            toggleButton.addEventListener("click", function () {
                toggleButton.classList.toggle("border-primary");
                toggleButton.classList.toggle("bg-primary");
            });
        });

        // Filter Data Alamat TUK
        document.addEventListener("DOMContentLoaded", function () {
         const toggleButton = document.getElementById("alamatTUKFilterButton");
            toggleButton.addEventListener("click", function () {
                const columnAlamatTuks = document.querySelectorAll("#dataTableExample th.columnAlamatTuk");
                columnAlamatTuks.forEach(column => {
                    column.classList.toggle("hide-column");
                    const index = Array.from(column.parentNode.children).indexOf(column);
                    const rows = document.querySelectorAll("#dataTableExample tbody tr");
                    rows.forEach(row => {
                        const cells = row.querySelectorAll("td");
                        cells[index].classList.toggle("hide-column");
                    });
                });
            });
            toggleButton.addEventListener("click", function () {
                toggleButton.classList.toggle("border-primary");
                toggleButton.classList.toggle("bg-primary");
            });
        });
        // Filter Data NO REG Asesor
        document.addEventListener("DOMContentLoaded", function () {
         const toggleButton = document.getElementById("NoRegFilterButton");
            toggleButton.addEventListener("click", function () {
                const columnNoRegs = document.querySelectorAll("#dataTableExample th.columnNoReg");
                columnNoRegs.forEach(column => {
                    column.classList.toggle("hide-column");
                    const index = Array.from(column.parentNode.children).indexOf(column);
                    const rows = document.querySelectorAll("#dataTableExample tbody tr");
                    rows.forEach(row => {
                        const cells = row.querySelectorAll("td");
                        cells[index].classList.toggle("hide-column");
                    });
                });
            });
            toggleButton.addEventListener("click", function () {
                toggleButton.classList.toggle("border-primary");
                toggleButton.classList.toggle("bg-primary");
            });
        });
        // Filter Data Tanggal Surat
        document.addEventListener("DOMContentLoaded", function () {
         const toggleButton = document.getElementById("tanggalSuratFilterButton");
            toggleButton.addEventListener("click", function () {
                const columnTanggalSurats = document.querySelectorAll("#dataTableExample th.columnTanggalSurat");
                columnTanggalSurats.forEach(column => {
                    column.classList.toggle("hide-column");
                    const index = Array.from(column.parentNode.children).indexOf(column);
                    const rows = document.querySelectorAll("#dataTableExample tbody tr");
                    rows.forEach(row => {
                        const cells = row.querySelectorAll("td");
                        cells[index].classList.toggle("hide-column");
                    });
                });
            });
            toggleButton.addEventListener("click", function () {
                toggleButton.classList.toggle("border-primary");
                toggleButton.classList.toggle("bg-primary");
            });
        });
        // Filter Data Tanggal Uji
        document.addEventListener("DOMContentLoaded", function () {
         const toggleButton = document.getElementById("tanggalUjiFilterButton");
            toggleButton.addEventListener("click", function () {
                const columnTanggalUjis = document.querySelectorAll("#dataTableExample th.columnTanggalUji");
                columnTanggalUjis.forEach(column => {
                    column.classList.toggle("hide-column");
                    const index = Array.from(column.parentNode.children).indexOf(column);
                    const rows = document.querySelectorAll("#dataTableExample tbody tr");
                    rows.forEach(row => {
                        const cells = row.querySelectorAll("td");
                        cells[index].classList.toggle("hide-column");
                    });
                });
            });
            toggleButton.addEventListener("click", function () {
                toggleButton.classList.toggle("border-primary");
                toggleButton.classList.toggle("bg-primary");
            });
        });
    </script>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
      // Simulasikan waktu tunggu
      setTimeout(function() {
        // Setelah 2 detik, tampilkan data table dan sembunyikan loading spinner
        document.getElementById('loading').classList.add('hidden');
        document.getElementById('cardTable').classList.remove('hidden');
      }, 2000); // 2 Detik
    });
</script>
@endsection
