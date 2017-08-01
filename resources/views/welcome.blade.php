@extends('layouts.master')

@push("title","Welcome Page")
@push("content")

<h2>Index</h2>

<button onclick="notify('white','Everything is clear','Until now every function of this is working properly.')">White</button>
<button onclick="notify('black','Night mode: On','Night mode has been enabled for this account. I need to know what happens if my content is really-really long...')">Black</button>
<button onclick="notify('error','Whoops','Something went wrong. Please try again. (ErrCode: 215)')">Err</button>
<button onclick="notify('success','Success!','All your changes have been saved in the database! You can proceed.')">Success</button>
<button onclick="notify('warning','Be aware','If you overwrite the layout, you loose the old settings!')">Warning</button>
<button onclick="notify('info','We are helpful','If you would like to you can contact us anytime. Check the Help section!')">Info</button>


<!-- END OF .row -->
@include("backend.navigation.partials.normal")
@endpush


@push('extracss')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css">
<style>
	.ui-state-highlight { height: 1.5em; line-height: 1.2em; }
</style>
@endpush
