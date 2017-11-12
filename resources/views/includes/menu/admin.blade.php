@foreach($items as $item)
    <li class="@foreach($item->attributes as $attr) {{ $attr }}@endforeach">
        @if ($item->url())
            <a href="{{ $item->url() }}">
                {!! $item->title !!}
                @if($item->hasChildren()) <span class="fa fa-chevron-down"></span> @endif
            </a>
            @if($item->hasChildren())
                <ul class="nav child_menu">
                    @foreach($item->children() as $child)
                        <li class="{{ $child->attributes() != "" ? 'active' : '' }}"><a href="{{ $child->url() }}">{!! $child->title !!}</a></li>
                    @endforeach
                </ul>
            @endif
        @endif
    </li>
@endforeach