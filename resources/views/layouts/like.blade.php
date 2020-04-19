@if(Auth::check())
<div class="like_wrapper mb-3">
    <div class="btn  {{$content->is_liked() ? 'btn-danger btn-unlike' : 'btn-primary btn-like' }}"
        data-model-id="{{$content->id}}" data-type="{{$model_id}}">
        {{$content->is_liked() ? 'Unlike' : 'Like' }}
    </div>
    <div class="total_like">
        <span class="like_number">{{$content->likes->count()}}</span> : Total Like
        <span class="like_warning text-danger" style="display:none">Tidak boleh like milik sendiri</span>
    </div>
</div>
@endif
