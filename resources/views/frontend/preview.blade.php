@extends("frontend.layouts.page")

@push('title')
{{$page->title}}
@endpush

@push('content')
<div class="row">
	<div class="column">
		<div class="callout alert">This is just a preview!</div><!-- END OF .callout alert -->
	</div><!-- END OF .column -->
</div><!-- END OF .row -->
@endpush

@push('content')
@foreach($rows as $row)
<div class="row
align-{{$row->align}}
">

@foreach($row->columns as $col)
<div class="column

	small-{{$col->small}}
	medium-{{$col->medium}}
	large-{{$col->large}}
	small-offset-{{$col->offset}}
	{{$col->size}}
">{!!$col->html!!}</div><!-- END OF .column -->
@endforeach

	
</div><!-- END OF .row -->
@endforeach

@endpush




@push('title')
| Preview
@endpush