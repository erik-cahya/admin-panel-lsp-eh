<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="theme_ocean">
    <title>Admin System Login || LSP Engineering Hospitality Indonesia</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin_template') }}/assets/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template') }}/assets/css/theme.min.css">
</head>

<body>

    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div class="wd-80 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="{{ asset('img/no_title_logo.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="card-body p-sm-5 mt-4">
                        <h2 class="fs-20 fw-bolder mb-4 text-center">LSP Engineering Hospitality Indonesia</h2>
                        <h4 class="fs-13 fw-bold mb-2">Login to System Admin</h4>
                        <p class="fs-12 fw-medium text-muted">Silahkan masukkan email dan password yang sudah terdaftar</p>


                        @error ('email')
                            <div class="alert alert-danger mt-4" role="alert">
                                <i data-feather="alert-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror

                        <form method="POST" action="{{ route('login') }}" class="w-100 mt-4 pt-2">
                            @csrf
                            <div class="mb-4">
                                <input type="email" class="form-control" name="email" placeholder="Email or Username" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="rememberMe">
                                        <label class="custom-control-label c-pointer" for="rememberMe">Remember Me</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-lg btn-primary w-100">Login</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="theme-customizer">
        <div class="customizer-handle">
            <a href="javascript:void(0);" class="cutomizer-open-trigger bg-primary">
                <i class="feather-settings"></i>
            </a>
        </div>
        <div class="customizer-sidebar-wrapper">
            <div class="customizer-sidebar-header px-4 ht-80 border-bottom d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Theme Settings</h5>
                <a href="javascript:void(0);" class="cutomizer-close-trigger d-flex">
                    <i class="feather-x"></i>
                </a>
            </div>
            <div class="customizer-sidebar-body position-relative p-4" data-scrollbar-target="#psScrollbarInit">
                <div class="position-relative px-3 pb-3 pt-4 mt-3 mb-5 border border-gray-2 theme-options-set">
                    <label class="py-1 px-2 fs-8 fw-bold text-uppercase text-muted text-spacing-2 bg-white border border-gray-2 position-absolute rounded-2 options-label" style="top: -12px">Skins</label>
                    <div class="row g-2 theme-options-items app-skin" id="appSkinList">
                        <div class="col-6 text-center position-relative single-option light-button active">
                            <input type="radio" class="btn-check" id="app-skin-light" name="app-skin" value="1" data-app-skin="app-skin-light">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-skin-light">Light</label>
                        </div>
                        <div class="col-6 text-center position-relative single-option dark-button">
                            <input type="radio" class="btn-check" id="app-skin-dark" name="app-skin" value="2" data-app-skin="app-skin-dark">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-skin-dark">Dark</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin_template') }}/assets/vendors/js/vendors.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/js/common-init.min.js"></script>
    <script src="{{ asset('admin_template') }}/assets/js/theme-customizer-init.min.js"></script>
</body>

</html>
