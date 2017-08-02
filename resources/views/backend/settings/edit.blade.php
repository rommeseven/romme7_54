@extends('backend.layouts.main')

@push('title')
Settings
@endpush

@push('bread')
<li>
    <a href="{{ url('/cmseven') }}">
        Management
    </a>
</li>
@endpush


@push('bread')
<li>
    <a href="{{ url('/cmseven/settings') }}">
        Settings
    </a>
</li>
@endpush

@push('bread')
<li>
    Editing
</li>
@endpush


@push('content')
<div id="app">
    <div class="row">
        <div class="column">
            <p>
                <h3>
                    Settings
                </h3>
            </p>
        </div>
        <!-- END OF .column -->
    </div>
    <div class="row align-spaced">
        <div class="column small-12 medium-8 large-7">
            <div class="callout">
                <div class="row align-left align-middle">
                    <div class="column small-12 medium-2 large-1" style="text-align:center">
                        <i class="fa icon fa-info-circle fa-3x">
                        </i>
                    </div>
                    <!-- END OF .column small-12 medium-4 large-3 -->
                    <div class="column small-12 medium-10" style="text-align:center; padding-top: 15px;">
                        <p>
                            Leave the fields you don't want to change blank
                        </p>
                    </div>
                    <!-- END OF .column small-12 medium-8 large-9 -->
                </div>
                <!-- END OF .row -->
            </div>
            <!-- END OF .callout -->
        </div>
        <!-- END OF .column shrink -->
    </div>
    <!-- END OF .row -->
    <!-- END OF .row -->
    <form action="{{ url('cmseven/settings/') }}" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                <label for="app_title">
                    Website Title
                    <input name="app_title" placeholder="{{settings('app_title')}}" type="text" v-model="app_title"/>
                    @if ($errors->has('app_title'))
                    <small class="errortext">
                        {{ $errors->first('app_title') }}
                    </small>
                    @endif
                    <small class="help-text">
                        Show in the browser tab and <strong>search engines</strong>
                    </small>
                </label>
            </div>
            <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
        </div>        
        @for ($i = 0; $i < sizeof($bbs); $i++)
                <div class="row">
                    <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                        <label for="{{$bbs[$i]['key']}}">
                            {{$bbs[$i]['name']}}:
                            <input name="{{$bbs[$i]['key']}}" placeholder="{{settings($bbs[$i]['key'],$bbs[$i]['default'] )}}" type="text" v-model="{{$bbs[$i]['key']}}"/>
                            @if ($errors->has($bbs[$i]['key']))
                            <small class="errortext">
                                {{ $errors->first($bbs[$i]['key']) }}
                            </small>
                            @endif
                            <small class="help-text">
                                {{$bbs[$i]['description']}}
                            </small>
                        </label>
                    </div>
                    <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
                </div>
        @endfor

        <!-- END OF #app -->
        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                {{--
                <input class="button" type="submit" value="Add User"/>
                --}}
                <div class="row align-center" v-if="!changed()">
                    <div class="column small-9 medium-7 large-5 small-offset-3 medium-offset-0 large-offset-7">
                        <button class="button expanded fabu before fa-save" type="submit">
                            Save Changes
                        </button>
                    </div>
                    <!-- END OF .column small-10 medium-5 -->
                </div>
                <div class="row align-center" v-if="changed()">
                    <div class="column small-9 medium-7 large-5 small-offset-3 medium-offset-0 large-offset-7">
                        <button class="button expanded secondary fabu before fa-save" disabled="" type="submit">
                            No Changes
                        </button>
                    </div>
                    <!-- END OF .column small-10 medium-5 -->
                </div>
                <!-- END OF .row align-center -->
            </div>
            <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
        </div>
    </form>
    <!-- END OF .row -->
    <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    <!-- END OF .row -->
</div>
<!-- END OF #app -->
@endpush

@push('extrajs')
<script>
    var app = new Vue({
        el:'#app',
        data:{
            
@for ($i = 0; $i < sizeof($bbs); $i++)
      {{$bbs[$i]['key']}}:'',
@endfor

            app_title:''
        },
        methods:{
            changed()
            {
                return (
                 this.app_title == ''
@for ($i = 0; $i < sizeof($bbs); $i++)
      && this.{{$bbs[$i]['key']}} == ''
@endfor
                 );
            }
        }

    });
</script>
@endpush
