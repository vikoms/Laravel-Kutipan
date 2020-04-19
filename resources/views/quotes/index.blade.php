@extends('layouts.app')

@section('content')
<div class="container">

    @if(session('msg'))

    <div class="alert alert-success">
        <p>{{session('msg')}}</p>
    </div>

    @endif
    Filter tag:
    @foreach($tags as $tag)
    <a href="/quotes/filter/{{$tag->name}}">/ {{$tag->name}}</a>
    @endforeach
    <div class="row">
        <div class="col-md-4">
            <form class="form-inline" action="/quotes" method="get">
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" id="inputPassword2" placeholder="Search..." name="search">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </form>
        </div>

        <div class="col-md-5 ">
            <a href="/quotes/create" class="btn btn-primary ">Tambah kutipan</a>
            <a href="/quotes/random" class="btn btn-primary">Random</a>
            <a href="/quotes" class="btn btn-primary">All</a>

        </div>

    </div>
    <div class="row">
        @foreach($quotes as $quote)
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header">
                    {{$quote->title}}
                </div>
                <div class="card-body">
                    <p> Tag :
                        @foreach($quote->tags as $tag)
                        {{$tag->name}},
                        @endforeach
                    </p>
                    <a href="quotes/{{$quote->slug}}" class="btn btn-primary">Lihat Kutipan</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
