<ul class="sortable vertical">
    @foreach($pages as $item)
    <li>
        <a href="#{{ $item->title }}">
            {{ $item->title }}
        </a>
        <ul class="sortable vertical">
        @if ($item->children()->count() != 0)
            @foreach($item['children'] as $child)
            <li>
                <a href="#{{ $child->title }}">
                    {{ $child->title }}
                </a>
                <ul class="sortable vertical">
                @if ($child->children()->count() != 0)
                    @foreach($child['children'] as $grandchild)
                    <li>
                        <a href="#{{ $grandchild->title }}">
                            {{ $grandchild->title }}
                        </a>
                        <ul class="sortable vertical">
                        @if ($grandchild->children()->count() != 0)
                            @foreach($grandchild['children'] as $riesigchild)
                            <li>
                                <a href="#{{ $riesigchild->title }}">
                                    {{ $riesigchild->title }}
                                </a>
                                <ul class="sortable vertical">
                                @if ($riesigchild->children()->count() != 0)
                                    @foreach($riesigchild['children'] as $hugechild)
                                    <li>
                                        <a href="#{{ $hugechild->title }}">
                                            {{ $hugechild->title }}
                                        </a>
                                    </li>
                                    @endforeach
                                @endif
                                </ul>
                       </li>
                            @endforeach
                        @endif
                        </ul>
               </li>
                    @endforeach
                @endif
                </ul>
            </           @endforeach
        @endif
        </ul>
    </li>
    @endforeach
</ul>
