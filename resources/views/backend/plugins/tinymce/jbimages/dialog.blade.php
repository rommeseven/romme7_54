<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>Upload an image</title>
<script>
	/**
 * Justboil.me - a TinyMCE image upload plugin
 * jbimages/js/dialog-v4.js
 *
 * Released under Creative Commons Attribution 3.0 Unported License
 *
 * License: http://creativecommons.org/licenses/by/3.0/
 * Plugin info: http://justboil.me/
 * Author: Viktor Kuzhelnyi
 *
 * Version: 2.3 released 23/06/2013
 */
 
var jbImagesDialog = {
	
	resized : false,
	iframeOpened : false,
	timeoutStore : false,
	
	inProgress : function() {
		document.getElementById("upload_infobar").style.display = 'none';
		document.getElementById("upload_additional_info").innerHTML = '';
		document.getElementById("upload_form_container").style.display = 'none';
		document.getElementById("upload_in_progress").style.display = 'block';
		this.timeoutStore = window.setTimeout(function(){
			document.getElementById("upload_additional_info").innerHTML = 'This is taking longer than usual.' + '<br />' + 'An error may have occurred.' + '<br /><a href="#" onClick="jbImagesDialog.showIframe()">' + 'View script\'s output' + '</a>';
			// tinyMCEPopup.editor.windowManager.resizeBy(0, 30, tinyMCEPopup.id);
		}, 20000);
	},
	
	showIframe : function() {
		if (this.iframeOpened == false)
		{
			document.getElementById("upload_target").className = 'upload_target_visible';
			// tinyMCEPopup.editor.windowManager.resizeBy(0, 190, tinyMCEPopup.id);
			this.iframeOpened = true;
		}
	},
	
	uploadFinish : function(result) {
		if (result.resultCode == 'failed')
		{
			window.clearTimeout(this.timeoutStore);
			document.getElementById("upload_in_progress").style.display = 'none';
			document.getElementById("upload_infobar").style.display = 'block';
			document.getElementById("upload_infobar").innerHTML = result.result;
			document.getElementById("upload_form_container").style.display = 'block';
			
			if (this.resized == false)
			{
				// tinyMCEPopup.editor.windowManager.resizeBy(0, 30, tinyMCEPopup.id);
				this.resized = true;
			}
		}
		else
		{
			document.getElementById("upload_in_progress").style.display = 'none';
			document.getElementById("upload_infobar").style.display = 'block';
			document.getElementById("upload_infobar").innerHTML = 'Upload Complete';
			
			var w = this.getWin();
			tinymce = w.tinymce;
		
			tinymce.EditorManager.activeEditor.insertContent('<img src="' + result.filename +'">');
			
			this.close();
		}
	},
	
	getWin : function() {
		return (!window.frameElement && window.dialogArguments) || opener || parent || top;
	},
	
	close : function() {
		var t = this;

		// To avoid domain relaxing issue in Opera
		function close() {
			tinymce.EditorManager.activeEditor.windowManager.close(window);
			tinymce = tinyMCE = t.editor = t.params = t.dom = t.dom.doc = null; // Cleanup
		};

		if (tinymce.isOpera)
			this.getWin().setTimeout(close, 0);
		else
			close();
	}

};

</script>
<style>
	/**
 * Justboil.me - a TinyMCE image upload plugin
 * jbimages/css/dialog-v4.css
 *
 * Released under Creative Commons Attribution 3.0 Unported License
 *
 * License: http://creativecommons.org/licenses/by/3.0/
 * Plugin info: http://justboil.me/
 * Author: Viktor Kuzhelnyi
 *
 * Version: 2.3 released 23/06/2013
 */
 
body {font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; -text-align:center; padding:0 10px 0 5px;}
h2 {color:#666; visibility:hidden;}

.form-inline input {
  display: inline-block;
  *display: inline;
  margin-bottom: 0;
  vertical-align: middle;
  *zoom: 1;
}

#upload_target {border:0; margin:0; padding:0; width:0; height:0; display:none;}

.upload_infobar {display:none; font-size:12pt; background:#fff; margin-top:10px; border-radius:5px;}
.upload_infobar img.spinner {margin-right:10px;}
.upload_infobar a {color:#0000cc;}
#upload_additional_info {font-size:10pt; padding-left:26px;}

#the_plugin_name {margin:15px 0 0 0;}
#the_plugin_name, #the_plugin_name a {color:#777; font-size:9px;}
#the_plugin_name a {text-decoration:none;}
#the_plugin_name a:hover {color:#333;}

/* this class makes the upload script output visible */
.upload_target_visible {width:100%!important; height:200px!important; border:1px solid #000!important; display:block!important}
</style>
</head>
<body>

	<form class="form-inline" id="upl" name="upl" action="{{ url("/cmseven/upload/image") }}" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="jbImagesDialog.inProgress();">
		{{csrf_field()}}
		<div id="upload_in_progress" class="upload_infobar"><img src="img/spinner.gif" width="16" height="16" class="spinner">Upload in progress&hellip; <div id="upload_additional_info"></div></div>
		<div id="upload_infobar" class="upload_infobar"></div>	
		
		<p id="upload_form_container">
			<input id="uploader" name="userfile" type="file" class="jbFileBox" onChange="document.upl.submit(); jbImagesDialog.inProgress();">
		</p>
		
	</form>


	<iframe id="upload_target" name="upload_target" src="{{ url("/cmseven/blank") }}"></iframe>

</body>
</html>