@extends('admin.layouts.master')
@section('css_page')
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/vendors.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/tagify.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/tagify-data.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/quill.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/select2.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/select2-theme.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/datepicker.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/css/theme.min.css">
@endsection


@section('content')
<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Create Surat Tugas Asesor</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Surat Tugas Asesor</li>
                <li class="breadcrumb-item">Create</li>
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
                    <a href="javascript:void(0);" class="btn btn-light-brand" data-bs-toggle="offcanvas" data-bs-target="#proposalSent">
                        <i class="feather-layers me-2"></i>
                        <span>Save & Send</span>
                    </a>
                    <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                        <i class="feather-save me-2"></i>
                        <span>Save</span>
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
    <!-- [ page-header ] end -->
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">

            <div class="col-xl-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">Nomor Surat<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                    <input type="text" class="form-control" id="fullnameInput" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">Skema</label>
                                <select class="form-control" data-select2-selector="city">
                                    <option data-city="bg-primary">Akutan</option>
                                    <option data-city="bg-secondary">Aleutians East Borough</option>
                                    <option data-city="bg-success">Aleutians West Census Area</option>
                                    <option data-city="bg-warning">Anchor Point</option>
                                    <option data-city="bg-info">Anchorage</option>
                                    <option data-city="bg-danger">Anchorage Municipality</option>
                                    <option data-city="bg-dark">Badger</option>
                                    <option data-city="bg-black">Barrow</option>
                                    <option data-city="bg-muted">Bear Creek</option>
                                    <option data-city="bg-blue">Bethel</option>
                                    <option data-city="bg-teal">Bethel Census Area</option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">Nama Asesor:</label>
                                <select class="form-select form-control" data-select2-selector="visibility">
                                    <option value="private" data-icon="feather-user">Personal</option>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">NO REG<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">Nama TUK:</label>
                                <select class="form-select form-control" data-select2-selector="visibility">
                                    <option value="private" data-icon="feather-user">Personal</option>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">Alamat TUK<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">Start <span class="text-danger">*</span></label>
                                <input class="form-control" id="startDate" placeholder="Pick start date ">
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label class="form-label">Due <span class="text-danger">*</span></label>
                                <input class="form-control" id="dueDate" placeholder="Pick due date">
                            </div>
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
    <script src="{{ asset('admin_template') }}/assets/vendors/js/tagify.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/vendors/js/tagify-data.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/vendors/js/quill.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/vendors/js/select2.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/vendors/js/select2-active.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/vendors/js/datepicker.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/js/common-init.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/js/proposal-create-init.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/js/theme-customizer-init.min.js"></script>
@endsection
