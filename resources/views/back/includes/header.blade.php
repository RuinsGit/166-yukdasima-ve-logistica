<header id="page-topbar" style="background-color: {{ $themeSettings->header_color }};">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box" style="padding: 0 1.5rem; text-align: center; width: 240px; display: flex; align-items: center; justify-content: center;">
                <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm"  >
                        <img src="{{ asset('back/assets/images/logo.svg') }}" alt="logo-sm" height="25" >
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('back/assets/images/logo.svg') }}" alt="logo-dark" height="50">
                    </span>
                </a>

                <a href="{{ route('admin.dashboard') }}" class="logo logo-light"
                style="padding: 0 1.5rem; text-align:
                 center; width: 240px; display: flex; 
                 align-items: center; 
                  justify-content: center;  
                 background: #f3f3f3; 
                  max-width: 100px;
                  height: 60px;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  overflow: hidden;
                  border-radius: 50px;" >


                    <span class="logo-sm">
                        <img src="{{ asset('back/assets/images/logo.svg') }}" alt="logo-sm-light"
                            height="25">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('back/assets/images/logo.svg') }}" alt="logo-light" height="50">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn" style="color: #000;">
                <i class="ri-menu-2-line align-middle"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- <img width="80" src="{{ asset('back/assets/images/logo.svg') }}" alt="Header Avatar"> -->
                    <span class="d-none d-xl-inline-block ms-1" style="color: #000;">{{ auth()->guard('admin')->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block" style="color: #000;"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ri-user-line align-middle me-1"></i> Profil</a> -->
                    <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger" style="color: red;"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
