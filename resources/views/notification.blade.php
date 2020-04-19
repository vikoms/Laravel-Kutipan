@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1 class="text-center">Halaman Notifikasi</h1>

            <ul class="list-group">
                @foreach($notifications as $notif)
                <li class="list-group-item"><a
                        href="{{url('quotes/'.$notif->quote->slug)}}">{{$notif->subject .' di : '. $notif->quote->title}}</a>
                </li>
                @endforeach
            </ul>

            <?php  

                $notif_model::where('user_id',$user->id)->where('seen',0)->update(['seen'=>'1']);

            ?>

        </div>
    </div>
</div>
@endsection
