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
<div class="row align-center align-bottom">
    <div class="column shrink"><a target="_blank" href="{{ url('manage/pages/'. $page->id .'/preview') }}" class="button primary fabu before fa-eye">Preview</a></div><!-- END OF .column shrink -->
    <div class="column shrink "><a href="{{ url('manage/pages/' . $page->id.'/publish') }}" class="button large success fabu before fa-thumbs-o-up">Publish this Page</a></div><!-- END OF .column shrink -->
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
