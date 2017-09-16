@extends('backend.layouts.main')


@push('title')
Create New Page
@endpush

@push('bread')
<li>
    <a href="{{ route('home') }}">
        Management
    </a>
</li>
@endpush


@push('bread')
<li>
    <a href="{{ route('pages.index') }}">
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
@push('bread')
<li>
    {{$page->title}}
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
<div class="row align-center hide-for-medium">
    <div class="column shrink">            <ol class="progress-indicator ">
                <li class="is-current" data-step="">
                    <span>
                        Navigation
                    </span>
                </li></ol></div><!-- END OF .column shrink -->
</div><!-- END OF .row align-center hide-for-medium -->       
    <div class="row align-center show-for-medium">
        <div class="column shrink">
            <ol class="progress-indicator ">
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
                        Layout
                    </span>
                </li>
                <li class="" data-step="">
                    <span>
                        Content
                    </span>
                </li>                  
                <li class="" data-step="">
                    <span>
                        Settings
                    </span>
                </li>
                <li class="extra" data-step="">
                    <span>
                        <strong>Publish</strong>
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
    <form action="{{ route('navigation') }}" id="navi" method="POST">

        {{csrf_field()}}
        <input type="hidden" name="nonav" v-model="nonav" />
        <input name="page" type="hidden" value="{{$page->id}}"/>
        <input :value="order" id="order" name="pages" type="hidden"/>
        <br/>
<div class="row">
    <div class="column small-12 medium-7 medium-offset-1 large-6 large-offset-0">
        <div :class="{checkbox:true,primary:true}">
            <input id="c0" name="c0" type="checkbox" v-model="nonav" value="true">
                <label for="c0">
                    @lang("This page is hidden in the navigation")
                </label>
                <br/>
            </input>
        </div>
    </div>
</div>        
        <transition name="fade">
            <div class="row align-center" v-if="!nonav">
                <div class="column shrink ">
                    <div class="card">
                        <div class="card-divider menucard">
                            <h5>
                                Setting up the Navigation
                            </h5>
                        </div>
                        <!-- END OF .card-divider -->
                        <div class="card-section">
                            @include("backend.navigation.partials.sortable")
                        </div>
                        <!-- END OF .card-section -->
                    </div>
                    <!-- END OF .ca -->
                </div>
                <!-- END OF .column shrink small-offset-1 medium-offset-2 large-offset-3 -->
                
                <!-- END OF .column shrink small-offset-1 medium-offset-2 large-offset-3 -->
                <div class="column shrink align-self-bottom ">
                    <button class="button large expanded fabu fa-arrow-right" type="submit" v-bind:class="classObject">
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
@endpush

@push('extrajs')
<script>
let app = new Vue(
{
    el: '#app',
    data:
    {
        done: false,
        nonav:false,
        order: ''
    },
    computed:
    {
        classObject: function()
        {
            return {
                'success': this.done,
                'secondary': !this.done,
            }
        },
        classObject2: function()
        {
            return {
                'menucard-light': !this.done
            }
        }
    }
});
</script>
@endpush
@push('extracss')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css">
{{-- TODO: @online ADD LOCAL css for local env --}}

@endpush

@push('extracss')
<style>ul
    {
            list-style-type: none;
    }</style>

@endpush


@push('extrajs')
{{-- TODO: @online ADD LOCAL css for local env --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/nestedSortable/2.0.0/jquery.mjs.nestedSortable.min.js">
</script>
<script>

$(function()
{
    $("ul.sortable").nestedSortable(
    {
        forcePlaceholderSize: true,
        items: 'li',
        handle: 'a',
        placeholder: 'menu-highlight',
        listType: 'ul',
        maxLevels: 4,
        opacity: .6,
        helper: 'clone',
        update: function(event, ui)
        {
            app.order = $("ul.sortable").sortable('serialize',
            {
                key: 'page',
                attribute: 'id'
            });
            // ar txt2 = txt1.slice(0, 3) + "bar" + txt1.slice(3);
            if (!app.done) app.done = true;
        }
    });
    app.order = $("ul.sortable").sortable('serialize',
    {
        key: 'page',
        attribute: 'id'
    })

});
</script>
@endpush

 @push('extrajs')
<script>$(function()
    {
        tut("Step 2: Navigation","Drag and Drop your page to the position you want to have it!","white","navicon");
    tut("Tipp:","Move your page to the right to make it a submenu","none","white","long-arrow-right");
});
       </script>
@endpush
