@extends('layouts.app')

@section('content')

<div class="container">

    <div class="jumbotron">
        <h1 class="display-4">{{$quote->title}}</h1>
        <p class="lead">{{$quote->subject}}</p>
        <hr class="my-4">
        <h2>Di tulis oleh : <a href="/profile/{{$quote->user->id}}" class="text-dark"> {{$quote->user->name}}</a></h2>
        <a class="btn btn-primary btn-lg mb-3" href="/quotes" role="button">Kembali</a>

        @component('layouts/like', [
        'content' => $quote,
        'model_id' => 1
        ])
        @endcomponent

        <br>
        @if($quote->isOwner())
        <p><a href="/quotes/{{$quote->id}}/edit" class="btn btn-warning ">Edit</a></p>
        <form action="/quotes/{{$quote->id}}" method="post">
            {{csrf_field()}}
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        @endif
    </div>

    @if(session('msg'))
    <div class="alert alert-success">
        <p>{{session('msg')}}</p>
    </div>
    @endif

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="mb-3" action="/quotes-comment/{{$quote->id}}" method="post">
        {{csrf_field()}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-group">
                    <textarea name="subject" rows="1" cols="80" class="form-control"
                        placeholder="Isi Komentar...">{{old('subject')}}</textarea>
                </div>
            </div>
            <div class="col-md">
                <button type="submit" class="btn btn-primary btn-block">
                    Submit Komentar
                </button>
            </div>
        </div>
    </form>


    @foreach($quote->comments as $comment)
    <div class="row">
        <div class="col-md-4">
            <h5 class="">{{$comment->subject}}</h5>
            <p>
                Di tulis oleh : <a href="/profile/{{$comment->user->id}}" class="text-dark">
                    {{$comment->user->name}}</a>
            </p>
        </div>


        @if($comment->isOwner())
        <div class="col-md-4">
            <a href="/quotes-comment/{{$comment->id}}/edit"> <i class="fas fa-edit"></i> </a>
            <form action="/quotes-comment/{{$comment->id}}" method="post" class="d-inline">
                {{csrf_field()}}
                @method('DELETE')
                <button type="submit" style="border: none; background-color: transparent;"> <i
                        class="fas fa-trash-alt"></i></button>
            </form>
        </div>
        @endif
        @component('layouts/like', [
        'content' => $comment,
        'model_id' => 2
        ])
        @endcomponent
    </div>
    @endforeach






</div>

@endsection

@section('js')
<script src="{{asset('js/quote.js')}}"></script>
@endsection
