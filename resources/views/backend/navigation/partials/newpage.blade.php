@if(isset($page))
    <li :class="classObject2" id="page_{{$page->id}}" value="{{$page->id}}">
        <a href="#" id="anchor#{{$page->id}}">
            {{$page->title}}
        </a>
    </li>
@endif