<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="index.html" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('img/logo_lsp.png') }}" alt="logo" style="width: 200px; min-height: 40px">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('img/no_title_logo.png') }}" alt="small logo" style="width: 40px; min-height: 40px">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="index.html" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('img/logo_lsp.png') }}" alt="dark logo" style="width: 200px; min-height: 40px">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('img/no_title_logo.png') }}" alt="small logo" style="width: 40px; min-height: 40px">
        </span>
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Main</li>

            <li class="side-nav-item {{ request()->segment(1) === 'dashboard' ? 'menuitem-active' : ''}} ">
                <a href="{{ route('dashboard') }}" class="side-nav-link ">
                    <i class="ri-dashboard-3-line"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-title">Main Menu</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#suratTugasAsesor" aria-expanded="false" aria-controls="suratTugasAsesor" class="side-nav-link">
                    <i class="ri-briefcase-line"></i>
                    <span> Surat Tugas Asesor </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="suratTugasAsesor">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('surat-tugas-asesor.view') }}">
                                <span class="badge bg-success float-end">{{ App\Models\SuratTugasModel::count() }}</span>
                                List Surat
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('surat-tugas-asesor.create') }}">Create Surat</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#qrCode" aria-expanded="false" aria-controls="qrCode" class="side-nav-link">
                    <i class="ri-qr-code-line"></i>
                    <span> QR Code </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="qrCode">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="/qr-code">QR Code List</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title">Data LSP</li>


            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#asesorLSP" aria-expanded="false" aria-controls="asesorLSP" class="side-nav-link">
                    <i class="ri-user-line"></i>
                    <span>Asesor LSP</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="asesorLSP">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="/asesor">List Asesor</a>
                        </li>
                    </ul>
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="/asesor/create">Create Data Asesor</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#tukLSP" aria-expanded="false" aria-controls="tukLSP" class="side-nav-link">
                    <i class="ri-building-line"></i>
                    <span>TUK LSP</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="tukLSP">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('tuk') }}">List TUK</a>
                        </li>
                    </ul>
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('tukAdd') }}">Create Data TUK</a>
                        </li>
                    </ul>
                </div>
            </li>



        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
