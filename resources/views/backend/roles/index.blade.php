@extends('backend.layouts.main')

@push('title')
Available Roles
@endpush


@push('content')
<div class="row align-justify">
    <div class="small-12 medium-expand columns">
        <h3>
            {{ $searched or 'Available Roles:' }}
        </h3>
    </div>
    <!-- END OF .small-12 large-stack columns -->
    <div class="small-12 medium-expand columns" style="text-align:right">
        <a class="button responsive_button fabu fa-search secondary before" data-toggle="search_panel" href="#find">
            Find
            @if(isset($searched))
 Another 
@endif
Role
        </a>
        @if(isset($searched))
        <a class="button responsive_button fabu fa-list-alt primary before" data-toggle="search_panel" href="{{ url('/manage/roles') }}">
            All Available Roles
        </a>
        @else
        <a class="button responsive_button fabu fa-plus cover" href="{{ url('/manage/roles/create') }}">
            Create New Role
        </a>
        @endif
    </div>
    <!-- END OF .small-8 small-offset-2  medium-4 medium-offset-7 columns -->
</div>
<!-- END OF .row -->
<div class="row align-center hiddenPanel" data-animate="hinge-in-from-top hinge-out-from-top" data-toggler="" id="search_panel">
    <div class="column small-12 medium-9 large-7 columns">
        <form action="{{ url('/manage/roles/find') }}" method="POST">
            {{csrf_field()}}
            <label for="search">
                Find Role:
                <div class="input-group">
                    <input id="search" name="search" placeholder="Find by Role or Permission" type="text"/>
                    <div class="input-group-button">
                        <button class="button button-icon">
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
        {!! $roles->render() !!}
    </div>
    <!-- END OF .column shrink -->
</div>
<!-- END OF .row align-center -->



<br/>
<div class="row small-up-1 medium-up-2 large-up-4">


@foreach($roles as $role)
<div class="column flex-container">
    <div class="card">
        <div class="card-section">
            <h4>
                {{$role->display_name}}
            </h4>
            <small class="slug">
                {{$role->name}}
            </small>
            <p>
               {{$role->description}}
            </p>
        </div>
        <!-- END OF .card-section -->
        <div class="card-divider flex-container align-spaced align-middle">
            <a class="button success fabu fa-newspaper-o before" href="{{ url('/manage/roles/'.$role->id) }}">
                Details
            </a>
            <a class="button fabu fa-pencil" href="{{ url('/manage/roles/'.$role->id .'/edit') }}">
                Edit
            </a>
        </div>
        <!-- END OF .card-divider flex-container align-spaced align-middle -->
    </div>
    <!-- END OF .card -->
</div>
<!-- END OF .column flex-container -->
@endforeach


</div>
<!-- END OF .row small-up-1 medium-up-2 large-up-4 -->
@endpush



@push('extracss')
<style>
    .topcontent
{
padding-top:24px;
}
h4
{
    margin-bottom: 0;
}
small.slug
{
        position: relative;
    top: -5px;
    left: 5px;
}
a.button
{
    margin:0;
}
</style>
@endpush

@if(isset($searched))
@push('extrajs')
<script>
    $( ".card>.card-section>h4" ).each(function( index ) {

var src_str = $(this).html();
var term = "{{$searchQuery}}";
term = term.replace(/(\s+)/,"(<[^>]+>)*$1(<[^>]+>)*");
var pattern = new RegExp("("+term+")", "gi");

src_str = src_str.replace(pattern, "<mark>$1</mark>");
src_str = src_str.replace(/(<mark>[^<>]*)((<[^>]+>)+)([^<>]*<\/mark>)/,"$1</mark>$2<mark>$4");

$(this).html(src_str);
});
$( ".card>.card-section>small" ).each(function( index ) {

var src_str = $(this).html();
var term = "{{$searchQuery}}";
term = term.replace(/(\s+)/,"(<[^>]+>)*$1(<[^>]+>)*");
var pattern = new RegExp("("+term+")", "gi");

src_str = src_str.replace(pattern, "<mark>$1</mark>");
src_str = src_str.replace(/(<mark>[^<>]*)((<[^>]+>)+)([^<>]*<\/mark>)/,"$1</mark>$2<mark>$4");

$(this).html(src_str);
});
$( ".card>.card-section>p" ).each(function( index ) {

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


{{-- 

TODO: better secondary color
TODO: better success color (its too light)


 --}}