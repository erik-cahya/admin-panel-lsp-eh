@extends('admin.layouts.master')
@section('css_page')
    <link rel="stylesheet" href="{{ asset('noble_panel') }}/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">



    <style>
        /* Mengaktifkan word-wrap pada kolom Alamat dan Contact Person */
        #dataTableExample td.text-wrap {
            word-wrap: break-word;
        }
    </style>
@endsection

{{-- Content Web --}}
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
          <h4 class="mb-3 mb-md-0">Skema Ujian LSP Engineering</h4>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Skema</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-bordered" style="min-height: 50vh">
                            <thead>
                                <tr>
                                    <th width="10px" class="">No</th>
                                    <th>Nama Skema</th>
                                    <th width="50px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataSkema as $skema)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="text-left">

                                            {{ $skema->nama_skema }}
                                        </td>
                                        <td>
                                                <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">

                                                     {{-- Edit Button --}}
                                                     <a href="/skema/{{ $skema->id }}/edit" class="dropdown-item">
                                                        <i class="link-icon" data-feather="edit" style="width:16px; height:auto;"></i><span style="margin-left:10px">Edit Skema</span>
                                                    </a>
                                                    <div class="dropdown-divider"></div>

                                                    {{-- Delete Button --}}
                                                    <form action="/skema/{{ $skema->id }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="dropdown-item">
                                                            <i class="link-icon" data-feather="trash" style="width:16px; height:auto"></i><span style="margin-left:10px">Delete Skema</span>
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
