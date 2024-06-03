@extends('admin.layouts.master')
@section('css_page')
    <!--! BEGIN: Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/css/bootstrap.min.css" />
    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/vendors.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/daterangepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/dataTables.bs5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/css/theme.min.css" />
@endsection


@section('content')
<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Surat Tugas Asesor</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Surat Tugas Asesor</li>
            </ul>
        </div>


        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Back</span>
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                        <i class="feather-bar-chart"></i>
                    </a>
                    <div class="dropdown">
                        <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                            <i class="feather-filter"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-eye me-3"></i>
                                <span>All</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-send me-3"></i>
                                <span>Sent</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-book-open me-3"></i>
                                <span>Open</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-archive me-3"></i>
                                <span>Draft</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-bell me-3"></i>
                                <span>Revised</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-shield-off me-3"></i>
                                <span>Declined</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-check me-3"></i>
                                <span>Accepted</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-briefcase me-3"></i>
                                <span>Leads</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-wifi-off me-3"></i>
                                <span>Expired</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-users me-3"></i>
                                <span>Customers</span>
                            </a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                            <i class="feather-paperclip"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="bi bi-filetype-pdf me-3"></i>
                                <span>PDF</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="bi bi-filetype-csv me-3"></i>
                                <span>CSV</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="bi bi-filetype-xml me-3"></i>
                                <span>XML</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="bi bi-filetype-txt me-3"></i>
                                <span>Text</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="bi bi-filetype-exe me-3"></i>
                                <span>Excel</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="bi bi-printer me-3"></i>
                                <span>Print</span>
                            </a>
                        </div>
                    </div>
                    <a href="invoice-create.html" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>Create Invoice</span>
                    </a>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>

    <div id="collapseOne" class="accordion-collapse collapse page-header-collapse">
        <div class="accordion-body pb-2">
            <div class="row">
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0);" class="fw-bold d-block">
                                    <span class="d-block">Nomor Surat Terakhir</span>

                                    <div class="badge bg-soft-success text-success mt-2" style="font-size: 14px">
                                        <span>{{ $nomor_surat_terakhir['nomor_surat'] }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0);" class="fw-bold d-block">
                                    <span class="d-block">Jumlah Surat</span>
                                    <span class="fs-20 fw-bold d-block">38/50</span>
                                </a>
                                <div class="badge bg-soft-danger text-danger">
                                    <i class="feather-arrow-down fs-10 me-1"></i>
                                    <span>23.45%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0);" class="fw-bold d-block">
                                    <span class="d-block">Jumlah TUK</span>
                                    <span class="fs-20 fw-bold d-block">15/30</span>
                                </a>
                                <div class="badge bg-soft-success text-success">
                                    <i class="feather-arrow-up fs-10 me-1"></i>
                                    <span>25.44%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0);" class="fw-bold d-block">
                                    <span class="d-block">Jumlah Asesor</span>
                                    <span class="fs-20 fw-bold d-block">3/10</span>
                                </a>
                                <div class="badge bg-soft-danger text-danger">
                                    <i class="feather-arrow-down fs-10 me-1"></i>
                                    <span>12.68%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ page-header ] end -->
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover" id="paymentList">
                                <thead>
                                    <tr>
                                        <th class="wd-30">
                                            <div class="btn-group mb-1">
                                                <div class="custom-control custom-checkbox ms-1">
                                                    <input type="checkbox" class="custom-control-input" id="checkAllPayment">
                                                    <label class="custom-control-label" for="checkAllPayment"></label>
                                                </div>
                                            </div>
                                        </th>
                                        <th>Nomor Surat</th>
                                        <th>Nama Asesor</th>
                                        <th>Skema</th>
                                        <th>Tempat TUK</th>
                                        <th>Tanggal Ujian</th>
                                        <th>Tanggal Surat</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_surat as $dt_surat)
                                        <tr class="single-item">
                                            <td>
                                                <div class="item-checkbox ms-1">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input checkbox" id="checkBox_1">
                                                        <label class="custom-control-label" for="checkBox_1"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="badge bg-soft-success text-success">{{ $dt_surat->nomor_surat }}</div>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" class="hstack gap-3">
                                                    <div class="avatar-image avatar-md">
                                                        <div class="avatar-image avatar-md bg-warning text-white">
                                                            <span class="nxl-micon"><i class="feather-user"></i></span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <span class="text-truncate-1-line">{{ $dt_surat->nama_asesor }}</span>
                                                        <small class="fs-12 fw-normal text-muted">{{ $dt_surat->no_reg }}</small>
                                                    </div>
                                                </a>
                                            </td>
                                            <td><a href="javascript:void(0);">{{ $dt_surat->skema }}</a></td>

                                            <td>
                                                <a href="javascript:void(0)" class="hstack gap-3">
                                                    <div class="avatar-image avatar-md">
                                                        <div class="avatar-image avatar-md bg-warning text-white">
                                                            <span class="nxl-micon"><i class="feather-home"></i></span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <span class="text-truncate-1-line">{{ $dt_surat->nama_tuk }}</span>
                                                        <small class="fs-12 fw-normal text-muted">{{ $dt_surat->alamat_tuk }}</small>
                                                    </div>
                                                </a>
                                            </td>

                                            <td>
                                                <div class="badge bg-soft-success text-warning">{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $dt_surat->tanggal_uji)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</div>
                                            </td>
                                            <td>
                                                <div class="badge bg-soft-success text-info">{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $dt_surat->tanggal_surat)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</div>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 justify-content-end">
                                                    <a href="invoice-view.html" class="avatar-text avatar-md">
                                                        <i class="feather feather-eye"></i>
                                                    </a>
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                            <i class="feather feather-more-horizontal"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                    <i class="feather feather-edit-3 me-3"></i>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item printBTN" href="javascript:void(0)">
                                                                    <i class="feather feather-printer me-3"></i>
                                                                    <span>Print</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                    <i class="feather feather-clock me-3"></i>
                                                                    <span>Remind</span>
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-divider"></li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                    <i class="feather feather-archive me-3"></i>
                                                                    <span>Archive</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                    <i class="feather feather-alert-octagon me-3"></i>
                                                                    <span>Report Spam</span>
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-divider"></li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                    <i class="feather feather-trash-2 me-3"></i>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </li>
                                                        </ul>
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
    <!-- [ Main Content ] end -->
</div>
@endsection
@section('js_page')
    <script src="{{ asset('admin_template') }}/assets/vendors/js/vendors.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/vendors/js/dataTables.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/vendors/js/dataTables.bs5.min.js"></script>

    <script src="{{ asset('admin_template') }}/assets/vendors/js/daterangepicker.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/vendors/js/apexcharts.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/vendors/js/circle-progress.min.js"></script>

    <script src="{{ asset('admin_template') }}/assets/js/common-init.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/js/dashboard-init.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/js/payment-init.min.js"></script>

    <script src="{{ asset('admin_template') }}/assets/js/theme-customizer-init.min.js"></script>
@endsection
