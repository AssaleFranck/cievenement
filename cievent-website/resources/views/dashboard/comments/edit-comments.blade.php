@extends('layouts.partials.navbar')

@section('content')
<div class="container d-flex mt-5 bg-gray-100">

    <div class="media response-info">
        <form action="{{ route('comment.update', $com) }}" method="post">
            {{ @csrf_field() }}
            <input type="hidden" name="method" value="put">
        <div class="form-group media-left response-text-left">
            <input type="text" class="form-controle" name="name" value="{{ $com->name }}" required>
        </div>
        <div class="form-group media-left response-text-left">
            <input type="text" class="form-controle" name="email" value="{{ $com->email }}" required>
        </div>
        <div class="form-group media-left response-text-left">
            <input type="text" class="form-controle" name="comment" value="{{ $com->comment }}" required>
        </div>
        <div class="form-group media-left response-text-left">
            <button class="btn btn-outline-success" type="submit">Soumettre</button>
        </div>
        {{-- <div class="form-group media-body response-text-right ml-5">
        <p class="mb-3 ">{{$com->comment}}
            <ul class="d-flex">
                <li> <span class="font-bold italic text-success mr-2"> {{ date('jS M Y', strtotime($com->updated_at)) }}</span>,
                    <span class="mr-2">
                    {{ $com->created_at->diffForHumans() }}
                    </span></li>
                <li><a href="comment_box" onclick="document.getElementById('comment_id').value = {{ $com->id }}">Repondre</a></li>
            </ul>
        </div>
        <div class="clearfix"></div> --}}
    </form>
    </div>

@endsection
