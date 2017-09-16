@extends('backend.layouts.main')

@push('title')
All Pages
@endpush

@push('bread')
<li><a href="{{ route('home') }}">Management</a></li>
@endpush


@push('bread')
<li>Pages</li>
@endpush


@push('content')
<div class="row align-justify">
    <div class="small-12 medium-expand columns">
        <h3>
            {{ $searched or 'All Pages:' }}
        </h3>
    </div>
    <!-- END OF .small-12 large-stack columns -->
    <div class="small-12 medium-expand columns" style="text-align:right">

        <a class="button responsive_button fabu fa-search secondary before" data-toggle="search_panel" href="#find">
            Find
            @if(isset($searched))
 Another 
@endif
Page
        </a>

        @if(isset($searched))
        <a class="button responsive_button fabu fa-list-alt primary before" data-toggle="search_panel" href="{{ route('pages.index') }}">
            All Pages
        </a>
        @else
        <a class="button responsive_button fabu fa-plus cover" href="{{ route('pages.create') }}">
            Create New Page
        </a>
        @endif        
    </div>
    <!-- END OF .small-8 small-offset-2  medium-4 medium-offset-7 columns -->
</div>
<!-- END OF .row -->
<div class="row align-center hiddenPanel" data-animate="hinge-in-from-top hinge-out-from-top" data-toggler="" id="search_panel">
    <div class="column small-12 medium-9 large-7 columns">
        <form action="{{ route('pages.find') }}" method="POST">
            {{csrf_field()}}
            <label for="search">
                Find Page:
                <div class="input-group">
                    <input id="search" name="search" placeholder="Page title, content..." type="text"/>
                    <div class="input-group-button">
                        <button class="button button-icon purple">
                            <i class="fa fa-search">
                            </i>
                        </button>
                    </div>
                </div>
@if ($errors->has('search'))
<small class="errortext">
    {{ $errors->first('search') }}
</small>
@endif
            </label>
        </form>
    </div>
</div>
<!-- END OF .column small-12 medium-9 large-7 columns -->
<!-- END OF .row align-center -->
<div class="row align-center hide-for-large">
    <div class="column shrink">
        {!! $pages->render() !!}
    </div>
    <!-- END OF .column shrink -->
</div>
<!-- END OF .row align-center -->
<div class="row">
    <div class="columns">
        <table class="stack hover">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Url
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Created
                    </th>
                    <th>
                        Updated
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>

            {{-- TODO: [pages] pages.index Fortfahren button.warning @offline --}}
                @foreach($pages->unique() as $page)
                <tr>
                    <td>
                        <span class="hide-for-large">
                            Page#
                        </span>
                        {{$page->id }}
                    </td>
                    <td>
                        
                        @if($page->published)
                        <a  target="_blank" href="{{ url( $page->slug) }}" title="Anzeigen">{{$page->title }}</a>
                        @else
                        {{$page->title }}
                        @endif
                        
                    </td>
                    <td>
                        <code><small>{{url($page->slug) }}</small></code>
                    </td>
                    <td><small>
                        @if($page->published)
                            <div class="label success">published</div><!-- END OF .label --> 
                        @else
                            <div class="label warning">not published</div><!-- END OF .label -->
                        @endif
                        
                        @if($page->url)
                            <div class="label logoblue"><span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Redirects to: {{$page->url}}">redirect</span></div>
                        @endif
                        @if($page->step < 7)
                            <div class="label current">at Step {{$page->step}}</div>
                        @endif</small>
                      
                        
                    </td>
                    <td><small>
                            <span class="hide-for-large">
                                Created:
                            </span>
                            {{$page->created_at }}</small>
                    </td>
                    <td><small>
                            <span class="hide-for-large">
                                Updated:
                            </span>
                            {{$page->updated_at }}</small>
                    </td>
                    <td>
                                            @if(!$page->published && $page->step < 7)

<a class="button button-icon warning" target="_blank" href="{{ url( 'cmseven/page/create/step/'. $page->step .'/page/'.$page->id) }}" title="Fortfahren">
                            <i class="fa fa-arrow-right">
                            </i>
                        </a>
                        @else
                        <a class="button button-icon" href="{{ route('pages.edit' , $page->id ) }}" title="Edit Page">
                            <i class="fa fa-pencil">
                            </i>
                        </a>
                        @endif
                        <a class="button button-icon" data-toggle="pagedelmodal_{{$page->id}}" title="Remove Page">
                            <i class="fa fa-remove">
                            </i>
                        </a>
                        <div class="small reveal" data-animation-in="scale-in-up fast" data-animation-out="scale-out-down fast" data-reveal="" id="pagedelmodal_{{ $page->id }}">
                            <div style="text-align:center">
                                <div class="row align-center">
                                    <div class="small-12 column">
                                        <h5 class="subheader">
                                            <br/>
                                            You are deleting  Page#{{ $page->id }}
                                            <span class="show-for-medium-only">
                                                <br/>
                                            </span>
                                            ( {{$page->title}} )
                                        </h5>
                                        <h3>
                                            <br/>
                                            Are you sure?
                                            <br/>
                                            <br/>
                                        </h3>
                                    </div>
                                    <!-- END OF .small-12 column -->
                                </div>
                                <!-- END OF .row -->
                                <div class="row">
                                    <div class="column">
                                        <a class="button fabu remove fa-trash pageRemover responsive_button">
                                            Yes, delete.
                                        </a>
                                        <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display: none;">
                                            {{ method_field('DELETE') }}
    {{ csrf_field() }}
                                        </form>
                                    </div>
                                    <!-- END OF .column -->
                                    <div class="column">
                                        <a class="error alert button fabu before fa-remove responsive_button" data-close="">
                                            Cancel
                                        </a>
                                    </div>
                                    <!-- END OF .column -->
                                </div>
                                <!-- END OF .row -->
                            </div>
                            <button aria-label="Close reveal" class="close-button" data-close="" type="button">
                                <span aria-hidden="true">                                ×
                                </span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br/>
        <!-- END OF .stack hover -->
        <div class="row align-center">
            <div class="column shrink">
                {!! $pages->render() !!}
            </div>
            <!-- END OF .column shrink -->
        </div>
        <!-- END OF .row align-center -->
    </div>
    <!-- END OF .columns -->
</div>
<!-- END OF .row -->
@endpush



@push('extracss')
<style>
    .topcontent
{
padding-top:24px;
}
</style>
@endpush

@if(isset($searched))
@push('extrajs')
<script>
$( "table>tbody>tr>td:not(:has(*))" ).each(function( index ) {

var src_str = $(this).html();
var term = "{{$searchQuery}}";
term = term.replace(/(\s+)/,"(<[^>]+>)*$1(<[^>]+>)*");
var pattern = new RegExp("("+term+")", "gi");

src_str = src_str.replace(pattern, "<mark>$1</mark>");
src_str = src_str.replace(/(<mark>[^<>]*)((<[^>]+>)+)([^<>]*<\/mark>)/,"$1</mark>$2<mark>$4");

$(this).html(src_str);
});

</script>
@endpush
@endif

