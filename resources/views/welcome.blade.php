@extends('layouts.master')

@push("title","Welcome Page")
@push("content")

<div class="muster">
    <div class="row collapse">
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
    </div><!-- END OF .row -->
</div><!-- END OF .muster --><div class="muster">
    <div class="row collapse">
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
    </div><!-- END OF .row -->
</div><!-- END OF .muster --><div class="muster">
    <div class="row collapse">
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
    </div><!-- END OF .row -->
</div><!-- END OF .muster --><div class="muster">
    <div class="row collapse">
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
    </div><!-- END OF .row -->
</div><!-- END OF .muster --><div class="muster">
    <div class="row collapse">
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
    </div><!-- END OF .row -->
</div><!-- END OF .muster --><div class="muster">
    <div class="row collapse">
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
        <div class="column">
            <div class="content"></div><!-- END OF .content -->
        </div><!-- END OF .column -->
    </div><!-- END OF .row -->
</div><!-- END OF .muster -->


<!-- END OF .row -->
@include("backend.navigation.partials.normal")
@endpush


@push('extracss')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css">
<style>
	.ui-state-highlight { height: 1.5em; line-height: 1.2em; }
</style>
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
