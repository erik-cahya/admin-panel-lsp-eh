@extends('admin.layouts.master')
@section('css_page')
    <link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
    <style>
        .hide-column {
            display: none;
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
            <span class="badge rounded-pill bg-info text-dark">Nomor Surat Terakhir : 017/ST-LSP-EHI/2024</span>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <span>Filter Table</span>

            <button id="NoRegFilterButton" class="btn btn-primary btn-xs">No REG</button>
            <button id="tempatTukFilterButton" class="btn btn-primary btn-xs">Tempat TUK</button>
            <button id="alamatTUKFilterButton" class="btn btn btn-primary btn-xs">Alamat TUK</button>
            <button id="skemaFilter" class="btn btn-primary btn-xs">Skema</button>
            <button id="tanggalUjiFilterButton" class="btn btn-primary btn-xs">Tanggal Uji</button>
            <button id="tanggalSuratFilterButton" class="btn btn-primary btn-xs">Tanggal Surat</button>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Table</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-bordered" style="min-height: 50vh">
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
                                            <button type="button" class="btn btn-xs btn-danger btn-icon">
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
                                        <td class="">{{ $dt_surat->nama_asesor }}</td>
                                        <td class="columnNoReg">{{ $dt_surat->no_reg }}</td>
                                        <td class="columnTempatTuk">{{ $dt_surat->nama_tuk }}</td>
                                        <td class="columnAlamatTuk">{{ Str::limit($dt_surat->alamat_tuk, 50) }}</td>
                                        <td class="columnSkema">{{ $dt_surat->skema }}</td>
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
@endsection

@section('js_page')
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
                toggleButton.classList.toggle("btn-outline-primary");
                toggleButton.classList.toggle("btn-primary");
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
                toggleButton.classList.toggle("btn-outline-primary");
                toggleButton.classList.toggle("btn-primary");
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
                toggleButton.classList.toggle("btn-outline-primary");
                toggleButton.classList.toggle("btn-primary");
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
                toggleButton.classList.toggle("btn-outline-primary");
                toggleButton.classList.toggle("btn-primary");
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
                toggleButton.classList.toggle("btn-outline-primary");
                toggleButton.classList.toggle("btn-primary");
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
                toggleButton.classList.toggle("btn-outline-primary");
                toggleButton.classList.toggle("btn-primary");
            });
        });
    </script>
@endsection
