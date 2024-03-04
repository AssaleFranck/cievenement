@extends('layouts.partials.navb')
@section('head')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
@endsection
@section('content')
<h4 class="mb-3 mb-md-0 ml-5">Modifier un poste</h4>
    <main class="container py-2 mt-2" style="background-color: #fff;">
        <section id="contact-us">



            @include('includes.flash-message')
            <!-- Contact Form -->
            <div class="contact-form">
                <form action="{{ route('blog.update', $post) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <!-- Title -->
                    <div class="form-group mt-4">
                    <label for="title"><span>Title</span></label>
                    <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{ $post->title }}" />
                    @error('title')
                        {{-- The $attributeValue field is/must be $validationRule --}}
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror
                    </div>
                            <!-- Drop down -->
                    <div class="form-group mt-4">
                        <label for="categories"><span>Choisir un categorie:</span></label>
                        <select name="category_id" id="categories">
                            {{-- <option class="@error('category_id') is-invalid @enderror" selected disabled>Selectionner une categorie </option> --}}
                            <option value="{{ $select->id}}" selected>{{ $select->name }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            {{-- The $attributeValue field is/must be $validationRule --}}
                            <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                        @enderror
                       </div>

                    <!-- Image -->
                    <div class="form-group mt-4 col-xs-12">
                        <label for="image" ><span>Image</span></label>
                        <input class="form-control btn btn-outline-success file-upload-info file-upload-browse @error('imagePath') is-invalid @enderror"
                         type="file" id="image" name="imagePath)"/>
                         <img src="{{ asset('storage/postsImages/'.$post->imagePath) }}" alt="">
                        @error('imagePath')
                        {{-- The $attributeValue field is/must be $validationRule --}}
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                        @enderror
                        </div>

                    <!-- Body-->
                    <div class="form-group mt-4">
                    <label for="body"><span>Body</span></label>
                    <textarea class="@error('body') is-invalid @enderror"id="body" name="body">{{ $post->body }}</textarea>
                    @error('body')
                        {{-- The $attributeValue field is/must be $validationRule --}}
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror
                    </div>

                    <!-- Button -->
                    <div class="form-group mt-4">
                    <div class="d-flex justify-content-around w-25 mx-auto">
                        <a class="btn btn-outline-danger px-4" href="{{route('blog.index')}}" >Annuler</a>
                        <button class="btn btn-outline-warning px-4" type="submit" >Soumettre</button>
                    </div>
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


