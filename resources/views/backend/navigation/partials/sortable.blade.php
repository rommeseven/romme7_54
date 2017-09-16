<ul class="sortable menu vertical" id="sortable">
    @include("backend.navigation.partials.newpage")
    @foreach($pages as $item)
    <li id="page_{{$item->id}}" value="{{$item->id}}">
        <a href="#{{ $item->menutitle }}" id="anchor#{{$item->id}}">
            {{ $item->menutitle }}
        </a>
        @if ($item->children()->count() != 0)
        <ul class="menu nested vertical">
            @foreach($item['children'] as $child)
            <li id="page_{{$child->id}}" value="{{$child->id}}">
                <a href="#{{ $child->menutitle }}" id="anchor#{{$child->id}}">
                    {{ $child->menutitle }}
                </a>
                @if ($child->children()->count() != 0)
                <ul class="menu nested vertical">
                    @foreach($child['children'] as $grandchild)
                    <li id="page_{{$grandchild->id}}" value="{{$grandchild->id}}">
                        <a href="#{{ $grandchild->menutitle }}" id="anchor#{{$grandchild->id}}">
                            {{ $grandchild->menutitle }}
                        </a>
                        @if ($grandchild->children()->count() != 0)
                        <ul class="menu nested vertical">
                            @foreach($grandchild['children'] as $riesigchild)
                            <li id="page_{{$riesigchild->id}}" value="{{$riesigchild->id}}">
                                <a href="#{{ $riesigchild->menutitle }}" id="anchor#{{$riesigchild->id}}">
                                    {{ $riesigchild->menutitle }}
                                </a>
                                @if ($riesigchild->children()->count() != 0)
                                <ul class="menu nested vertical">
                                    @foreach($riesigchild['children'] as $hugechild)
                                    <li id="page_{{$hugechild->id}}" value="{{$hugechild->id}}">
                                        <a href="#{{ $hugechild->menutitle }}" id="anchor#{{$hugechild->id}}">
                                            {{ $hugechild->menutitle }}
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
