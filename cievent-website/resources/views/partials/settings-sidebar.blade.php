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
            {{-- <h6 class="text-muted mb-2">Dark Theme</h6>
            {{route('dashboard-dark.index')}}
            <a class="theme-item" href="">
                <img src="../../../assets/images/screenshots/dark.jpg" alt="light theme">
            </a> --}}
        </div>
    </div>
</nav>