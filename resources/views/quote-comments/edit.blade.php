@extends('layouts.app')

@section('content')
<div class="container">

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
    <h1>Halaman Komentar <u>{{$comment->quote->title}}</u></h1>
  <form class="" action="/quotes-comment/{{$comment->id}}" method="post">
      {{csrf_field()}}
      @method('PUT')

      <div class="form-group">
        <label for="subject">Isi komentar</label>
        <textarea name="subject" rows="8" cols="80" class="form-control">{{old('subject', @$comment->subject)}}</textarea>
      </div>
      
      <button type="submit" class="btn btn-primary btn-block">
          Submit komentar
      </button>

  </form>

</div>
@endsection
