@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                        <li class="breadcrumb-item">SURAT</li>
                        <li class="breadcrumb-item active" aria-current="page">SURAT TUGAS ASESOR</li>
                    </ol>
                </nav>
                <h1 class="m-0">Surat Tugas Asesor</h1>

                <div class="badge badge-warning mt-3">Nomor Surat Terakhir : {{ $nomor_surat_terakhir->nomor_surat }}</div>


            </div>
            <a href="{{ route('surat-tugas-asesor.create') }}" class="btn btn-success ml-3">Buat Surat<i
                    class="material-icons">add</i></a>
        </div>
    </div>


    <div class="container-fluid page__container">



        <div class="card p-4" style="">

            <table id="example" class="display"class="table mb-0 thead-border-top-0 table-striped">
                <thead>
                    <tr>
                        <th width="10" class="text-center">NO SURAT</th>
                        <th width="150"> Nama TUK</th>
                        <th width="150" class="text-center">Nama Asesor</th>
                        <th width="130" class="text-center">Tanggal Uji</th>
                        <th width="150" class="text-right">Skema</th>
                        <th width="100">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="list" id="companies">
                    @foreach ($data_surat as $dt_surat)
                        <tr>
                            <td class="text-center">
                                <div class="badge badge-soft-dark">{{ $dt_surat->nomor_surat }}</div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="d-flex align-items-center">
                                        <i class="material-icons icon-16pt mr-1 text-blue">business</i>
                                        <a href="#">{{ $dt_surat->nama_tuk }}</a>
                                    </div>

                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="text-muted"><i
                                            class="material-icons icon-16pt mr-1">pin_drop</i>{{ $dt_surat->alamat_tuk }}</small>
                                </div>
                            </td>
                            <td class="text-center">
                                <i class="material-icons icon-16pt text-muted mr-1">account_circle</i>
                                {{ $dt_surat->nama_asesor }}
                            </td>

                            <td class="text-center">
                                {{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $dt_surat->tanggal_uji)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
                            </td>
                            <td class="text-right"><strong>{{ $dt_surat->skema }}</strong></td>
                            <td>

                                <div class="dropdown pull-right">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#modal-signup-{{ $dt_surat->id }}">See Details</button>



                                    <button type="button" data-toggle="dropdown" class="btn btn-sm btn-danger">
                                        More
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-divider"></div>

                                        <a href="{{ route('surat-tugas-asesor.download', $dt_surat->id) }}"
                                            class="dropdown-item"><i class="material-icons  mr-1">work</i> Download Word
                                            (.doc)
                                        </a>

                                        <a href="{{ route('surat-tugas-asesor.generatePdf', $dt_surat->id) }}"
                                            target="_blank" class="dropdown-item"><i
                                                class="material-icons  mr-1">pin_drop</i>
                                            Download PDF
                                            (.pdf)
                                        </a>

                                        <div class="dropdown-divider"></div>

                                        <form action="{{ route('surat-tugas-asesor.edit', $dt_surat->id) }}"
                                            method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id_surat" value="{{ $dt_surat->id }}">
                                            <button type="submit" class="dropdown-item d-flex align-items-center">
                                                <i class="material-icons mr-1">edit</i> Edit
                                            </button>
                                        </form>

                                        <form action="{{ route('surat-tugas-asesor.delete', $dt_surat->id) }}"
                                            method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="id_surat" value="{{ $dt_surat->id }}">
                                            <button type="submit" onclick="return confirm('Yakin Ingin Menghapus Surat ?')"
                                                class="dropdown-item d-flex align-items-center">
                                                <i class="material-icons mr-1">delete</i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach






                </tbody>
            </table>

        </div>
    </div>
@endsection


@section('js_partials')
    {{-- Modals --}}
    @foreach ($data_surat as $dt_surat)
        <div id="modal-signup-{{ $dt_surat->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="px-3">
                            <div class="d-flex justify-content-center mt-2 mb-4 navbar-light">
                                <a href="javascript:void(0)" class="navbar-brand" style="min-width: 0">
                                    <img class="navbar-brand-icon"
                                        src="{{ asset('admin_panel') }}/assets/images/stack-logo-blue.svg" width="25"
                                        alt="FlowDash">
                                    <span>Detail Surat</span>
                                </a>
                            </div>

                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Nomor Surat</label>
                                        <input type="text" class="form-control" value="{{ $dt_surat->nomor_surat }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="tanggal_surat">Skema</label>
                                        <input type="text" class="form-control" value="{{ $dt_surat->nomor_surat }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Asesor</label>
                                        <input type="text" class="form-control" value="{{ $dt_surat->nama_asesor }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="tanggal_surat">No Reg</label>
                                        <input type="text" class="form-control" value="{{ $dt_surat->no_reg }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Nama TUK</label>
                                        <input type="text" class="form-control" value="{{ $dt_surat->nama_tuk }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="tanggal_surat">Alamat TUK</label>
                                        <input type="text" class="form-control" value="{{ $dt_surat->alamat_tuk }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Tanggal Uji</label>
                                        <input type="text" class="form-control"
                                            value="{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $dt_surat->tanggal_uji)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="tanggal_surat">Tanggal Surat</label>
                                        <input type="text" class="form-control"
                                            value="{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $dt_surat->tanggal_surat)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
                                            "
                                            readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="tanggal_surat">Surat Dibuat Tanggal</label>
                                        <input type="text" class="form-control"
                                            value="{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $dt_surat->created_at)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
                                            "
                                            readonly>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div> <!-- // END .modal-body -->
                </div> <!-- // END .modal-content -->
            </div> <!-- // END .modal-dialog -->
        </div> <!-- // END .modal -->
    @endforeach



    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script>
        new DataTable('#example');
    </script>
@endsection
