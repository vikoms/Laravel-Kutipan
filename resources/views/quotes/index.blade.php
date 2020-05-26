@extends('layouts.app')

@section('content')
<div class="container">

    @if(session('msg'))

    <div class="alert alert-success">
        <p>{{session('msg')}}</p>
    </div>

    @endif
    {{-- <div class="row">
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

    </div> --}}

    <!-- Search Box -->
    <div class="row">
        <div class="col-md-6 col-8">
            <form action="/quotes" method="get">
                <div class="row">
                    <div class="col-md-10 col-10">
                        <input class="form-control" type="text" placeholder="Cari Quotes" name="search">
                    </div>
                    <div class="col-md-2 col-2">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 col-4">
            <a href="{{url('/quotes/create')}}" class="btn btn-success text-white btn-tambah">Tambah Kutipan</a>
        </div>
    </div>
    <!-- akhir Search Box -->
    <div class="row mt-4">
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    Kategori
                    <hr class="mt-3">
                    <ul class="list-group list-group-flush list-kategori">
                        @foreach($tags as $tag)
                        <li class="list-group-item"> <a href="/quotes/filter/{{$tag->name}}"> {{$tag->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col">
            @foreach($quotes as $quote)
            <a href="{{url('quotes/'. $quote->slug)}}" style="text-decoration: none;" class="body-kutipan">
                <div class="card rounded-0 border-0 card-kutipan mb-4">
                    <div class="card-body ">
                        <p>{{$quote->title}}</p>
                        <small class="text-muted">{{$quote->created_at}}</small><br>
                        <small class="text-muted">
                            Tag : @foreach($quote->tags as $tag)
                            {{$tag->name}},
                            @endforeach
                        </small>
                    </div>
                </div>
            </a>
            @endforeach
            {{ $quotes->links() }}
        </div>
    </div>
    @endsection
