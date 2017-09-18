<div class="row">
    <div class="column small-12">
        <label for="{{$bb['key']}}">
            {{$bb['name']}}:
            <div id="{{$bb['key']}}" type="text">
            </div>
            @if ($errors->has($bb['key']))
            <br/>
            <small class="errortext">
                {{ $errors->first($bb['key']) }}
            </small>
            @endif
            <br/>
            <small class="help-text">
                {{$bb['description']}}
            </small>
        </label>
    </div>
    <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
</div>
@push('extrajs')
<script>
    tinymce.init({
  selector: '#{{$bb['key']}}',
          menubar: false,
        statusbar: false,
        toolbar: false,
  fromTextrea: true,
  height: 300,
  theme: 'modern',
  inline:true,
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help jbimages'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages',
  toolbar2: ' preview media | forecolor backcolor | colsavebutton | colprevbutton',
  image_advtab: true,
  templates: [
    { title: 'Test template 2', content: '<span class="label primary">Primary Label</span>' }
  ],
   setup: function (ed) {
        ed.on('keyup', function (e) {
            tinyMceChange(ed);
        });
        ed.on('change', function(e) {
            tinyMceChange(ed);
        });
    },
  content_css: [
  '{{ asset("css/app.css") }}'
    // '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    // '//www.tinymce.com/css/codepen.min.css'
  ],
  init_instance_callback: "insert_contents_for_{{$bb['key']}}",
  
 });
   function insert_contents_for_{{$bb['key']}}(inst){
    inst.setContent('{!! html_entity_decode($slot) !!}');  
}
</script>
@endpush
