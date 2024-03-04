@extends('layouts.partials.navbar')

@section('content')
    <!-- main -->
    <main class="container">
        <div class="sm:grid grid-cols-2 gap-20  ml-4 py-2 border-b border-gray-200">
            <div class="py-2 ">
                <h1 class="text-2xl">
                    Blog
                </h1>
            </div>
        <div>
            {{-- @if (Auth::check()) --}}
                <div class="py-2 w-4/5 m-auto">
                    <a
                    href={{ route('blog.create') }}
                    class="uppercase float-right  px-md-3 border-warning text-green-500 text-lg font-extrabold py-2 rounded-4xl">

                    </a>
                </div>
                {{-- @endif --}}
        </div>
        </div>


                <div class="mb-10  border-b border-gray-200 max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                    <ul class="sm:grid grid-cols-5  ml-2 p-auto text-center ">
                        {{-- @if ($posts->count() > 0) --}}
                        @forelse ($categories as $category)
                        {{-- <span>{{ $categories->count() }}</span> --}}
                        <li id="cat"  class="w-4/5 btn btn-outline-warning text-lg mx-auto font-extrabold mr-4 mt-4 py-2 p-auto rounded-3xl">
                            <a class="text-green-500" href="{{route('blog.index', ['category' => $category->name ])}}">
                                <span>{{ $category->name}}({{ $category->posts->count() }})</span>
                                </a></li>
                                @empty
                                <li>Désolé, il n'y a actuellement aucun article lié à cette recherche !</li>
                                @endforelse
                            </ul>
                        </div>
                        {{-- @else

                      @endif --}}

                <style>
                    #cat{
                        border-radius: 20px;
                    }
                    .text1{
                        margin-left: -100px;
                    }

                    @media screen and (max-width: 1024px)
                        {
                            #post1
                            {
                                width: 500px;
                                height: auto;
                                font-size: 1.2em;
                            }
                        }

                        #img1
                            {
                                width:800px;
                                height:280px;
                            }

                            @media all and (min-width: 360px) and (max-width: 1280px)
                        {
                            #img1
                            {
                                width: 1280px;
                                height: auto;
                                font-size: 1.2em;
                            }
                        }
                </style>

            @forelse($posts as $post)

            <div id="post1" class="container ">
            <div class="row border-b border-gray-200 w-5/5 mb-6 px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
                <div class="col-6 col-md-5">

                    <img id="img1" src="{{ asset($post->imagePath) }}" alt="" />

                </div>
                <div class="col-md-7">

                        <h2 class="text-black font-bold text-3xl pb-2">
                            <a href="{{ route('blog.show', $post) }}">
                            {{ $post->title }}
                        </a>
                        </h2>
                        <span class="">
                            Ecrit par <span class="font-bold italic text-success">{{ $post->user->name }}</span>, Posté le
                            <span class="font-bold italic text-success"> {{ date('jS M Y', strtotime($post->updated_at)) }}</span>,
                            {{ $post->created_at->diffForHumans() }}
                        </span>
                        <p class=" pt-4 font-light">

                                {{-- \Illuminate\Support\Str::limit($post->body,200) --}}


                                {!! strip_tags(substr($post->body, 0, 800,)) !!}

                        </p>
                        <p class="text-xl text-gray-700 pt-2 pb-5 leading-8 font-light">
                            <a href="{{ route('blog.show', $post->id) }}" class=" btn-success text-white text-lg font-extrabold py-2 px-8 rounded-3xl">
                                Voir plus
                            </a>
                        </p>
                        <div style="margin-top: -5">

                        </div>
                        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                            <span class="float-right">
                                <form action="{{ route('blog.destroy', $post) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <button class="text-white italic btn btn-success" type="submit">
                                        Supprimer
                                    </button>
                                </form>
                            </span>
                            <span class="float-right mx-4">
                                <button type="submit" class="text-white italic btn btn-warning">
                                    <a class="text-white"
                                    href="{{ route('blog.edit', $post->id) }}">Modifier</a>
                                </button>
                            </span>
                        @endif
                </div>
            </div>
        </div>
            @empty
                <p>Désolé, il n'y a actuellement aucun article lié à cette recherche !</p>
            @endforelse

            <div class="mt-4">
                  {{-- @comments(['model' => $post])   --}}
            </div>

           <div class="flex float-right">
            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 btn-warning rounded-md hover:bg-blue-500 hover:text-white">
                Haut
            </a>
           </div><br>
             <!-- pagination -->

           <div cla>
               {{ $posts->links() }}
           </div>


    </main>
@endsection
