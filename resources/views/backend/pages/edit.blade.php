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
    <form action="{{ route('pages.post.edit.step1',$page) }}" method="POST">
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
                        @lang("This will be shown in the title of the page.")
                    </small
                </label>
            </div>
            <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
        </div>
        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                <label for="menu">
                    @lang("Menutitle:")
                    <input  id="menu" name="menu" placeholder="My Page" type="text" v-model="menu" @focus="automenu()" @blur="automenu()" />
                    @if ($errors->has('menu'))
                    <small class="errortext">
                        {{ $errors->first('menu') }}
                    </small>
                    @endif
                    <small class="help-text">
                        @lang("This will be shown in the navigation. Keep it short!")
                    </small
                </label>
            </div>
            <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
        </div>        
        <div class="row" v-show="!isplaceholder">
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
        <div :class="{checkbox:true,primary:true}">
            <input id="c0" name="isplaceholder" type="checkbox" v-model="isplaceholder" value="true">
                <label for="c0">
                    @lang("This page will be a placeholder for the navigation")
                </label>
                <br/>
            </input>
        </div>
    </div>
</div>  
        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                {{--
                <input class="button" type="submit" value="Add User"/>
                --}}
                <br/>
                <div class="row align-center">
                    <div class="column shrink">
                        <button :disabled=" this.title.length < 2 || this.menu.length < 2 || ( !this.placeholder && this.slug.length < 1)" class="button large expanded fabu fa-arrow-right" v-show="!isplaceholder" type="submit" v-bind:class="classObject">
                            @lang("Save & Next Step")
                        </button>
                        <button :disabled=" this.title.length < 2 || this.menu.length < 2" class="button large expanded fabu fa-arrow-right" type="submit" v-bind:class="classObject" v-show="isplaceholder">
                            @lang("Create Menu Placeholder")
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
            title:'{{ (old('title'))?old('title'):  $page->title }}',
            slug:'{{ (old('slug'))?old('slug'):   $page->slug }}',
            menu:'{{ (old('menutitle'))?old('menutitle'):   $page->menutitle }}',
            slugged : true,
            isplaceholder: 
            @if(!old('isplaceholder'))

@if($page->module == "placeholder")
true
@else
false
@endif
@else
true
@endif
        },
        methods:{
            automenu()
            {
                            if(!this.menu)
            {
                this.menu = this.title;
            }
        },
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
      'success': this.title.length >= 2 && this.menu.length >= 2 &&( this.slug.length >= 2 || this.isplaceholder),
      'secondary': !(this.title.length >= 2 && this.menu.length >= 2 &&( this.slug.length >= 2 || this.isplaceholder)),
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
