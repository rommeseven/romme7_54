<ul class="sortable menu dropdown" data-dropdown-menu="">
    @foreach($pages as $item)
    <li>
        <a href="#{{ $item->title }}">
            {{ $item->title }}
        </a>
        @if ($item->children()->count() != 0)
        <ul class="sortable menu dropdown" data-dropdown-menu="">
            @foreach($item['children'] as $child)
            <li>
                <a href="#{{ $child->title }}">
                    {{ $child->title }}
                </a>
                @if ($child->children()->count() != 0)
                <ul class="sortable menu dropdown" data-dropdown-menu="">
                    @foreach($child['children'] as $grandchild)
                    <li>
                        <a href="#{{ $grandchild->title }}">
                            {{ $grandchild->title }}
                        </a>
                        @if ($grandchild->children()->count() != 0)
                        <ul class="sortable menu dropdown" data-dropdown-menu="">
                            @foreach($grandchild['children'] as $riesigchild)
                            <li>
                                <a href="#{{ $riesigchild->title }}">
                                    {{ $riesigchild->title }}
                                </a>
                                @if ($riesigchild->children()->count() != 0)
                                <ul class="sortable menu dropdown" data-dropdown-menu="">
                                    @foreach($riesigchild['children'] as $hugechild)
                                    <li>
                                        <a href="#{{ $hugechild->title }}">
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
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<ul class="menu vertical drilldown" data-drilldown data-back-button='<li class="js-drilldown-back"><a tabindex="0">Back</a></li>'>
    @foreach($pages as $item)
    <li>
        <a href="#{{ $item->title }}">
            {{ $item->title }}
        </a>
        @if ($item->children()->count() != 0)
        <ul class="menu vertical">
            @foreach($item['children'] as $child)
            <li>
                <a href="#{{ $child->title }}">
                    {{ $child->title }}
                </a>
                @if ($child->children()->count() != 0)
                <ul class="menu vertical">
                    @foreach($child['children'] as $grandchild)
                    <li>
                        <a href="#{{ $grandchild->title }}">
                            {{ $grandchild->title }}
                        </a>
                        @if ($grandchild->children()->count() != 0)
                        <ul class="menu vertical">
                            @foreach($grandchild['children'] as $riesigchild)
                            <li>
                                <a href="#{{ $riesigchild->title }}">
                                    {{ $riesigchild->title }}
                                </a>
                                @if ($riesigchild->children()->count() != 0)
                                <ul class="menu vertical">
                                    @foreach($riesigchild['children'] as $hugechild)
                                    <li>
                                        <a href="#{{ $hugechild->title }}">
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