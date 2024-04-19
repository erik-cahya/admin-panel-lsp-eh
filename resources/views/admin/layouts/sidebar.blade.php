<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-dark bg-dark sidebar-left sidebar-p-t" data-perfect-scrollbar>



            <div class="d-flex align-items-center sidebar-p-a sidebar-account">
                <a href="profile.html" class="flex d-flex align-items-center text-underline-0 text-body">
                    <span class="avatar avatar-sm mr-2">
                        <img src="{{ asset('admin_panel') }}/assets/images/avatar/demi.png" alt="avatar"
                            class="avatar-img rounded-circle">
                    </span>
                    <span class="flex d-flex flex-column">
                        <strong>Admin</strong>
                        <small class="text-muted text-uppercase">Admin</small>
                    </span>
                </a>
                <div class="dropdown ml-auto">
                    <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i
                            class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-item-text dropdown-item-text--lh">
                            <div><strong>Adrian Demian</strong></div>
                            <div>@adriandemian</div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.html">Dashboard</a>
                        <a class="dropdown-item" href="profile.html">My profile</a>
                        <a class="dropdown-item" href="edit-account.html">Edit account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </div>
            </div>



            <div class="sidebar-heading">Menu</div>
            <ul class="sidebar-menu">

                <li class="sidebar-menu-item {{ request()->segment(1) == '' ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="/">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                        <span class="sidebar-menu-text">Dashboard</span>
                    </a>
                </li>

            </ul>
            <div class="sidebar-heading">Data</div>

            {{-- TUK --}}
            <div class="sidebar-block p-0 mb-0">
                <ul class="sidebar-menu" id="">
                    <li class="sidebar-menu-item open {{ request()->segment(1) == 'tuk' ? 'active open' : '' }}">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#tuk_menu">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                            <span class="sidebar-menu-text">TUK</span>
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>

                        <ul class="sidebar-submenu collapse show" id="tuk_menu">
                            <li class="sidebar-menu-item {{ request()->segment(2) == '' ? 'active' : '' }}">
                                <a class="sidebar-menu-button" href="{{ route('tuk') }}">
                                    <span class="sidebar-menu-text">List TUK</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ request()->segment(2) == 'tukAdd' ? 'active' : '' }}">
                                <a class="sidebar-menu-button" href="{{ route('tukAdd') }}">
                                    <span class="sidebar-menu-text">Tambah TUK</span>
                                </a>
                            </li>
                        </ul>
                </ul>

                </li>
            </div>

            {{-- SURAT TUGAS --}}
            <div class="sidebar-block p-0 mb-0">
                <ul class="sidebar-menu" id="components_menu">
                    <li
                        class="sidebar-menu-item open {{ request()->segment(1) == 'surat-tugas-asesor' ? 'active open' : '' }}">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#surat_tugas_menu">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                            <span class="sidebar-menu-text">Surat Tugas Asesor</span>
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>

                        <ul class="sidebar-submenu collapse show" id="surat_tugas_menu">
                            <li class="sidebar-menu-item {{ request()->segment(2) == '' ? 'active' : '' }}">
                                <a class="sidebar-menu-button" href="{{ route('surat-tugas-asesor.view') }}">
                                    <span class="sidebar-menu-text">List Surat</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ request()->segment(2) == 'create' ? 'active' : '' }}">
                                <a class="sidebar-menu-button" href="{{ route('surat-tugas-asesor.create') }}">
                                    <span class="sidebar-menu-text">Create Surat</span>
                                </a>
                            </li>
                        </ul>
                </ul>

                </li>
            </div>

            <div class="sidebar-heading">Features</div>
            <div class="sidebar-block p-0 mb-0">
                <ul class="sidebar-menu" id="components_menu">
                    <li class="sidebar-menu-item {{ request()->segment(1) == 'qr-code' ? 'active' : '' }}">
                        <a class="sidebar-menu-button" href="/qr-code">
                            <i
                                class="sidebar-menu-icon sidebar-menu-icon--left material-symbols-outlined">qr_code_scanner</i>

                            <span class="sidebar-menu-text">QR Code Generator</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
