@extends('layouts.partials.navb')
@section('head')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
@endsection
@section('content')
<div class="sm:grid grid-cols-2 gap-20  ml-4 py-2 border-b border-gray-200">
    <div class="py-2 ">
        <h1 class="text-3xl">
            Creer un nouveau poste
        </h1>
    </div>
<div>
    @if(Auth::check())
        <div class="py-2 w-4/5 m-auto">
            <a
            href={{ route('dashboard.index') }}
            class="uppercase float-right btn btn-outline-warning px-md-4 border-warning text-green-500 text-lg font-extrabold py-2 rounded-4xl">
                Retour
            </a>
        </div>
    @endif
</div>
</div>
    <main class="container py-2" style="background-color: #fff;">
        <section id="contact-us">

                 @include('includes.flash-message')
            <!-- Contact Form -->
            <div class="contact-form mt-4 text-red">
                <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Title -->
                    <div class="form-group mt-4 text-xl">
                        <label for="title"><span>Titre</span></label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" placeholder="Titre du Poste" name="title" value="{{ old('title') }}" />
                        @error('title')
                            {{-- The $attributeValue field is/must be $validationRule --}}
                            <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div class="form-group mt-4 col-xs-12">
                    <label for="image" ><span>Image</span></label>
                    <input class="form-control btn btn-outline-success file-upload-info file-upload-browse @error('imagePath') is-invalid @enderror"
                     type="file" id="imagePath" name="imagePath" />
                     {{-- <img src="{{ asset('uploads/postsImages/'.$post->imagePath) }}" alt=""> --}}
                    @error('imagePath')
                    {{-- The $attributeValue field is/must be $validationRule --}}
                    <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror
                    </div>

                    <!-- Drop down -->
                    <div class="form-group mt-4">
                    <label for="categories"><span>Choisir un categorie:</span></label>
                    <select name="category_id" id="categories">
                        <option class="@error('category_id') is-invalid @enderror" selected disabled>Selectionner une categorie </option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        {{-- The $attributeValue field is/must be $validationRule --}}
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror
                   </div>


                    <!-- Body-->
                    <div class="form-group mt-4">
                    <label for="body"><span>Corps</span></label>
                    <textarea class="@error('body') is-invalid @enderror" id="body" name="body">{{ old('body') }}</textarea>
                    </div>
                    @error('body')
                    {{-- The $attributeValue field is/must be $validationRule --}}
                    <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror

                    <!-- Button -->
                    <div class="d-flex justify-content-around w-25 mx-auto">
                        <a class="btn btn-outline-danger px-4" href="{{route('blog.index')}}" >Annuler</a>
                        <button class="btn btn-outline-warning px-4" type="submit" >Soumettre</button>
                    </div>
                </form>
            </div>

        </section>


    </main>

@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection
