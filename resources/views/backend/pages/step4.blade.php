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
<!-- END OF .row align-center -->
<!-- END OF .row -->

<div class="row">
    <div class="column small-offset-1 medium-offset-2">
        <div class="callout">
            Fill your Layout with content! <br />
            Click on the column you want to change the contents of. <br />
<span class="label incomplete">Empty <i class="fa fa-times"></i></span>
<span class="label primary">Completed <i class="fa fa-check"></i></span>
<span class="label current">Currently editing <i class="fa fa-pencil"></i></span>
        </div><!-- END OF .callout -->
    </div><!-- END OF .column small-offset-1 medium-offset-2 -->
</div><!-- END OF .row -->
<div class="forcontent" id="editor">
    <reviewrow :align="row.align" :cols="row.cols" :current="current" :key="row.id" :me="index" @chose="chose($event)" v-for="(row,index) in rows">
    </reviewrow>
</div>
<!-- END OF #editor -->
<form action="{{ url('manage/content') }}" id="navi" method="POST">
    {{csrf_field()}}
    {{--
    <layoutpreviewrow :align="row.align" :cols="row.cols" :current="current" :key="row.id" v-for="(row,index) in rows">
    </layoutpreviewrow>
    --}}

    <!-- END OF .row -->
    <!-- END OF .row -->
</form>
@endpush

@push('bottomcontent')
    <div class="row">
        <div class="column medium-offset-1" v-show="current!=-1">
            <label for="html">
                Content:
                <textarea id="html" name="html">
                </textarea>
            </label>
        </div>
        <!-- END OF .column -->
    </div>
@endpush

@push('extrajs')
<script src="{{ asset('other/vendor/tinymce/tinymce.min.js') }}">
</script>
<script>
    @include("backend.pages.editor.reviewColComponent")
@include("backend.pages.editor.reviewRowComponent")

let app = new Vue(
{
    el: '#app2',
    data:
    {
        originalRows: [],
        page:  {!! $page or '[]' !!},
        rows: {!! $rows or '[]' !!},
        current:-1,
        currenthtml:''
    },
    watch:
    {
        current()
        {
            if(this.current != -1)
            {
                alert($("#tinymce").html());
            }
        }
    },
    methods:
    {
        chose(colid)
        {
            for (var i = this.rows.length - 1; i >= 0; i--) {
                for (var j = this.rows[i].cols.length - 1; j >= 0; j--) {
                    let col = this.rows[i].cols[j];
                    if(col.id== colid)
                    {
                        this.currenthtml=col.html;
                    }
                };
            };
            this.current = colid;
        },
        saveme()
        {
            if(this.current == -1) alert("current is -1");
            else alert(this.current);
            let col_id = -1;
            let col_html = '';
            for (var i = this.rows.length - 1; i >= 0; i--) {
                for (var j = this.rows[i].cols.length - 1; j >= 0; j--) {
                    let col = this.rows[i].cols[j];
                    if(col.id== this.current)
                    {
                        col_html = this.currenthtml;
                        col_id = col.id;
                        col.html=this.currenthtml;
                        this.current = -1;
                        this.currenthtml = '';
                    }
                };
            };
            axios.put("{{url('/manage/pages/create/step/4/column/')}}/"+col_id,{
                html:col_html
            }).then(data => alert("success")).catch(error => alert("fail"));


        },
        update(content)
        {
            this.currenthtml = content;

        }
    },
    mounted()
    {
        this.originalRows = this.rows;
    }
        
 });
</script>
<script>
// TODO: tinymce addclass button anchor @internet
// TODO: neuherz delegate templates @internet
    tinymce.init({
  selector: 'textarea',
  height: 300,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help | colsavebutton | colloadbutton',
  image_advtab: true,
  templates: [
    { title: 'Test template 2', content: '<span class="label primary">Primary Label</span>' }
  ],

  content_css: [
  '{{ asset("css/app.css") }}'
    // '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    // '//www.tinymce.com/css/codepen.min.css'
  ],
  setup: function (editor) {



       editor.on('change', function(e) {
app.update(editor.getContent());


       });
      editor.on('keyup', function(e) {
app.update(editor.getContent())        ;


       });

    editor.addButton('colsavebutton', {
      text: 'Save',
      icon: false,
      onclick: function () {

        app.saveme();

      }
    });
    editor.addButton('colloadbutton', {
      text: 'Load',
      icon: false,
      onclick: function () {

        alert("loading" + app.currenthtml);

        $("textarea#html").html(app.currenthtml);
        // TODO: change tinymce content jquery @internet

      }
    });
  }
 });
</script>
@endpush
