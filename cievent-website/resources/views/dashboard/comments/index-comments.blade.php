@extends('layouts.partials.navbar')

@section('content')
<div class="sm:grid grid-cols-2 gap-20  ml-4 py-2 border-b border-gray-200">
    <div class="py-2 ">
        <h1 class="text-3xl">
            Liste des Categories
        </h1>
    </div>
<div>
    @if(Auth::check())
        <div class="py-2 w-4/5 m-auto">
            <a
            href={{ route('categories.create') }}
            class="uppercase float-right btn btn-outline-warning px-md-4 border-warning text-green-500 text-lg font-extrabold py-2 rounded-4xl">
                Ajouter
            </a>
        </div>
    @endif
</div>
</div>
<div id="tab" class="container w-5/5 py-2 mt-4 bg-white rounded-2xl">
        @include('includes.flash-message')

        <p
    style="color: #fff; width:100%;font-size:18px;font-weight:600;text-align:center;background:#5cb85c;padding:17px 0;margin-bottom:6px;">
    Categories</p>

            @if ($message = Session::get('success'))
            <section class="alert alert-success">
                <p>{{ $message }}</p>

            </section>
        @endif

        <style>
            #tab{
                box-shadow: 2px 2px 2px 2px #fc810c;
            }
        </style>
                <table class="table table-bordered mb-10">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nom</th>
                      <th>Email</th>
                      <th>Commentaire</th>
                      <th>Actions 1</th>
                      <th>Actions 2</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->comment }}</td>

                        <td class="float-center text-center">
                                <a class="btn btn-outline-warning ml-4" href="{{ route('comment.edit', $comment) }}">Modifier</a>
                            </td>
                            <td class="float-center text-center">
                          <form action="{{route('comment.destroy', $comment)}}" method="post">
                            @method('delete')
                            @csrf
                            <div class="float-center">
                                <input class="btn btn-outline-success ml-4" type="submit" value="Supprimer">
                            </div>
                        </form>
                        </td>
                      </tr>
                      @empty
                      <p>Désolé, il n'y a actuellement aucun article lié à cette recherche !</p>
                  @endforelse
                  </tbody>
                </table>
    </div><br>
    <!-- pagination -->

    {{ $comment->links() }}
@endsection
