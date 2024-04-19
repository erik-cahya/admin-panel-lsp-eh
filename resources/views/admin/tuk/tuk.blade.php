@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                        <li class="breadcrumb-item">TUK</li>
                        <li class="breadcrumb-item active" aria-current="page">List TUK</li>
                    </ol>
                </nav>
                <h1 class="m-0">Daftar TUK</h1>


            </div>
            <a href="{{ route('tukAdd') }}" class="btn btn-success ml-3">Tambah TUK<i class="material-icons">add</i></a>
        </div>
    </div>


    <div class="container-fluid page__container">



        <div class="card p-4" style="">

            <table id="example" class="display"class="table mb-0 thead-border-top-0 table-striped">
                <thead>
                    <tr>
                        <th width="10" class="text-center">NO</th>
                        <th width="150"> Nama TUK</th>
                        <th width="250">Alamat TUK</th>
                        <th width="100">Kontak Person</th>
                        <th width="100">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="list" id="companies">
                    <?php $i = 1; ?>
                    @foreach ($data as $d)
                        <tr>
                            <td class="text-center">
                                <?php echo $i++; ?>
                            </td>
                            <td class="text-left">

                                {{ $d->tuk_nama }}
                            </td>
                            <td class="text-left">

                                {{ $d->tuk_alamat }}
                            </td>
                            <td class="text-left">

                                {{ $d->tuk_namaCP }} <br> {{ $d->tuk_kontakCP }}
                            </td>
                            <td>

                                <div class="dropdown pull-right">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#modal-standard-">See Details</button>

                                    <button type="button" data-toggle="dropdown" class="btn btn-sm btn-danger">
                                        More
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-right">

                                        <div class="dropdown-divider"></div>

                                        <form action="{{ route('tukEdit', $d->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id_tuk" value="{{ $d->id }}">
                                            <button type="submit" class="dropdown-item d-flex align-items-center">
                                                <i class="material-icons mr-1">edit</i> Edit
                                            </button>
                                        </form>

                                        <form action="{{ route('tukDeleted', $d->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="id_tuk" value="{{ $d->id }}">
                                            <button type="submit" onclick="return confirm('Yakin Ingin Menghapus TUK ?')"
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script>
        new DataTable('#example');
    </script>
@endsection
