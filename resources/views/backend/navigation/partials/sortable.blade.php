<ul class="sortable menu vertical" id="sortable">
    @include("backend.navigation.partials.newpage")
    @foreach($pages as $item)
    <li id="page_{{$item->id}}" value="{{$item->id}}">
        <a href="#{{ $item->title }}" id="anchor#{{$item->id}}">
            {{ $item->title }}
        </a>
        @if ($item->children()->count() != 0)
        <ul class="menu nested vertical">
            @foreach($item['children'] as $child)
            <li id="page_{{$child->id}}" value="{{$child->id}}">
                <a href="#{{ $child->title }}" id="anchor#{{$child->id}}">
                    {{ $child->title }}
                </a>
                @if ($child->children()->count() != 0)
                <ul class="menu nested vertical">
                    @foreach($child['children'] as $grandchild)
                    <li id="page_{{$grandchild->id}}" value="{{$grandchild->id}}">
                        <a href="#{{ $grandchild->title }}" id="anchor#{{$grandchild->id}}">
                            {{ $grandchild->title }}
                        </a>
                        @if ($grandchild->children()->count() != 0)
                        <ul class="menu nested vertical">
                            @foreach($grandchild['children'] as $riesigchild)
                            <li id="page_{{$riesigchild->id}}" value="{{$riesigchild->id}}">
                                <a href="#{{ $riesigchild->title }}" id="anchor#{{$riesigchild->id}}">
                                    {{ $riesigchild->title }}
                                </a>
                                @if ($riesigchild->children()->count() != 0)
                                <ul class="menu nested vertical">
                                    @foreach($riesigchild['children'] as $hugechild)
                                    <li id="page_{{$hugechild->id}}" value="{{$hugechild->id}}">
                                        <a href="#{{ $hugechild->title }}" id="anchor#{{$hugechild->id}}">
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
