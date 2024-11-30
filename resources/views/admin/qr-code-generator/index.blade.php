@extends('admin.layouts.master')
@section('css_page')
    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="{{ asset('velonic_admin') }}/assets/vendor/daterangepicker/daterangepicker.css">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('velonic_admin') }}/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme Config Js -->
    <script src="{{ asset('velonic_admin') }}/assets/js/config.js"></script>
    <!-- App css -->
    <link href="{{ asset('velonic_admin') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Icons css -->
    <link href="{{ asset('velonic_admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">QR Code</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">QR Code</h4>
                </div>
            </div>
        </div>

        <div class="profile-user-box mt-2">
            <div class="row">
                <div class="col-lg-8">
                    {{-- Search Form --}}
                    <div class="input-group">
                        <input type="text" id="ModuleSearch" name="example-input1-group2"
                        class="form-control" placeholder="Search">
                        <span class="input-group-append">
                            <button type="button" class="btn btn-primary rounded-start-0">
                                <i class="ri-search-line fs-16"></i>
                            </button>
                        </span>
                    </div>
                    {{-- Search Form --}}
                </div>
                <div class="col-lg-4">
                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <button type="button" class="btn btn-soft-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="ri-add-box-line align-text-bottom me-1 fs-16 lh-1"></i>
                            Create QR Code
                        </button>

                        {{-- Modal --}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Create QR Code</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                    </div>


                                    <form class="forms-sample" action="/qr-code" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="name_qr" class="col-sm-3 col-form-label">Name QR</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="name_qr" name="name" placeholder="Masukkan Nama QR">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="link" class="col-sm-3 col-form-label">Link</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="link" name="url" placeholder="Masukkan URL/Link">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="Container">
            @foreach ($data_qr as $qr)
                <div class="col-md-4 item">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="d-flex">
                                    <a class="me-3" href="#">
                                        <img class="avatar-md bx-s" src="{{ asset('img/qr_codes/' . $qr->qr_image) }}" data-bs-toggle="modal" data-bs-target="#qrModal{{ $qr->id }}">
                                    </a>

                                    {{-- QR Code Modal --}}
                                    <div class="modal fade" id="qrModal{{ $qr->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">QR Code - {{ $qr->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <div class="col-12 d-flex justify-content-center">
                                                            <img class="avatar-lg" src="{{ asset('img/qr_codes/' . $qr->qr_image) }}" style="height: 15rem; width: 15rem">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-12 d-flex justify-content-center">
                                                            <p>{{ Str::limit($qr->url) }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="downloadButton-{{ $qr->id }}" class="btn btn-primary">Download QR</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- /* QR Code Modal --}}

                                    <div class="info">
                                        <h5 class="fs-16 my-1 title">{{ $qr->name }}</h5>
                                        <p class="text-muted fs-12">{{ Str::limit($qr->url, 20) }}</p>
                                    </div>
                                </div>
                                <div class="" style="min-width: 100px;">
                                    <button type="button" id="downloadButton-{{ $qr->id }}" class="btn btn-success btn-sm me-1 tooltips" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download QR"><i class="ri-download-fill"></i></button>
                                    <button type="button" id="deleteButton-{{ $qr->id }}" class="btn btn-danger btn-sm me-1 tooltips" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete QR"><i class="ri-close-fill"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script> // Script Download QR
                    document.getElementById("downloadButton-{{ $qr->id }}").addEventListener("click", function() {
                    var imageUrl = this.closest('.card-body').querySelector('img').getAttribute('src');
                    var a = document.createElement('a');
                    a.href = imageUrl;
                    a.download = 'QR {{ $qr->name }}.png';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                    });
                </script>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('js_page')

    {{-- Sweet Alert --}}
    <script>
        @foreach ($data_qr as $qr)
            document.getElementById("deleteButton-{{ $qr->id }}").addEventListener("click", function() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this QR code!",
                    icon: "warning",
                    showCancelButton: true,
                }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        fetch("{{ route('qr-code.destroy', $qr->id) }}", {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            }
                        }).then(response => {
                            if (response.ok) {
                                Swal.fire(
                                'Terhapus',
                                'QR Code Telah Berhasil Dihapus',
                                'success'
                                ).then((result) =>{
                                if (result.isConfirmed){
                                    window.location.href = '/qr-code';
                                }
                                })
                            }
                        })
                    } else {
                        Swal.fire("Hapus QR Dibatalkan");
                    }
                });
            });
        @endforeach
    </script>
{{-- /* End Sweet Alert --}}

     <!-- Vendor js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/vendor.min.js"></script>
     <!-- Daterangepicker js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/daterangepicker/moment.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/daterangepicker/daterangepicker.js"></script>

     <!-- Apex Charts js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>

     <!-- Vector Map js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

     <!-- Dashboard App js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/pages/dashboard.js"></script>
     <!-- App js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/app.min.js"></script>

@endsection
