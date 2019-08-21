@foreach($items as $item)

    <li {{ (URL::current() == $item->url()) ? "class= menu__item  active" : "class = menu__item" }} >
        <a class="menu__link"  href="{{ $item->url() }}">
            <div class="menu__link-icon"><i class="fa fa-home"></i></div>
            <div class="menu__link-title">  {{ $item->title }} </div>
        </a>
        @if($item->hasChildren())
            <ul class="sub-menu">
                @include(env('THEME').'.admin.navigation_item', ['items' => $item->children()])
            </ul>
        @endif
    </li>


@endforeach