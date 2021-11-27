<div class="text-left">
    <img src="{{$new->news_image ? asset($new->images_url($new->news_image, 'medium')) : asset('img/no-image.png') }}" class="card-img-top" alt="..." height="300px">
    <div >
        <h5 style="min-height: 50px;"><a href="{{route('news.show',$new->news_id)}}" class="color-marine">{{$new->news_title}}</a></h3>
        <p class="font-12"> {{$new->news_created_at}}</p>
        <a href="{{route('news.show',$new->news_id)}}" class="btn d-block text-center btn-info">{{__('lang.more')}}</a>
    </div>
</div>