@extends('backend.layouts.main')


@push('title')
Create New Page
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
    <a href="{{ url('/cmseven/pages') }}">
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
    {{$page->title}}
</li>
@endpush

@push('bread')
<li>
    Publish
</li>
@endpush

@push('content')
<div class="row">
    <div class="column">
        <p>
            <h3>
                Creating A New Page -
                <strong>
                    Step 6:
                </strong>
            </h3>
        </p>
    </div>
    <br />
    <!-- END OF .column -->
</div>
<div class="row align-center hide-for-medium">
    <div class="column shrink">
        <ol class="progress-indicator ">
            <li class="is-current" data-step="">
                <span>
                    Publishing the Page
                </span>
            </li>
        </ol>
    </div>
    <!-- END OF .column shrink -->
</div>
<!-- END OF .row align-center hide-for-medium -->
<div class="row align-center show-for-medium" style="height:84px;overflow:hidden;max-width:100%;">
    <div class="column shrink">
        <ol class="progress-indicator">
            <li class="is-complete" data-step="">
                <span>
                    Title & Url
                </span>
            </li>
            <li class="is-complete" data-step="">
                <span>
                    Navigation
                </span>
            </li>
            <li class="is-complete" data-step="">
                <span>
                    Layout
                </span>
            </li>
            <li class="is-complete" data-step="">
                <span>
                    Content
                </span>
            </li>
            <li class="is-complete" data-step="">
                <span>
                    Settings
                </span>
            </li>
            <li class="is-current" data-step="">
                <span>
                    <strong>
                        Publish
                    </strong>
                </span>
            </li>
        </ol>
    </div>
    <!-- END OF .column shrink -->
</div>
<!-- END OF .row align-center -->
<!-- END OF .row -->
<br /><br />
<div class="row align-center align-middle">
    <div class="column">
        <div class="callout">
            <h3>@lang('Your Page:')</h3>  {{-- CRISI: @lang ins de.json --}}
            <div class="row align-spaced">
                <div class="column shrink">
@lang("Page")-ID: <br />
@lang("Title"): <br />
@lang("Title"): <br />
URL: <br />
@lang("Extra Information"): <br />
                </div><!-- END OF .column shrink -->
                <div class="column">
                                                Page#{{$page->id }} <br />

                        {{$page->title }} <br />
                        {{$page->menutitle }} <br />
                        

                        @if($page->module == "placeholder")
                            <div class="label logoblue"><span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Uses Modul: {{$page->module}}">{{$page->module}}</span></div>
                        @else<code><small>
                         {{url($page->slug) }}</small></code>
                        @endif  
                       
                         <br />
                        @if($page->published)
                            <div class="label success">published</div><!-- END OF .label --> 
                        @else
                            <div class="label warning">not published</div><!-- END OF .label -->
                        @endif
                        @if($page->module)
                            <div class="label logoblue"><span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Uses Modul: {{$page->module}}">{{$page->module}}</span></div>
                        @endif                        
                        @if($page->url)
                            <div class="label logoblue"><span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Redirects to: {{$page->url}}">redirect</span></div>
                        @endif
                </div><!-- END OF .column -->
            </div><!-- END OF .row align-spaced --> <br />
            <div class="button-group warning">
                <a href="{{ route("pages.edit.step1",$page->id) }}" class="button">Change General Settings</a>
                <a href="{{ route("pages.edit.step4",$page->id) }}" class="button">Edit Content</a>
                <a href="{{ route("pages.edit.step5",$page->id) }}" class="button">Setup per-page Settings</a>
            </div><!-- END OF .button-group -->
        {{--     {{dump($page->GetPageBbs())}}
            {{dump(collect($page->GetSimpleBbs())->merge($page->GetPageBbs()))}} --}}
            <small><a href="#">I Want to change my page's layout.</a></small><br />  {{-- CRISI: @lang --}}
            <small><a href="#">I Want to change rearrange the site navigation.</a></small> {{-- CRISI: @lang --}}

            {{-- REMEMBER: link explainer blog post to no layout edit and no nav edit --}}
        </div><!-- END OF .callout -->
    </div><!-- END OF .column -->
</div><!-- END OF .row align-center align-middle -->
<div class="row align-center align-bottom">
@if($page->module != "placeholder" && !$page->url)
    <div class="column shrink"><a target="_blank" href="{{ url('cmseven/pages/'. $page->id .'/preview') }}" class="button primary fabu before fa-eye">Preview</a></div><!-- END OF .column shrink -->
@endif
    <div class="column shrink "><a href="{{ url('cmseven/pages/' . $page->id.'/publish') }}" class="button large success fabu before fa-thumbs-o-up">Publish this Page</a></div><!-- END OF .column shrink -->
</div><!-- END OF .row -->

@endpush

@push('extrajs')
<script>
$(function()
{

tut("Step 6: Publishing","Time to decide! Is your page ready to publish?","white","gavel");

});

</script>
@endpush
