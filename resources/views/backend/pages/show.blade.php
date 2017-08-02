@extends('backend.layouts.main')

@push('title')
{{ $page->title }} Page Details 
@endpush

@push('bread')
<li><a href="{{ route('home') }}">Management</a></li>
@endpush


@push('bread')
<li><a href="{{ route('pages.index') }}">Pages</a></li>
@endpush

@push('bread')
<li>Details</li>
@endpush

@push('content')
<div class="row align-justify">
    <div class="small-12 medium-expand columns">
        <h3>
            <strong>
                {{ $page->title }}
            </strong>
            Page Details             
        </h3>
    </div>
    <!-- END OF .small-12 large-stack columns -->
    <div class="small-12 medium-expand columns" style="text-align:right">
        <a class="button responsive_button fabu fa-pencil before" href="{{ route('pages.edit', $page->id ) }}">
            Edit This Page
        </a>
    </div>
    <!-- END OF .small-8 small-offset-2  medium-4 medium-offset-7 columns -->
</div>
<div class="callout row align-justify">
    <div class="column small-12 medium-8 large-7">
        <div class="row align-top align-left">
            <div class="column shrink">
                ID:
                <br/>
                Title:
                <br/>
                Url:
                <br/>
                Created:
                <br/>
                Updated:
                <br/>
                Status:
                <br/>
            </div>
            <!-- END OF .column -->
            <div class="column">
                Page#{{$page->id}}
                <br/>
                {{$page->title}}
                <br/>
               <code> {{url($page->slug)}}</code>
                <br/>
                {{$page->created_at}}
                <br/>
                {{$page->updated_at}}
                <br/>
                
                  <div style="display:inline">  @if($page->published)
                          <div class="label success">published</div><!-- END OF .label --> 
                      @else
                          <div class="label warning">not published</div><!-- END OF .label -->
                      @endif
                      
                      @if($page->url)
                          <div class="label logoblue"><span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Redirects to: {{$page->url}}">redirect</span></div>
                      @endif
                      @if($page->step < 7)
                          <div class="label current">at Step {{$page->step}}</div>
                      @endif</div>
                <br/>
            </div>
            <!-- END OF .column -->
        </div>
        <!-- END OF .row -->
    </div>
    <!-- END OF .colum -->
    <!-- END OF .colum -->
</div>
<!-- END OF .row -->
@endpush

