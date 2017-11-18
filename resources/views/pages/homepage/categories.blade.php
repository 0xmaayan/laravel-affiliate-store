
<div class="container" >

    <div class="row">
        <div class="col-md-12">
            @foreach($categories as $category)
                <div class="col-md-4">
                    <a href="#" class="img-caption" >
                        <figure>
                            <img src="{{asset('images/categories/'.$category->image)}}" alt="" />
                            <figcaption>
                                <h3>{{$category->name}}</h3>
                                {{--<span>25% Off Summer Styles</span>--}}
                            </figcaption>
                        </figure>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</div>
<div class="clearfix"></div>
