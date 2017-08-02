{{-- 

 --}}
<ul id="sortable" class="sortable menu vertical menu-ul">
    @foreach($pages as $item)
    <li class="menu-li" id="page_{{$item->id}}" value="{{$item->id}}">
        <a href="{{url($item->slug)}}" >
            {{ $item->title }}
        </a>
            @if ($item->children()->count() != 0)
        <ul class="menu nested vertical submenu-ul">
            @foreach($item['children'] as $child)
            <li class="menu-li" id="page_{{$child->id}}" value="{{$child->id}}">
                <a href="{{url($child->slug)}}" >
                    {{ $child->title }}
                </a>
                    @if ($child->children()->count() != 0)
                <ul class="menu nested vertical submenu-ul">
                    @foreach($child['children'] as $grandchild)
                    <li class="menu-li" id="page_{{$grandchild->id}}" value="{{$grandchild->id}}">
                        <a href="{{url($grandchild->slug)}}" >
                            {{ $grandchild->title }}
                        </a>
                            @if ($grandchild->children()->count() != 0)
                        <ul class="menu nested vertical submenu-ul">
                            @foreach($grandchild['children'] as $riesigchild)
                            <li class="menu-li" id="page_{{$riesigchild->id}}" value="{{$riesigchild->id}}">
                                <a href="{{url($riesigchild->slug)}}" >
                                    {{ $riesigchild->title }}
                                </a>
                                    @if ($riesigchild->children()->count() != 0)
                                <ul class="menu nested vertical submenu-ul">
                                    @foreach($riesigchild['children'] as $hugechild)
                                    <li class="menu-li" id="page_{{$hugechild->id}}" value="{{$hugechild->id}}">
                                        <a href="{{url($hugechild->slug)}}" >
                                            {{ $hugechild->title }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
        @endif
    </li>
    @endforeach
</ul>

{{-- 
REMEMBER: navigation classes for customization: menu-ul, submenu-ul, menu-li
 --}}
