  <!-- partial:../../partials/_sidebar.html -->
  <nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <img src="{{ asset('img/logo_lsp.png') }}" alt="" width="150px">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>

            <li class="nav-item {{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            {{-- Web Apps --}}
            <li class="nav-item nav-category">Main menu</li>

            {{-- Surat Tugas Asesor --}}
            <li class="nav-item {{ request()->segment(1) == 'surat-tugas-asesor' ? 'active' : '' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#surat-tugas" role="button" aria-expanded="false" aria-controls="surat-tugas">

                    <i class="fas fa-print"></i>
                    <span class="link-title" style="margin-left: 18px">Surat Tugas Asesor</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>

                </a>

                <div class="collapse {{ request()->segment(1) == 'surat-tugas-asesor' ? 'show' : '' }}" id="surat-tugas">
                    <ul class="nav sub-menu">
                        <li class="nav-item list-group-item d-flex justify-content-between align-items-center" >
                            <a href="{{ route('surat-tugas-asesor.view') }}" class="nav-link {{ request()->segment(1)  == 'surat-tugas-asesor' && request()->segment(2) == null ? 'active' : '' }}">List Surat</a>
                            <span class="badge bg-primary rounded-pill" style="font-size: 10px">{{ App\Models\SuratTugasModel::count() }}</span>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('surat-tugas-asesor.create') }}" class="nav-link {{ request()->segment(1) == 'surat-tugas-asesor' && request()->segment(2) == 'create' ? 'active' : '' }}">Create Surat</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- /* End Surat Tugas Asesor --}}

            {{-- QR Code --}}
            <li class="nav-item {{ request()->segment(1) == 'qr-code' ? 'active' : '' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#qr-code" role="button" aria-expanded="false" aria-controls="qr-code">

                    <i class="mdi mdi-qrcode-scan"></i>
                    <span class="link-title" style="margin-left: 18px">QR Code</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>

                </a>

                <div class="collapse {{ request()->segment(1) == 'qr-code' ? 'show' : '' }}" id="qr-code">
                    <ul class="nav sub-menu">
                        <li class="nav-item list-group-item d-flex justify-content-between align-items-center" >
                            <a href="{{ route('surat-tugas-asesor.view') }}" class="nav-link {{ request()->segment(1)  == 'surat-tugas-asesor' && request()->segment(2) == null ? 'active' : '' }}">List QR Code</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('surat-tugas-asesor.create') }}" class="nav-link {{ request()->segment(1) == 'surat-tugas-asesor' && request()->segment(2) == 'create' ? 'active' : '' }}">Create QR</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- /* End QR Code --}}


            {{-- /* End Web Apps --}}
            <li class="nav-item nav-category">Data Internal LSP</li>

            {{-- TUK --}}
            <li class="nav-item {{ request()->segment(1) == 'tuk' || request()->segment(1) == 'tukAdd' ? 'active' : '' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#tuk" role="button" aria-expanded="false" aria-controls="tuk">

                    <i class="fas fa-hotel"></i>
                    <span class="link-title" style="margin-left: 18px">TUK</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>

                </a>

                <div class="collapse {{ request()->segment(1) == 'tuk' || request()->segment(1) == 'tukAdd' ? 'show' : '' }}" id="tuk">
                    <ul class="nav sub-menu">
                        <li class="nav-item list-group-item d-flex justify-content-between align-items-center" >
                            <a href="{{ route('tuk') }}" class="nav-link {{ request()->segment(1)  == 'tuk' && request()->segment(2) == null ? 'active' : '' }}">List TUK</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('tukAdd') }}" class="nav-link {{ request()->segment(1) == 'tukAdd' ? 'active' : '' }}">Tambah TUK</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- /* End TUK--}}

            {{-- Asesor --}}
            <li class="nav-item {{ request()->segment(1) == 'asesor' || request()->segment(1) == 'asesorAdd' ? 'active' : '' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#data-asesor" role="button" aria-expanded="false" aria-controls="data-asesor">

                    <i class="fas fa-user-tie"></i>
                    <span class="link-title" style="margin-left: 18px">Asesor LSP</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>

                </a>

                <div class="collapse {{ request()->segment(1) == 'asesor' || request()->segment(1) == 'asesorAdd' ? 'show' : '' }}" id="data-asesor">
                    <ul class="nav sub-menu">
                        <li class="nav-item list-group-item d-flex justify-content-between align-items-center" >
                            <a href="{{ route('asesor') }}" class="nav-link {{ request()->segment(1)  == 'asesor' && request()->segment(2) == null ? 'active' : '' }}">List Asesor</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('asesorAdd') }}" class="nav-link {{ request()->segment(1) == 'asesorAdd' ? 'active' : '' }}">Tambah Asesor</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- /* End Asesor --}}
        </ul>
    </div>
</nav>
