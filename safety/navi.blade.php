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
    <form action="{{ url('manage/navigation') }}" id="navi" method="POST">
        {{csrf_field()}}
        <input name="page" type="hidden" value="{{$page->id}}"/>
        <input :value="order" id="order" name="pages" type="hidden"/>
        <br/>
        <transition name="fade">
            <div class="row align-center">
                <div class="column shrink small-order-2 large-order-1">
                    <div class="card">
                        <div class="card-divider menucard">
                            <h5>
                                Navigation
                            </h5>
                        </div>
                        <!-- END OF .card-divider -->
                        <div class="card-section">
                            @include("navi")
                        </div>
                        <!-- END OF .card-section -->
                    </div>
                    <!-- END OF .ca -->
                </div>
                <!-- END OF .column shrink small-offset-1 medium-offset-2 large-offset-3 -->
                <div class="column shrink small-order-1 large-order-2" v-if="!done">
                    <div class="card">
                        <div class="card-divider menucard-light">
                            <h5>
                                Created Page
                            </h5>
                        </div>
                        <!-- END OF .card-divider -->
                        <div class="card-section">
                            <ul class="menu vertical tonavi">
                                <li id="newpage" value="{{$page->id}}">
                                    <a href="#" id="anchor#{{$page->id}}">
                                        {{$page->title}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END OF .card-section -->
                    </div>
                    <!-- END OF .ca -->
                </div>
                <!-- END OF .column shrink small-offset-1 medium-offset-2 large-offset-3 -->
                <div class="column shrink align-self-bottom small-order-3">
                    <button :disabled="!done" class="button large expanded fabu fa-arrow-right" type="submit" v-bind:class="classObject">
                        Save & Next Step
                    </button>
                </div>
            </div>
        </transition>
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
<a class="button large secondary" href="#" id="test">
    TEST
</a>
@endpush

@push('extracss')
<style>
    ul
{
    list-style-type: none !important;
}
    .topcontent
{
padding-top:24px;
}
</style>
@push('extrajs')
<script>
    let app = new Vue({
        el:'#app',
        data:{
            done:false,
            order:''
        },
        computed: {
  classObject: function () {
    return {
      'success': this.done,
      'secondary': !this.done,
    }
  }
}
    });
</script>
@endpush
@push('extracss')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css">
    @endpush


@push('extrajs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nestedSortable/2.0.0/jquery.mjs.nestedSortable.min.js">
    </script>
    <script>
        $( "ul.sortable" ).nestedSortable({

        forcePlaceholderSize: true,
        items: 'li',
        handle: 'a',
        placeholder: 'menu-highlight',
        listType: 'ul',
        maxLevels: 4,
        opacity: .6,
        connectWith: ".sortable",
        helper: 'clone',   
        update: function( event, ui ) {
/*            let parent = getParent($("#newpage"));
            let index = 1+parseInt($("ul.sortable li").index($("#newpage")));

            let insertion = "&page[" + $("#newpage").attr("value") + "]="+ parent;
*/
            let output =$("ul.sortable").sortable('serialize',{key:'page',attribute:'value'});
            /*if(index == 1)
            {
                output.insertAt(0,insertion);

            }*/
            app.order = $("ul.sortable").sortable('serialize',{key:'page',attribute:'value'});

          }



 });

 $( "ul.tonavi" ).nestedSortable({

        forcePlaceholderSize: true,
        items: 'li',
        handle: 'a',
        placeholder: 'menu-highlight',
        listType: 'ul',
        maxLevels: 4,
        opacity: .6,
        connectWith: ".sortable",
        helper: 'clone',
          remove: function( event, ui ) {
            app.done = true;
          }
 }); 
$("#test").click(function () {
    let index = 1+parseInt($("ul.sortable li").index($("#newpage")));
 alert(app.order);


});
function getParent (el) {
     let tel = $(el).parent().parent().attr("value");
            if(typeof tel == "undefined") tel = "null";
            return tel;
}
String.prototype.insertAt=function(index, string) { 
  return this.substr(0, index) + string + this.substr(index);
}
    </script>
    @endpush
{{-- 
TODO: created page->title!
 --}}
</link>