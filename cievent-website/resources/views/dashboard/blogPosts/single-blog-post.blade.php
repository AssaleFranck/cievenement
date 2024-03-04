@extends('layouts.partials.navb')

@section('content')
        <!-- main -->
        <main class="container">
        <section class="single-blog-post">
            <h1>{{$contenu->title}}</h1>

            <span class="">
                Ecrit par <span class="font-bold italic text-success">{{ $contenu->user->name }}</span>, Posté le
                <span class="font-bold italic text-success"> {{ date('jS M Y', strtotime($contenu->updated_at)) }}</span>,
                {{ $contenu->created_at->diffForHumans() }}
            </span>

            <div class="single-blog-post-ContentImage" data-aos="fade-left">
            <img style="width:660px; height:450px; margin-top:10px"  src="{{asset($contenu->imagePath)}}" alt="" />
            </div>

            <div class="about-text text-lg w-5/5 mt-10">
            {!!$contenu->body!!}
            </div>
        </section>
                        {{-- =========Afficher commentaire============= --}}
        <section>
            <div class="response">
                <h4 class="mt-5 mb-3">Commentaire</h4>
                @forelse ($contenu->comments()->latest()->get() as $com)

                <div class="media response-info mb-4">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img style="width: 80px; border-radius: 100%;" class="media-object" src="{{asset('images/avatar1.png') }}" alt="">
                        </a>
                        <h5> <a href="#">{{ $com->name }}</a></h5>
                    </div>
                    <div class="media-body response-text-right ml-5">
                        <p class="mb-3 ">{{$com->comment}}</p>
                        <ul class="d-flex">
                            <li> <span class="font-bold italic text-success mr-2"> {{ date('jS M Y', strtotime($com->updated_at)) }}</span>,
                                <span class="mr-2">
                                    {{ $com->created_at->diffForHumans() }}
                                </span></li>
                                {{-- <li><a href="comment_box" onclick="document.getElementById('comment_id').value = {{ $com->id }}">Repondre</a></li> --}}
                                {{-- <li>{!! Form::hidden('_method', 'DELETE') !!}</li> --}}
                            </ul>



                            {{-- @if (Auth::user()) --}}
                            @if (Auth::user())
                            @if (Auth::user()->email == $com->email)
                            <div class="d-flex">
                                <span class="">
                                    <form action="{{ route('comment.destroy', $com->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ @method_field('delete')}}

                                        <button class="italic btn btn-outline-success deletebtn" type="submit">
                                            Supprimer
                                        </button>
                                    </form>
                                </span>
                                <span class=" mx-4">
                                    <button type="submit" class="italic btn btn-outline-warning editbtn">
                                        <a class=""
                                        href="{{ route('comment.edit', $com->id) }}">Modifier</a>
                                    </button>
                                </span>

                            </div>
                            {{-- <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#commentEditModal" data-whatever="@mdo">Modifier</button>
                            <button type="submit" class="btn btn-outline-success deletebtn" data-togg="moda" data-targ="#exampleMod" data-whateve="@at">Supprimer</button> --}}
                            @endif

                            @else

                            <div class="my-5">
                                    @if(Auth::user() == Null)
                                        <p>Pour modifier, <a class="" href="{{route('login')}}"> connectez-vous</a></p>
                                    @endif
                                </div>
                                @endif



                        {{--=================Fin Vue index comment==================--}}

                        {{--=================debut form ajax comment==================--}}

                        {{-- =========================Replay================================== --}}
                        </div>

                    </div>

        @empty
            <div class="media response-info">
                <div class="media-left response-text-left">
                    <p>Personne n'a commente ce poste</p>
                </div>
            </div>
        @endforelse

            </div>
        </section>





        {{--=================debut form ajax comment==================--}}



        {{-- ======formulaire commentaire====== --}}
                <div class="mt-4">
                    <div  class="coment-form col-md-10 m-0 h-100 " id="comment_box">
                        <div class="card shadow border border-warning w-3/5">
                            <div class="bg-green-400">
                                <h4 class="card-header text-center mt-md-2 ">Envoyer un commentaire</h4>
                            </div>
                            <div class="card-body">

                                <form id="comment-box"  class="comment-form d-flex flex-column align-items-center" method="POST" action="{{ route('comment.store', $contenu->id) }}">
                                    @csrf
                                    @if (Auth::user())
                                <div class="mb-2 w-3/5">
                                    {{-- <input id="comment_id" type="hidden" class="form-control @error('comment_id') is-invalid @enderror" name="_token" placeholder="Entrer votre nom" value="{{old('comment_id')}}" required> --}}
                                    <input id="comment_id" type="hidden" class="form-control @error('comment_id') is-invalid @enderror" name="comment_id" placeholder="Entrer votre nom" value="{{old('comment_id')}}" required>
                                    <label for="name"></label>
                                    @error('comment_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div class="mb-2 w-3/5">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Entrer votre nom" value="{{Auth::user()->name}}" readonly  required>
                                        <label for="name"> </label>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-2 w-3/5">
                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}"  placeholder="nom@exemple.com" readonly required>
                                        <label for="email"></label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>




                                <div class="mb-2 w-3/5">
                                    <label for="Commentaire">Commentaire</label>
                                    <textarea class="form-control @if($errors->has('comment')) is-invalid @endif" id="comment"  rows="4"
                                        name="comment" value="{{ old('comment') }}" placeholder="votre commentaire" required></textarea>
                                    <div class="invalid-feedback">
                                        Le champ message est vide
                                    </div>
                                    </div>
                                    @error('content')
                                    {{-- The $attributeValue field is/must be $validationRule --}}
                                    <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                                    @enderror

                                <div class="row mb-0">
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-outline-warning px-md-5 border-2 border-warning ">
                                            Soumettre
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>

                                {{-- </div>
                            </div> --}}

                    @else
                                <div class="form-floating mb-3 w-3/5">
                                    <label for="name"></label>
                                    <input id="comment_id" type="hidden" class="form-control @error('comment_id') is-invalid @enderror" name="comment_id" placeholder="Entrer votre nom" value="{{old('comment_id')}}" required>
                                    @error('comment_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                    <div class="mb-2 w-3/5">
                                        <label for="name">Nom </label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Entrer votre nom" value="{{old('name')}}"  required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="mb-2 w-3/5">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}"  placeholder="nom@exemple.com" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-2 w-3/5">
                                        <label for="Commentaire">Commentaire</label>
                                        <textarea class="form-control @if($errors->has('comment')) is-invalid @endif" id="comment" rows="4"
                                        name="comment" value="{{ old('comment') }}" placeholder="votre commentaire" required></textarea>
                                        <div class="invalid-feedback">
                                        Le champ message est vide
                                    </div>
                                    </div>
                                    @error('content')
                                    {{-- The $attributeValue field is/must be $validationRule --}}
                                    <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                                    @enderror

                                    <div class="row mb-0">
                                        <div class="col-12 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-outline-warning px-md-5 border-2 border-warning ">
                                                Soumettre
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                     @endif


        </div>



        {{-- ===========Poste en relation========== --}}

        <section class="recommended">

            <div class="recommended-cards mt-4">

            @foreach ($posts as $post)
                @if ($post->id == $contenu->id)

                <div class="sm:grid bg-orange-100 grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
                    <div>
                        <img style="width:400px; height:300px;" src="{{ asset($post->imagePath) }}" alt="" />
                    </div>
                    <div>
                        <h2 class="text-black font-bold text-3xl pb-4">
                            {{ $post->title }}
                        </h2>
                        <span class="">
                            Ecrit par <span class="font-bold italic text-green-500">{{ $post->user->name }}</span>, Posté le
                            <span class="font-bold italic text-green-500"> {{ date('jSMY',strtotime($post->updated_at)) }}</span>,
                            {{ $post->created_at->diffForHumans() }}
                        </span>
                        <p class="about-text text-xl text-gray-700 pt-2 pb-10 leading-8 font-light">

                                {{-- \Illuminate\Support\Str::limit($post->body,200) --}}
                                {!! substr($post->body, 0, 500) !!}
                        </p>
                        <p class="text-xl text-gray-700 pb-10 leading-8 font-light">
                            <a href="{{ route('blog.show',$post) }}" class="uppercase btn-success text-white text-lg font-extrabold py-2 px-8 rounded-3xl">
                                Voir plus
                            </a>
                        </p>

                    </div>
                </div>
                @else
                <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
                    <div>
                        <img style="width:400px; height:300px;" src="{{ asset($post->imagePath) }}" alt="" />
                    </div>
                    <div>
                        <h2 class="text-black font-bold text-3xl pb-2">
                                <a href="{{ route('blog.show', $post) }}">
                                {{ $post->title }}
                            </a>
                            </h2>
                        <span class="">
                            Ecrit par <span class="font-bold italic text-green-500">{{ $post->user->name }}</span>, Posté le
                            <span class="font-bold italic text-green-500"> {{ date('jSMY',strtotime($post->updated_at)) }}</span>,
                            {{ $post->created_at->diffForHumans() }}
                        </span>
                        <p class="about-text text-xl text-gray-700 pt-2 pb-10 leading-8 font-light">

                                {{-- \Illuminate\Support\Str::limit($post->body,200) --}}
                                {!! substr($post->body, 0, 500) !!}
                        </p>
                        <p class="text-xl text-gray-700 pb-10 leading-8 font-light">
                            <a href="{{ route('blog.show',$post) }}" class="uppercase btn-success text-white text-lg font-extrabold py-2 px-8 rounded-3xl">
                                Voir plus
                            </a>
                        </p>

                    </div>
                </div>
                @endif



        @endforeach




                            <!--Ajouter commentaire Modal -->
                            <div class="modal fade" id="commentEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="editform">
                                        <div class="modal-body">
                                            {{-- <input type="hidden" name="id" id="id"> --}}
                                            <div class="form-group">
                                            <label for="name" class="col-form-label">Nom:</label>
                                            <input type="text" name="name" class="form-control" id="name">
                                            </div>
                                            <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="text" name="email" class="form-control" id="email">
                                            </div>
                                            <div class="form-group">
                                            <label for="comment">Message:</label>
                                            <textarea class="form-control" name="comment" id="comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-success" data-dismiss="modal">Fermer</button>
                                            <button class="btn btn-outline-warning" type="submit">Soumettre</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>




                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $('#editform').on('submit', function(e){
                                        e.preventDefault();

                                        // var id = $('#id').val();

                                        $.ajax({
                                        type: "PUT",
                                        url: "/admin/blogPosts/blog/comments"+id,
                                        data: $('#editform').serialize(),
                                        success: function (reponse){
                                            console.log(reponse);
                                            $('#commentEditModal').modal('hide');
                                            alert("data saved");
                                        },
                                        error: fuction(error){
                                            console.log(error);
                                            alert("data not saved");
                                        }
                                        });

                                        });

                                    // $('.addform').on('click', function(){
                                    //     $('#m').modal('show');

                                    //     $tr = $(this).closest('tr');

                                    //     var data = $tr.children('td').map(function(){
                                    //         return $(this).text();
                                    //     }).get();

                                    //     console.log(data);

                                    //     $('#$id').val(data[0]);
                                    //     $('#$name').val(data[1]);
                                    //     $('#$email').val(data[2]);
                                    //     $('#$comment').val(data[3]);
                                    // });

                             });
                            </script>


            </div>
        </section-->
        </main>
@endsection

