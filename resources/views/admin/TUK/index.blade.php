@extends('admin.layouts.master')
@section('css_page')
    <link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">



@endsection

{{-- Content Web --}}
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
          <h4 class="mb-3 mb-md-0">Tempat Uji Kompetensi ( TUK )</h4>
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
                    <h6 class="card-title">Data TUK</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-bordered" style="min-height: 50vh">
                            <thead>
                                <tr>
                                    <th width="10px" class="">No</th>
                                    <th>Nama TUK</th>
                                    <th>Alamat</th>
                                    <th width="160px">Contact Person</th>
                                    <th width="10px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataTuk as $tuk)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="text-left">

                                            {{ $tuk->tuk_nama }}
                                        </td>
                                        <td class="text-left text-wrap">
                                            {{ $tuk->tuk_alamat }}
                                        </td>
                                        <td class="text-left text-wrap">
                                            {{ $tuk->tuk_namaCP }}
                                            <br>
                                            {{ $tuk->tuk_kontakCP }}
                                        </td>

                                        <td>
                                                <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">

                                                    {{-- Edit Button --}}
                                                    <form action="{{ route('tukEdit', $tuk->id) }}"method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id_surat" value="{{ $tuk->id }}">
                                                        <button type="submit" class="dropdown-item">
                                                            <i class="link-icon" data-feather="edit" style="width:16px; height:auto;"></i><span style="margin-left:10px">Edit TUK</span>
                                                        </button>
                                                    </form>
                                                    <div class="dropdown-divider"></div>

                                                    {{-- Delete Button --}}
                                                    <form action="{{ route('tukDeleted', $tuk->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <input type="hidden" name="id_surat" value="{{ $tuk->id }}">
                                                        <button type="submit" class="dropdown-item">
                                                            <i class="link-icon" data-feather="trash" style="width:16px; height:auto"></i><span style="margin-left:10px">Delete TUK</span>
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
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

@section('js_partials')
    <script src="{{ asset('noble_panel') }}/assets/js/data-table.js"></script>




@endsection
