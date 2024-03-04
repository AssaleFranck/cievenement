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
	<link rel="stylesheet" href="../../../assets/css/demo_1/style.css">
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

        <div class="container">
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
              <div class="mt-4">
                  <nav class="page-breadcrumb d-flex justify-content-between align-items-center">
                      <h5 class="mb-3 mb-md-0 mt-5">Liste des Categories</h5>
                      <a href="{{route('categories.create')}}" class="mt-5 btn btn-outline-warning">Ajouter</a>
                  </nav>
              </div>


            <!--Ajouter commentaire Modal -->
            <div class="modal fade" id="commentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="addform">
                            {{ csrf_field() }}
                            {{ @method_field('POST')}}
                        <div class="modal-body">
                            {{-- <input type="hidden" name="id" id="id"> --}}
                            <div class="form-group">
                              <label for="name" class="col-form-label">Nom:</label>
                               <input type="text" name="name" class="form-control" id="name">
                            </div>
                            {{-- <div class="form-group">
                              <label for="email">Email:</label>
                              <input type="text" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                              <label for="comment">Message:</label>
                              <textarea class="form-control" name="comment" id="comment"></textarea>
                            </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-success" data-dismiss="modal">Fermer</button>
                            <button class="btn btn-outline-warning" type="submit">Soumettre</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commentaddmodal">
                        Ajouter commentaire
                      </button> --}}
                </div>
            </div>

            {{-- <script type="text/javascript">

            $(document).ready(function(){
                $('#addform').on('submit', function(e){
                    e.preventDefault();

                     var id = $('#id').val();

                    $.ajax({
                       type: "POST",
                       url: "/admin/categories/",
                       data: $('#addform').serialize(),
                       success: function (reponse){
                           console.log(reponse);
                           $('#commentaddmodal').modal('hide');
                           alert("data saved");
                       },
                       error: fuction(error){
                           console.log(error);
                           alert("data not saved");
                       }
                    });

                    });
                });
        </script> --}}





                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <div class="table-responsive">
                                   @if ($categories->count() > 0)
                                    <table id="dataTableExample" class=" table table-hover">
                                      <thead>
                                        <tr>
                                            <th>#</th>
                                            {{-- <th>ID</th> --}}
                                            <th>Noms</th>
                                            <th>Actions 1</th>
                                            <th>Actions 2</th>
                                            </tr>
                                        </tr>
                                      </thead>
                                      <tbody>
                                         @forelse ($categories as $category)
                                        <tr>
                                            <td class="">
                                                <a class="text-decoration-none text-reset text-center" href="{{route('categories.edit', $category->id)}}">{{++$num}}</a>
                                            </td>
                                            {{-- <td class="">
                                                <a class="text-decoration-none text-reset text-center" href="{{route('categories.edit', $category->id)}}">{{ $category->id }}</a>
                                            </td> --}}
                                            <td class="">
                                                <a class="text-decoration-none text-reset text-center" href="{{route('categories.edit', $category->id)}}">{{ $category->name }}</a>
                                            </td>
                                            <td class="">
                                                <a class="btn btn-outline-warning" href="{{ route('categories.edit',$category->id) }}">Modifier</a>
                                            </td>
                                            
                                            <td class="">
                                              <form action="{{route('categories.destroy', $category)}}" method="POST">
                                                 @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-success">Supprimer</button>
                                            </form>
                                            </td>
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




         {{-- <script>
        $(document).ready(function(){
            $('.editbtn').on('click', function(){
                $('#AddCategoryEditModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#$id').val(data[0]);
                $('#$name').val(data[1]);
                $('#$email').val(data[2]);
                $('#$comment').val(data[3]);
            });

    $('#editFormID').on('submit', function(e){
        e.preventDefault();

        var id = $('#id').val();

        $.ajax({
           type: "PUT",
           url: "/admin/blogPosts/blog/"+id,
           data: $('#editFormID').serialize(),
           success: function (reponse){
               console.log(reponse);
               $('#commentEditModal').modal('hide');
               alert("data updated");
           },
           error: fuction(error){
               console.log(error);
           }
        });

        });
    });


    </script> --}}

     {{-- $categories->links() --}}


     {{-- <!-- core:js -->
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
	<!-- end custom js for this page --> --}}






			{{-- <div style="background-color: rgb(29, 27, 27)" class="footer"> --}}
                <!-- partial:../../partials/_footer.html -->
                {{-- <footer style="background-color: rgb(29, 27, 27)" class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <p class="text-muted text-center text-md-left "> Copyright © 2022  <a href="#"><span class="text-warning">COTE </span><span class="text-white"> D'IVOIRE</span><span class="text-success"> EVENEMENT</span>  </a>. Tout Droits Reservé</p>
                    <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
                </footer> --}}
                @include('partials.footer')
                <!-- partial -->
            {{-- </div> --}}



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

