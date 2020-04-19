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

    @if(session('tag_error'))
    <div class="alert alert-danger">
        {{session('tag_error')}}
    </div>
    @endif

    <form class="" action="/quotes/{{$quote->id}}" method="post">
        {{csrf_field()}}
        @method('PUT')

        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" placeholder="Tulis judul disini" name="title"
                value="{{old('title' , @$quote->title)}}">
        </div>

        <div class="form-group">
            <label for="subject">Isi Kutipan</label>
            <textarea name="subject" rows="8" cols="80"
                class="form-control">{{old('subject', @$quote->subject)}}</textarea>
        </div>

        <div class="form-group col-md-2" id="tag_wrapper"><br>
            <label for="tag_select">Tag (Maximal 3)</label>
            <div id="add_tag">Add Tag</div>
            @foreach($quote->tags as $oldTags)
            <select name="tags[]" class="form-control mb-2" id="tag_select">
                <option value="0">Pilih Tag</option>
                @foreach($tags as $tag)
                <option value="{{$tag->id}}" {{ $tag->id == $oldTags->id ? "selected = 'selected'" : '' }}>
                    {{$tag->name}}
                </option>
                @endforeach
            </select>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary btn-block">
            Submit Kutipan
        </button>

    </form>

</div>
@endsection

@section('js')

<script src="{{asset('js/tag.js')}}"></script>

@endsection
