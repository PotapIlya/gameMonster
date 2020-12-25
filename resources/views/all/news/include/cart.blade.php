
{{--@dd($new)--}}
<a href="{{ route('news.show', $new->url) }}" class="newsShow__other-item col-6 col-sm-4 d-flex flex-column justify-content-center">


    @if( !is_null($new->img) && $new->img )
        <div>
            <img class="newsShow__other-item-img w-100" src="/storage/{{ $new->img }}" alt="">
        </div>
    @else
        <div>
            <img class="newsShow__other-item-img w-100" src="/assets/static/img/main/no-image.png" alt="">
        </div>
    @endif

    <div>
        <h5 class="newsShow__other-item-title">
            {{ json_decode($new->title, true)[session('locale')] ?? '' }}
        </h5>
    </div>
        @if(!is_null($item->category) && count($item->category) && $item->category)

            @foreach($item->category as $category)
                <span class="newsShow__other-item-tags">
                    {{  json_decode($category->name, true)[session('locale')] ?? '' }}
                </span>
            @endforeach

        @endif
</a>