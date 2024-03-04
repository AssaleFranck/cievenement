	<!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar">
        <div class="sidebar-header p-0 pr-3">
          <div class="w-75">
            <a href="#" class="sidebar-brand">
              <img class="img-fluid" src="{{asset('images/logo.png')}}" alt="Logo Cote d'Ivoire Evenement">
            </a>
          </div>
          <div class="sidebar-toggler not-active m-0 ">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item">
                    <a href="{{route('dashboard.index')}}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Utilisateurs</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="emails">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route('dashboard.create')}}" class="nav-link">Ajouter</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Email</span>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('dashboard.index')}}" class="nav-link">
                      <i class="link-icon" data-feather="box"></i>
                      <span class="link-title">Poste</span>
                  </a>
              </li>
            </ul>
        </div>
      </nav>

      <nav class="settings-sidebar">
        <div class="sidebar-body">
          <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
          </a>
          <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Light Theme</h6>
            <a class="theme-item active" href="{{route('dashboard.index')}}">
              <img src="{{asset('assets/images/screenshots/light.jpg')}}" alt="light theme">
            </a>
            <h6 class="text-muted mb-2">Dark Theme</h6>
            {{-- {{route('dashboard-dark.index')}} --}}
            <a class="theme-item" href="">
              <img src="../../../assets/images/screenshots/dark.jpg" alt="light theme">
            </a>
          </div>
        </div>
      </nav>
