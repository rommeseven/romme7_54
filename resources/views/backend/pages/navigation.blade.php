@extends('backend.layouts.main')


@push('title')
Create New Page
@endpush

@push('bread')
<li>
    <a href="{{ url('/manage') }}">
        Management
    </a>
</li>
@endpush


@push('bread')
<li>
    <a href="{{ url('/manage/pages') }}">
        Pages
    </a>
</li>
@endpush

@push('bread')
<li class="disabled">
    Page Editor
</li>
@endpush

@push('bread')
<li>
    Navigation
</li>
@endpush

@push('content')
<div id="app">
    <div class="row">
        <div class="column">
            <p>
                <h3>
                    Creating A New Page -
                    <strong>
                        Step 2:
                    </strong>
                </h3>
            </p>
        </div>
        <!-- END OF .column -->
    </div>
    <div class="row align-center">
        <div class="column shrink">
            <ol class="progress-indicator">
                <li class="is-complete" data-step="">
                    <span>
                        Title & Url
                    </span>
                </li>
                <li class="is-current" data-step="">
                    <span>
                        Navigation
                    </span>
                </li>
                <li class="" data-step="">
                    <span>
                        Contents
                    </span>
                </li>
                <li class="" data-step="">
                    <span>
                        Settings
                    </span>
                </li>
                <li class="" data-step="">
                    <span>
                        Publish
                    </span>
                </li>
            </ol>
        </div>
        <!-- END OF .column shrink -->
    </div>
    <br/>
    <br/>
    <!-- END OF .row align-center -->
    <!-- END OF .row -->
    <form action="{{ url('manage/pages') }}" method="POST">
        {{csrf_field()}}
        <ul class="menu vertical" >
            @foreach($pages as $item)
            <li>
                {{ $item->title }}
        
        @if ($item->children()->count() != 0)
                <ul class="menu">
                    @foreach($item['children'] as $child)
                    <li>
                        {{ $child->title }}               
                @if ($child->children()->count() != 0)
                        <ul class="menu">
                            @foreach($child['children'] as $grandchild)
                            <li>
                                {{ $grandchild->title }}
                        @if ($grandchild->children()->count() != 0)
                                <ul class="menu">
                                    @foreach($grandchild['children'] as $riesigchild)
                                    <li>
                                        {{ $riesigchild->title }}
                                @if ($riesigchild->children()->count() != 0)
                                        <ul class="menu">
                                            @foreach($riesigchild['children'] as $hugechild)
                                            <li>
                                                {{ $hugechild->title }}
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

        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                {{--
                <input class="button" type="submit" value="Add User"/>
                --}}
                <br/>
                <div class="row align-center">
                    <div class="column shrink">
                        <button :disabled=" this.title.length < 2" class="button large expanded fabu fa-arrow-right" type="submit" v-bind:class="classObject">
                            Save & Next Step
                        </button>
                    </div>
                    <!-- END OF .column small-10 medium-5 -->
                </div>
                <!-- END OF .row align-center -->
            </div>
            <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
        </div>
        <!-- END OF .row -->
    </form>
</div>
<!-- END OF #app -->
{{--
<ul class="menu" id="items">
    <li>
        item 1
    </li>
    <li>
        item 2
    </li>
    <li>
        item 3
    </li>
</ul>
--}}
@endpush

@push('extracss')
<style>
    .topcontent
{
padding-top:24px;
}
</style>
@push('extrajs')
<script src="{{asset('other/vendor/Sortable.min.js')}}">
</script>
<script>


var el = document.getElementById('items');
var sortable = Sortable.create(el);

    let app = new Vue({
        el:'#app',
        data:{
            title:''
        },
        computed: {
  classObject: function () {
    return {
      'success': this.title.length >= 2,
      'secondary': this.title.length < 2,
    }
  }
}
    });
</script>
@endpush
