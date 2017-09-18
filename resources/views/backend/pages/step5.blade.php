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
    Page Specific Settings
</li>
@endpush
@push('bread')
<li>
    {{$page->title}}
</li>
@endpush


@push('content')
<div class="row">
    <div class="column">
        <p>
            <h3>
                Creating A New Page -
                <strong>
                    Step 5:
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
                    Page Specific Settings
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
            <li class="is-current" data-step="">
                <span>
                    Settings
                </span>
            </li>
            <li class="" data-step="">
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
 <form action="{{ url('cmseven/pages/create/step/5/page/' . $page->id) }}" id="navi" method="POST">
        {{csrf_field()}}
        
    <ul class="tabs" data-tabs id="type-tabs">
@foreach(LABB::types() as $type)
  <li class="tabs-title"><a href="#panel-{{$type}}">{{LABB::getTypeName($type)}}</a></li>
@endforeach
</ul>

<div class="tabs-content" data-tabs-content="type-tabs">

@foreach(LABB::types() as $type)

  <div class="tabs-panel" id="panel-{{$type}}">
    @foreach(LABB::onlyType($type) as $bb)
        @component('backend.components.building_block_inputs.' . $type,['bb'=>$bb])
{{$page->GetSetting($bb['key'],$bb['default'])}}
@endcomponent
    @endforeach
  </div>
    

@endforeach

  </div>
<br />


<div class="row">
    <div class="column small-offset-1 medium-offset-2">
        <button type="submit" href="#" class="button primary fabu fa-arrow-right">
        Save & Next Step
        </button>    
    </div><!-- END OF .row column small-offset-1 medium-offset 2 -->
</div><!-- END OF .row -->
</form>

@endpush

@push('extrajs')
<script>
let app = new Vue(
{
    el: '#app2',
    data:
    {
        

        page:  {!! $page or '[]' !!}
        
    }        
 });
</script>
<script>
$(function()
{

tut("Tip","All of these settings are optional.","info","hand-o-up");
tut("Step 5: Settings","You may set page specific settings here.","white","cog");

});

</script>
@endpush
