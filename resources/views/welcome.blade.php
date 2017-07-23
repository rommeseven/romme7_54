@extends('layouts.master')

@push("title","Welcome Page")
@push("content")
<div class="row">
    <div class="callout">
        <h1>
            Welcome
        </h1>
        <h5>
            On my extraordinary webpage!
        </h5>
    </div>
    <!-- END OF .callout -->
</div>
<!-- END OF .row -->
@include("navi")
@endpush


@push('extracss')
<link href="{{ asset('other/vendor/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
@endpush


@push('extrajs')

<script src="{{asset('other/vendor/jquery-ui.min.js')}}"></script>
<script src="{{asset('other/vendor/jquery-ui.touch.min.js')}}"></script>
<script src="{{asset('other/vendor/jquery-ui.nested.min.js')}}"></script>
<script>
 $( "ul.sortable" ).nestedSortable({
 	listType:'ul',
 	  placeholder: "ui-state-highlight"
 });

</script>
@endpush
