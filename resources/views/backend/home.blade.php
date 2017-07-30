@extends('backend.layouts.main')

@push("title","Dashboard")
@push('content')
<textarea>
</textarea>
<div id="myGrid">
</div>
<!-- END OF #myGrid -->
@endpush
@push('extrajs')
<link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" rel="stylesheet">
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/css/tether.min.css" rel="stylesheet">
        <script crossorigin="anonymous" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
        </script>
        <script crossorigin="anonymous" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js">
        </script>
        <script src="{{ asset('other/vendor/tinymce/tinymce.min.js') }}">
        </script>
        <script src="{{ asset('other/vendor/grideditor/jquery.grideditor.js') }}">
        </script>
        <script src="{{ asset('other/vendor/grideditor/jquery.grideditor.tinymce.js') }}">
        </script>
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
            $(function() {
            // Initialize grid editor
            $('#myGrid').gridEditor({
                new_row_layouts: [[12], [6,6], [9,3]],
                content_types: ['tinymce'],
            });
            
            // Get resulting html
            var html = $('#myGrid').gridEditor('getHtml');
            console.log(html);
        });
        </script>
        @endpush
    </link>
</link>