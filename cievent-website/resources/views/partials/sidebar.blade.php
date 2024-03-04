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
            {{-- <li class="nav-item nav-category">Main</li> --}}
            <li class="nav-item">
                <a href="{{route('dashboard.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Utilisateurs</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('event.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Evènements</span>
                </a>
            </li>
            
            {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Email</span>
                </a>
            </li> --}}
            <li class="nav-item nav-category">Blog</li>
            <li class="nav-item">
                <a href="{{route('post.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="file-text"></i>
                    <span class="link-title">Posts</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="bookmark"></i>
                    <span class="link-title">Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('comment.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Commentaires</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
