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
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css">
@endpush


@push('extrajs')

<script src="https://cdnjs.cloudflare.com/ajax/libs/nestedSortable/2.0.0/jquery.mjs.nestedSortable.min.js"></script>
<script>
 $( "ul.sortable" ).nestedSortable({
 	listType:'ul',
 	  placeholder: "ui-state-highlight"
 });

</script>
@endpush
