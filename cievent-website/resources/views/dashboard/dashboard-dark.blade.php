<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard | CI Event</title>
	<!-- core:css -->
	<link rel="stylesheet" href="../../../assets/vendors/core/core.css">
	<!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="../../../assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="../../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->
  <!-- Layout styles -->
	<link rel="stylesheet" href="../../../assets/css/demo_2/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{asset('images/icon.png')}}" />
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:../../partials/_sidebar.html -->
		@include('partials.sidebar')

    <nav class="settings-sidebar">
      <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
          <i data-feather="settings"></i>
        </a>
        <div class="theme-wrapper">
          <h6 class="text-muted mb-2">Light Theme</h6>
          <a class="theme-item active" href="{{route('dashboard')}}">
            <img src="{{asset('assets/images/screenshots/light.jpg')}}" alt="light theme">
          </a>
          <h6 class="text-muted mb-2">Dark Theme</h6>
          <a class="theme-item" href="{{route('dashboard-dark')}}">
            <img src="{{asset('assets/images/screenshots/dark.jpg')}}" alt="light theme">
          </a>
        </div>
      </div>
    </nav>
		<!-- partial -->

		<div class="page-wrapper">

			<!-- partial:../../partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
          <h4 class="my-auto">Welcome to Dashboard</h4>
					<ul class="navbar-nav">
						<li class="nav-item dropdown nav-profile">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="{{asset('images/icon.png')}}" alt="profile">
							</a>
							<div class="dropdown-menu" aria-labelledby="profileDropdown">
								<div class="dropdown-header d-flex flex-column align-items-center">
									<div class="figure mb-3">
										<img src="{{asset('images/icon.png')}}" alt="">
									</div>
									<div class="info text-center">
										<p class="name font-weight-bold mb-0">{{Auth::user()->name}}</p>
										<p class="email text-muted mb-3">{{Auth::user()->email}}</p>
									</div>
								</div>
								<div class="dropdown-body">
									<ul class="profile-nav p-0 pt-3">
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i data-feather="log-out"></i>
                        <span>{{ __('Logout') }}</span>
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                    </li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- partial -->

			<div class="page-content">

				<nav class="page-breadcrumb">
          <h5 class="mb-3 mb-md-0">Liste des Utilisateurs</h5>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  @if ($datas->count() > 0)
                    <table id="dataTableExample" class="table">
                      <thead>
                        <tr>
                          <th>Noms</th>
                          <th>Emails</th>
                          <th>Date d'inscription</th>
                          <th>Role</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($datas as $list)
                          <tr>
                            <td class="">{{$list->name}}</td>
                            <td class="">{{$list->email}}</td>
                            <td class="">{{$list->created_at}}</td>
                            <td class="">{{$list->role}}</td>
                            <td class="">{{$list->status}}</td>
                            <td class="">$320,800</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @else
                    <div class="col-12 card p-2 mt-4 d-flex text-muted">
                      <div class="body-cart text-center">
                        <span class="col-4 text-uppercase h6">Aucune donnée</span>
                      </div>
                    </div>
                  @endif
                </div>
              </div>
            </div>
					</div>
				</div>

			</div>

			<!-- partial:../../partials/_footer.html -->
      @include('partials.footer')
			<!-- partial -->

		</div>
	</div>

	<!-- core:js -->
	<script src="../../../assets/vendors/core/core.js"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
  <script src="../../../assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="../../../assets/vendors/feather-icons/feather.min.js"></script>
	<script src="../../../assets/js/template.js"></script>
	<!-- endinject -->
  <!-- custom js for this page -->
  <script src="../../../assets/js/data-table.js"></script>
	<!-- end custom js for this page -->
</body>
</html>
