@extends('backend.layouts.main')

@push('title')
Create New Page
@endpush

@push('bread')
<li>
    <a href="{{ route('dashboard') }}">
        @lang("Management")
    </a>
</li>
@endpush


@push('bread')
<li>
    <a href="{{ route('pages.index') }}">
        @lang("Pages")
    </a>
</li>
@endpush

@push('bread')
<li>
    @lang("Creating")
</li>
@endpush

@push('content')
<div id="app">
    <div class="row">
        <div class="column">
            <p>
                <h3>
                    @lang("Creating A New Page")
                </h3>
            </p>
        </div>
        <!-- END OF .column -->
    </div>
<div class="row align-center hide-for-medium">
    <div class="column shrink">            <ol class="progress-indicator ">
                <li class="is-current" data-step="">
                    <span>
                        @lang("Title & Url")
                    </span>
                </li></ol></div><!-- END OF .column shrink -->
</div><!-- END OF .row align-center hide-for-medium -->    
    <div class="row align-center show-for-medium">
        <div class="column shrink">
            <ol class="progress-indicator ">
                <li class="is-current" data-step="">
                    <span>
                        @lang("Title & Url")
                    </span>
                </li>
                <li class="" data-step="">
                    <span>
                        @lang("Navigation")
                    </span>
                </li>
                <li class="" data-step="">
                    <span>
                        @lang("Layout")
                    </span>
                </li>
                <li class="extra" data-step="">
                    <span>
                        @lang("Content")
                    </span>
                </li>                
                <li class="extra" data-step="">
                    <span>
                        @lang("Settings")
                    </span>
                </li>
                <li class="extra" data-step="">
                    <span>
                        <strong>@lang("Publish")</strong>
                    </span>
                </li>
            </ol>
        </div>
        <!-- END OF .column shrink -->
    </div>
    <br /><br />
    <!-- END OF .row align-center -->
    <!-- END OF .row -->
    <form action="{{ route('pages.index') }}" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                <label for="title">
                    @lang("Title:")
                    <input  id="title" name="title" @keyup="autoslug($event.target.value)" placeholder="My Page" type="text" v-model="title"/>
                    @if ($errors->has('title'))
                    <small class="errortext">
                        {{ $errors->first('title') }}
                    </small>
                    @endif
                    <small class="help-text">
                        @lang("This will be shown in the navigation and the title.")
                    </small
                </label>
            </div>
            <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
        </div>
        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                        <br />
                <label for="slug">
                    @lang("Slug:")
                    <input  id="slug" @keydown.once="slugged=true" name="slug" placeholder="my-page" type="text" v-model="slug"/>
                    @if ($errors->has('slug'))
                    <small class="errortext">
                        {{ $errors->first('slug') }}
                    </small>
                    @endif
                    <small class="help-text">
                        @lang("This will be part of the url like this:") <br />
                        <code>{{ url('/') }}/@{{slug}}</code>
                    </small>
                </label>
            </div>
            <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
        </div>
        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                {{--
                <input class="button" type="submit" value="Add User"/>
                --}}
                <br/>
                <div class="row align-center">
                    <div class="column shrink">
                        <button :disabled=" this.title.length < 2 || this.slug.length < 1" class="button large expanded fabu fa-arrow-right" type="submit" v-bind:class="classObject">
                            @lang("Save & Next Step")
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
@endpush

@push('extrajs')
<script>
    let app = new Vue({
        el:'#app',
        data:{
            title:'',
            slug:'',
            slugged : false
        },
        methods:{
                    autoslug(str)
        {
            if (!this.slugged)
            {


  str = str.replace(/^\s+|\s+$/g, ''); // trim
  str = str.toLowerCase();

  // remove accents, swap ñ for n, etc
  var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
  var to   = "aaaaaeeeeeiiiiooooouuuunc------";
  for (var i=0, l=from.length ; i<l ; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }

  str = str.replace('ß', 'ss').replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes
     // collapse dashes


                this.slug = str;
            }

        }
        },
        computed: {
  classObject: function () {
    return {
      'success': this.title.length >= 2 && this.slug.length >= 2,
      'secondary': !(this.title.length >= 2 && this.slug.length >= 2),
    }
  }
}
    });
</script>
@endpush



@push('extrajs')
<script>$(function()
    {
        
        tut("Step 1: General Information","Give your Page a title and an url!","white","file-o");
    });</script>
@endpush
