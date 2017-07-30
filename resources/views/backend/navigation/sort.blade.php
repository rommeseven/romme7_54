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
                    Navigation
                </h3>
            </p>
        </div>
        <!-- END OF .column -->
    </div>
    {{-- TODO: callout info sort to proceed in nav editor --}}
    <form action="{{ url('manage/navigation') }}" id="navi" method="POST">
        {{csrf_field()}}
        {{method_field("put")}}
        <input :value="order" id="order" name="pages" type="hidden"/>
        <br/>
        <transition name="fade">
            <div class="row align-center">
                <div class="column shrink ">
                    <div class="card">
                        <div class="card-divider menucard">
                            <h5>
                                Edit Navigation
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
                <div class="column shrink align-self-bottom " v-if="done">
                    <button class="button success large expanded fabu fa-arrow-right" type="submit" v-="">
                        Save Changes
                    </button>
                </div>
                <div class="column shrink align-self-bottom" v-if="!done">
                    <button class="button large expanded secondary" disabled="" type="submit">
                        No Changes
                    </button>
                </div>
                <!-- END OF .column small-10 medium-5 -->
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

@push('extracss')
<style>
    ul
{
    list-style-type: none !important;
}

</style>
@push('extrajs')
<script>
    let app = new Vue({
        el:'#app',
        data:{
            done:false,
                 order :''
        },
        computed: {
  classObject: function () {
    return {
      'success': this.done,
      'secondary': !this.done,
    }
},

      classObject2: function () {
    return {
      'menucard-light': !this.done
    }
  }
}
    });
</script>
@endpush
@push('extracss')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
@endpush


@push('extrajs')
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
