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
<div class="row column small-offset-1 medium-offset 2" v-if="result.length>0">
    <div class="callout success">
        <p v-text="result"></p>
    </div><!-- END OF .callout success -->
</div><!-- END OF .row column small-offset-1 medium-offset 2 -->
<div class="forcontent" id="editor">
    <reviewrow :align="row.align" :cols="row.cols" :current="current" :key="row.id" :me="index" @chose="chose($event)" v-for="(row,index) in rows">
    </reviewrow>
</div>
<!-- END OF #editor -->
<form action="{{ url('manage/content') }}" id="navi" method="POST">
    {{csrf_field()}}
    {{--
    <layouttooiewrow :align="row.align" :cols="row.cols" :current="current" :key="row.id" v-for="(row,index) in rows">
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
        currenthtml:'',
        result:'',
        firstsave:true
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
            let oldcurrent = this.current;
            this.current = colid;
            if(oldcurrent == -1)
            {

             setTimeout(function(){
                that = (!that) ? ' ':that;


    $(window).trigger('test:event', {test_data: that});
},1000);
            }
            else

            {
                             setTimeout(function(){
                that = (!that) ? ' ':that;


    $(window).trigger('test:event', {test_data: that});
},100);
            }
$('html, body').animate({
        scrollTop: $(".bottomcontent").offset().top
    }, 1000);            
            var that = this.currenthtml;
        },
        saveme(redirect=false)
        {

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
            }).then(data => _then(redirect,this.firstsave)).catch(error => err(error));
            function _then(redirect,firstsave=true)
            {
                if(!redirect)
                {

                    if(firstsave)
                    {
                        setTimeout(function()
                        {
                            tut("Tip:",'By clicking the Preview button in the editor you can preview your page.','info','file-text-o',7000);
                        }, 4754);

                        if(app.firstsave)
                        {
                           app.firstsave=false;
                        }                                    
                    }
                    notify("success","Changes Saved!","Your changes on the column content have been saved.","save",3000);

                }  else window.location="{{ url('manage/pages/'. $page->id .'/preview') }}";
            }
            
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
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help | colsavebutton | colprevbutton',
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


    editor.addButton('colprevbutton', {
      text: 'Preview',
      icon: false,
      onclick: function () {
        app.saveme(true);
      }
    });
    editor.addButton('colsavebutton', {
      text: 'Save',
      icon: false,
      onclick: function () {
        app.saveme();
      }
    });
  }
 });
$(function()
{

tut("Step 4: Content","Fill up the grey columns with content to proceed!","white","edit");
   $(window).on('test:event', function (event,data) {
    //console.log("gotthebus",data.test_data);
    let that = (!data) ? ' ':data.test_data;
   setTimeout(function()
                {
                    tinyMCE.activeEditor.setContent(that);
                }, 100);
});

});

</script>
@endpush
{{-- TODO: scrollto by step3--}}
{{-- 
    $('html, body').animate({
        scrollTop: $("#elementtoScrollToID").offset().top
    }, 2000);
 --}}