<!-- TinyMCE -->

	tinyMCE.init({
		// General options
    language : "pt",
		mode : "textareas",
		editor_deselector : "mceNoEditor",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,youtube,audio",
		
		 relative_urls: false,
		 convert_urls: false,
		 
		// Theme options
theme_advanced_buttons1:
"code,bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,cleanup,link,unlink,image,media,youtube,audio,table,formatselect,fontselect,fontsizeselect,forecolor,backcolor,preview,fullscreen",

		// Theme options
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		theme_advanced_buttons4 : "",


		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
	 content_css : "../css/1140.css,../css/estilo.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "html/examples/lists/template_list.js",
		external_link_list_url : "html/examples/lists/link_list.js",
		external_image_list_url : "html/examples/lists/image_list.js",
		media_external_list_url : "html/examples/lists/media_list.js",
		extended_valid_elements: "iframe[src|width|height|name|align]",
    file_browser_callback : "tinyBrowser",
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
<!-- /TinyMCE -->


 