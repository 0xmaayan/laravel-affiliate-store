<div class="container">
    <div class="col-md-12">

        <a href="#menu" class="menu-trigger"><i class="fa fa-bars"></i> Menu</a>

        <nav id="navigation">
            <ul class="menu" id="responsive">

                <li><a href="{{ route('home') }}" id="current"><i style="bottom: 5px;position: relative;" class="fa fa-home fa-2x" aria-hidden="true"></i></a></li>
                <li><a href="{{route('products')}}">Products</a></li>
                <li class="dropdown">
                    <a href="{{route('categories')}}">Categories</a>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{route('category',$category->slug)}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>

                </li>
                {{--<li class="dropdown">
                    <a href="{{route('brands')}}">Brands</a>
                    <ul>
                        @foreach($brands as $brand)
                            <li><a href="{{route('brand',$brand->slug)}}">{{$brand->name}}</a></li>
                        @endforeach
                    </ul>
                </li>--}}
                <li><a href="{{route('about')}}">About US</a></li>

            </ul>
        </nav>
    </div>
</div>