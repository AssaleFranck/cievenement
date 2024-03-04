@extends('layouts.app_principale')
@section('title', "Blog Cote d'Ivoire évènement")
@section('content')

    <!--Page Title-->

<section class="page-title">
    <!-- <section class="page-title" style="background-image:url('{{asset('users_asset/img/banner.jpg')}}')"> -->

        <div class="auto-container">

            <h1 class="text-secondary">Blog Récents</h1>

            <ul class="bread-crumb clearfix">

                <li><a class="text-secondary" href="/">Home</a></li>
                <li class="text-secondary">||</li>
                <li><a class="text-secondary" href="/blog">Blog</a></li>

            </ul>

        </div>

</section>
@if(Session::has('success'))
    <div class="alert alert-success text-center">
      {{Session::get('success')}}
    </div>
@endif

<!-- debut corps  blog -->

<div class="sidebar-page-container">

        <div class="auto-container">

            <div class="row clearfix">

                <!--Content Side / Blog Sidebar-->

                <div class="content-side col-lg-8 col-md-12 col-sm-12">

                    <div class="blog-sidebar">
                        {{-- @if (count($comment->comment) > 0) --}}
                        <!-- News Block Three -->
                        @forelse($postes as $post)

                        <div class="news-block wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">

                            <div class="inner-box">

                                <div class="image-box">

                                    <figure class="image"><a href="{{ route('blog.show', $post->id) }}"><img src="{{asset('images/posts/'.$post->imagePath)}}" alt="poste Côte d'Ivoire evenement" id="blog"></a></figure>

                                </div>

                                <div class="lower-content">

                                    <ul class="post-info">

                                        {{-- <li><span class="fa fa-user"></span> {{ $post->user->name }}</li> --}}

                                        {{-- <li><span class="fa fa-comments"></span>Commentaires {{$comments->count()}}</li> --}}


                                        <span class="fa fa-calendar-plus-o" aria-hidden="true" font-bold italic text-success">
                                        {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y')}}, {{$post->created_at->diffForHumans() }}
                                        </span>

                                    </ul>

                                    <h4><a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a></h4>

                                    <div class="text"> {!! strip_tags(substr($post->body, 0, 500,)) !!}...</div>

                                    <div class="btn-box"><a href="{{ route('blog.show', $post->id) }}" class="read-more">Lire plus</a>

                                    {{-- @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id) --}}
                                    {{-- <span class="float-right">
                                        <form action="{{ route('post.destroy', $post) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <input class="btn btn-sm btn-outline-danger" value="Supprimer" type="submit">
                                        </form>
                                    </span> --}}
                                    {{-- <span class="float-right mx-4">
                                        <a style="background-color: #6c757d!important; href="{{ route('post.edit', $post->id) }}">Modifier</a>
                                    </span>
                                @endif --}}
                                </div>

                            </div>
                        </div>
                    </div>
                        @empty
                            <div class="mx-6 sm text-justify-center">
                                <li class=" d-flex justify-content-center">Désolé, il n'y a actuellement aucun article lié à cette recherche !</li>
                            </div>
                       @endforelse

                        <div>
                            {{ $postes->links() }}
                        </div>


                    </div>

                </div>



                <!--Sidebar Side-->

                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">

                    <aside class="sidebar padding-left">



                        <!-- Search -->

                        <div class="sidebar-widget search-box">

                            <form method="" action="">

                                <div class="form-group border border-warning rounded pl-1">

                                    <input type="search" class="border-0" name="search" value="" placeholder="Recherche..." required>

                                    <button type="submit" class="bg-warning border-0 rounded-right"><span class="icon fa fa-search"></span></button>

                                </div>

                            </form>

                        </div>



                        <!-- Category Widget -->

                        <div class="sidebar-widget categories">

                            <h4 class="sidebar-title">Categories</h4>

                            <div class="widget-content">

                                <!-- Blog Category -->
                                @forelse ($categories as $categore)

                                <ul class="blog-categories">

                                    <li><a href="{{route('blog.index', ['category' => $categore->name ])}}">{{ $categore->name}} <span>{{ $categore->posts->count() }}</span></a></li>
                                    @empty
                                    <div class="mx-6 sm text-justify-center">
                                        <li class=" d-flex justify-content-center">Désolé, il n'y a actuellement aucune categorie !</li>
                                    </div>
                                    @endforelse

                                </ul>

                            </div>

                        </div>



                        <!-- Post Widget -->

                        <div class="sidebar-widget popular-posts">

                            <h4 class="sidebar-title">Derniers post</h4>

                            <div class="widget-content">

                                @forelse ($poste as $post)

                                <article class="post">

                                    <div class="post-inner">



                                        <figure class="post-thumb"><a href="{{ route('blog.show', $post->id) }}"><img style="height: 65px;" src="{{asset('images/posts/'.$post->imagePath)}}" alt="poste Côte d'Ivoire evenement"></figure>

                                        <div class="post-info">{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y')}}</div>

                                        <div class="text"><a href="{{ route('blog.show', $post->id) }}">{!! strip_tags(substr($post->title, 0, 20,)) !!}...</a></div>

                                    </div>

                                </article>

                                @empty
                                <div class="mx-6 sm text-justify-center">
                                    <li class=" d-flex justify-content-center">Désolé, il n'y pas de poste recent !</li>
                                </div>
                                @endforelse
                            </div>

                        </div>


                    </aside>

                </div>

            </div>

        </div>

</div>
    <!-- Fin corps  -->



    <!-- <section class="subscribe-section">  -->
 <section class="subscribe-section">

      <div class="auto-container">

        <div class="content-box">


            <div class="title-column">

                <div class="sec-title">
                    <h2>Abonnez-vous à notre newsletter</h2>
                    <span> Et recévrez nos différents actualités</span>

                </div>



                <!--Newsletter Form-->

                <div class="newsletter-form">

                    <form method="" action="blog">

                        <div class="form-group d-flex justify-content-start flex-row align-items-start border border-warning border-1 px-0">
                        
                            <input type="email" name="field-name" class="border-0 pr-0" placeholder="Entrez votre Adresse e-mail" required>
                            
                            <button type="submit" class="theme-btn btn-style-three border-0"><span class="btn-title">Souscrire</span></button>
                            
                        </div>

                    </form>

                </div>



            </div>

        </div>

    </div>

 </section>
<!--End Subscribe Section -->
<style>
    input{
        outline: none;
    }
</style>
@endsection
