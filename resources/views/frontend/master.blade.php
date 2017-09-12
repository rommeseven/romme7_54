@extends('frontend.layouts.' . $layout)


@push('title')
{{$page->title}}
@endpush

@push('content')
@foreach($page->rows as $row)
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

