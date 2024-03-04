<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard | Users</title>
	<!-- core:css -->
	<link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
	<!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{asset('images/icon.png')}}" />
  <script src="jquery-3.5.1.min.js"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
	<div class="main-wrapper">


		<!-- partial:../../partials/_sidebar.html -->
		@include('partials.sidebar')

    @include('partials.settings-sidebar')
		<!-- partial -->
	
		<div class="page-wrapper">
				
			<!-- partial:../../partials/_navbar.html -->
			@include('partials.navbar')
			<!-- partial -->

			<div class="page-content">
        @if(Session::has('success'))
          <div class="alert alert-success">
            {{Session::get('success')}}
          </div>
        @endif
        @if(Session::has('error'))
          <div class="alert alert-success d-flex justify-content-center">
            {{Session::get('error')}}
          </div>
        @endif
				<nav class="page-breadcrumb d-flex justify-content-between align-items-center"> 
          <h5 class="mb-3 mb-md-0">Liste des Utilisateurs <span class="ml-2">( {{$datas->count()}} )</span></h5>
          <a href="{{route('users.create')}}" class="btn btn-outline-warning">Ajouter</a>
				</nav>
				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table id="dataTableExample" class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Noms</th>
                        <th>Emails</th>
                        <th>Date d'inscription</th>
                        <th class="text-center">Autorisatition</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($datas as $list)
                        @if (Auth::user()->author)
                          @if (Auth::user()->email != $list->email)
                            <tr>
                              <td class="">
                                <a class="text-decoration-none text-reset text-center" href="{{route('users.edit', $list->id)}}">{{++$num}}</a>
                              </td>
                              <td class="">
                                <a class="text-decoration-none text-reset text-center" href="{{route('users.edit', $list->id)}}">{{$list->name}}</a>
                              </td>
                              <td class="">
                                <a class="text-decoration-none text-reset text-center" href="{{route('users.edit', $list->id)}}">{{$list->email}}</a>
                              </td>
                              <td class="">
                                <a class="text-decoration-none text-reset text-center" href="{{route('users.edit', $list->id)}}">{{$list->created_at}}</a>
                              </td>
                              <td class="text-center">
                                @if ($list->author)
                                  <a class="text-decoration-none text-reset text-center" href="{{route('users.edit', $list->id)}}"><span class="text-white p-1 bg-warning">Auteur</span></a>
                                @elseif ($list->admin)
                                  <a class="text-decoration-none text-reset text-center" href="{{route('users.edit', $list->id)}}"><span class="text-white p-1 bg-success">Administrateur</span></a>
                                @elseif ($list->user)
                                  <a class="text-decoration-none text-reset text-center" href="{{route('users.edit', $list->id)}}"><span class="text-white p-1 p bg-primary">Utilisateur</span></a>
                                @endif
                              </td>
                              <td class="">
                                {{-- <a href="{{route('dashboard.destroy', $list['id'])}}"> <button class="btn btn-outline-danger">Supprimer</button></a> --}}
                                <form action="{{route('users.destroy', $list->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-xs btn-outline-danger" type="submit">Supprimer</button>
                                </form>
                              </td>
                            </tr>
                          @endif
                        @else
                          @if (! $list->author)
                            @if (Auth::user()->email != $list->email)
                              <tr>
                                <td class="">
                                  <a class="text-decoration-none text-reset text-center" href="{{route('users.edit', $list->id)}}">{{++$num}}</a>
                                </td>
                                <td class="">
                                  <a class="text-decoration-none text-reset text-center" href="{{route('users.edit', $list->id)}}">{{$list->name}}</a>
                                </td>
                                <td class="">
                                  <a class="text-decoration-none text-reset text-center" href="{{route('users.edit', $list->id)}}">{{$list->email}}</a>
                                </td>
                                <td class="">
                                  <a class="text-decoration-none text-reset text-center" href="{{route('users.edit', $list->id)}}">{{$list->created_at}}</a>
                                </td>
                                <td class="text-center">
                                  @if ($list->author)
                                    <a class="text-decoration-none text-reset text-center" href="{{route('users.edit', $list->id)}}"><span class="text-white p-1 bg-warning">Auteur</span></a>
                                  @elseif ($list->admin)
                                    <a class="text-decoration-none text-reset text-center" href="{{route('users.edit', $list->id)}}"><span class="text-white p-1 bg-success">Administrateur</span></a>
                                  @elseif ($list->user)
                                    <a class="text-decoration-none text-reset text-center" href="{{route('users.edit', $list->id)}}"><span class="text-white p-1 p bg-primary">Utilisateur</span></a>
                                  @endif
                                </td>
                                <td class="">
                                  {{-- <a href="{{route('dashboard.destroy', $list['id'])}}"> <button class="btn btn-outline-danger">Supprimer</button></a> --}}
                                  <form action="{{route('users.destroy', $list->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-xs btn-outline-danger" type="submit">Supprimer</button>
                                  </form>
                                </td>
                              </tr>
                            @endif
                          @endif
                        @endif
                      @endforeach
                    </tbody>
                  </table>
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
	<script src="{{asset('assets/vendors/core/core.js')}}"></script>
	
	<!-- endinject -->
  <!-- plugin js for this page -->
  <script src="{{asset('assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('assets/js/template.js')}}"></script>
	<!-- endinject -->
  <!-- custom js for this page -->
  <script src="{{asset('assets/js/data-table.js')}}"></script>
	<!-- end custom js for this page -->
</body>
</html>