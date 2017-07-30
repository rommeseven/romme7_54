@extends('backend.layouts.main')


@push('title')
Create New Page
@endpush

@push('bread')
<li>
    <a href="{{ url('/manage') }}">
        Management
    </a>
</li>
@endpush


@push('bread')
<li>
    <a href="{{ url('/manage/pages') }}">
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
    Content
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
                    Step 4:
                </strong>
            </h3>
        </p>
    </div>
    <!-- END OF .column -->
</div>
<div class="row align-center hide-for-medium">
    <div class="column shrink">
        <ol class="progress-indicator ">
            <li class="is-current" data-step="">
                <span>
                    Content
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
            <li class="is-current" data-step="">
                <span>
                    Content
                </span>
            </li>
            <li class="" data-step="">
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
<br/>
<br/>
<textarea></textarea>
{{-- TODO: callout info sort to proceed --}}
<!-- END OF .row align-center -->
<!-- END OF .row -->
<form action="{{ url('manage/content') }}" id="navi" method="POST">
    {{csrf_field()}}
    {{-- <layoutPreviewRow :current="current" :align="row.align" :cols="row.cols" :key="row.id" v-for="(row,index) in rows"></layoutPreviewRow> --}}
</form>
@endpush
@push('extrajs')



<table class="stack" style="width: 864px;">
<tbody>
<tr>
<td style="width: 288px;">első osztályú oszlop, ami elvan osztva</td>
<td style="width: 286px;">Nem is tudom, hogy van-e értelme ezt tovább bonyolítani</td>
<td style="width: 288px;">Mert ha ez igazán így működik, akkor tényleg mindegy</td>
</tr>
</tbody>
</table>

<br />
<br />
<br />

<script src="{{ asset('other/vendor/tinymce/tinymce.min.js') }}"></script>
<script>
tinymce.init({
  selector: 'textarea',
  height: 500,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
</script>
<script>
let app = new Vue(
{
    el: '#app2',
    data:
    {
        current:0,
        page:  {!! $page or '[]' !!},
        rows: {!! $rows or '[]' !!}
    }
});
</script>
@endpush
