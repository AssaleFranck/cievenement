@extends('layouts.partials.navbar')

@section('title', "blog Cote d'Ivoire évènement")

@section('content')
            <div class="container mb-10">
                <div class="row w-3/4 mb-11 ml-11">

                    <!--Comment Form-->

                    <div class="comment-form col-md-12 grid-margin stretch-card">

                        <div class="group-title">

                            <h3 class="mb-5">Modifier le commentaire</h3>

                            <div class="card-body w-4/5 mb-4 bg-gray-200">

                        <form class="my-3" method="POST" action="{{ route('comment.update', $comment->id) }}">
                            {{ csrf_field() }}
                        {{ @method_field('put')}}


                            <div class="row clearfix center-block">

                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">

                                    <input type="text" name="name" placeholder="Votre nom" value="{{ $comment->name }}" readonly  required="">

                                </div>



                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">

                                    <input type="email" name="email" placeholder="Votre email" value="{{ $comment->email }}" readonly  required="">

                                </div>



                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">

                                    <input style="height: 150px;" type="text" class="form-control @error('title') is-invalid @enderror"
                                     name="comment" value="{{ $comment->comment }}" required>

                                </div>



                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">

                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">Poster un commentaire </span></button>

                                </div>

                            </div>

                        </form>

                    </div>



            </div>
                </div>
            </div>



<!-- REQUIRED SCRIPTS -->
{{--
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script> --}}

{{-- CUSTOM JS CODES --}}
<script>

//   $.ajaxSetup({
//      headers:{
//        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
//      }
//   });

//   $(function(){

//     /* UPDATE ADMIN PERSONAL INFO */

//     $('#AdminInfoForm').on('submit', function(e){
//         e.preventDefault();

//         $.ajax({
//            url:$(this).attr('action'),
//            method:$(this).attr('method'),
//            data:new FormData(this),
//            processData:false,
//            dataType:'json',
//            contentType:false,
//            beforeSend:function(){
//                $(document).find('span.error-text').text('');
//            },
//            success:function(data){
//                 if(data.status == 0){
//                   $.each(data.error, function(prefix, val){
//                     $('span.'+prefix+'_error').text(val[0]);
//                   });
//                 }else{
//                   $('.admin_name').each(function(){
//                      $(this).html( $('#AdminInfoForm').find( $('input[name="name"]') ).val() );
//                   });
//                   alert(data.msg);
//                 }
//            }
//         });
//     });



//     $(document).on('click','#change_picture_btn', function(){
//       $('#admin_image').click();
//     });


//     $('#admin_image').ijaboCropTool({
//           preview : '.admin_picture',
//           setRatio:1,
//           allowedExtensions: ['jpg', 'jpeg','png'],
//           buttonsText:['CROP','QUIT'],
//           buttonsColor:['#30bf7d','#ee5155', -15],
//
//            withCSRF:['_token','{{ csrf_token() }}'],
//           onSuccess:function(message, element, status){
//              alert(message);
//           },
//           onError:function(message, element, status){
//             alert(message);
//           }
//        });


//     $('#changePasswordAdminForm').on('submit', function(e){
//          e.preventDefault();

//          $.ajax({
//             url:$(this).attr('action'),
//             method:$(this).attr('method'),
//             data:new FormData(this),
//             processData:false,
//             dataType:'json',
//             contentType:false,
//             beforeSend:function(){
//               $(document).find('span.error-text').text('');
//             },
//             success:function(data){
//               if(data.status == 0){
//                 $.each(data.error, function(prefix, val){
//                   $('span.'+prefix+'_error').text(val[0]);
//                 });
//               }else{
//                 $('#changePasswordAdminForm')[0].reset();
//                 alert(data.msg);
//               }
//             }
//          });
//     });


//   });

 </script>
 <!--/body>
 </html-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

<script src="{{ asset('users_asset/js/fancybox.umd.js') }}"></script>
<script src="{{ asset('users_asset/js/jquery.js') }}"></script>
<script src="{{ asset('users_asset/js/popper.min.js') }}"></script>
<script src="{{ asset('users_asset/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('users_asset/js/jquery-ui.js') }}"></script>
<script src="{{ asset('users_asset/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('users_asset/js/jquery.countdown.js') }}"></script>
<script src="{{ asset('users_asset/js/appear.js') }}"></script>
<script src="{{ asset('users_asset/js/owl.js') }}"></script>
<script src="{{ asset('users_asset/js/wow.js') }}"></script>
<script src="{{ asset('users_asset/js/parallax.min.js') }}"></script>
<script src="{{ asset('users_asset/js/script.js') }}"></script>
<!-- Color Setting -->
<script src="{{ asset('users_asset/js/color-settings.js') }}"></script>
<script type="text/javascript">
    // barContainer = document.querySelector('#barContainer').querySelectorAll('li');
    barContainer = document.querySelectorAll('#navbarSupportedContent li');
    // console.log(barContainer);
    barContainer.forEach( li => {
        li.addEventListener("click", function(){
            // alert("bonjour");
            barContainer.forEach(nav=>nav.classList.remove("current"));
            this.classList.add("current");
        })
    })

</script>
@endsection
